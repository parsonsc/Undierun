<?php
define('DEBUG', false);
/*
Plugin Name: JustGiving 
*/

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
define( 'JUSTGIVING_VERSION', '1.0.0' );
define( 'JG_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'JG_PLUGIN_URL', str_replace("http:","",plugins_url( 'justgiving' ) ) );

include_once(JG_PLUGIN_DIR . '/admin/jg_admin_settings.php');

$useSMTP = true; //defaults to using local mail if set to false
$smtp_server = "smtp.mailgun.org";
$smtp_helo = "mailgun.org";
$smtp_uname = "postmaster@mg.theundierun.co.uk";
$smtp_pword = "e9f936fead83fc2d557487449e27909a";
$mailer_id = "UndieRun mail client";
$email_from = "hello@mg.theundierun.co.uk";
$reply_to = "hello@theundierun.co.uk";
$friendly_name = "Thank you";

function sendthanks($email, $name, $vars , $page = 0 ){
    global $useSMTP, $smtp_server, $smtp_helo, $smtp_uname, $smtp_pword, $mailer_id;
    global $email_from, $reply_to, $friendly_name, $thisUrl;
    $emailSubj = "Thank you!";

    include_once(JG_PLUGIN_DIR.'/lib/class.html.mime.mail.inc');
    define('CRLF', "\r\n", TRUE);
    $mail = new html_mime_mail(array("X-Mailer: $mailer_id"));
    if ($smtp_uname != "" || $smtp_pword != "")
        $smtpauth = TRUE;
    else
        $smtpauth = FALSE;

    $tosend = 'thanks_page'  ;    


    if (file_exists(JG_PLUGIN_DIR.'/email/'.$tosend.'.txt') && file_exists(JG_PLUGIN_DIR.'/email/'.$tosend.'.html')){
       
        $email_body = fread($fp = fopen(JG_PLUGIN_DIR.'/email/'.$tosend.'.txt', 'r'), filesize(JG_PLUGIN_DIR.'/email/'.$tosend.'.txt'));
        fclose($fp);
        $html_email_body = fread($fp = fopen(JG_PLUGIN_DIR.'/email/'.$tosend.'.html', 'r'), filesize(JG_PLUGIN_DIR.'/email/'.$tosend.'.html'));
        fclose($fp);    
        
        foreach ($vars as $key => $val){
            if(strpos($email_body, '['.trim($key).']')){
                $email_body = preg_replace("/\[$key\]/", $val, $email_body);
            }   
        }
        $email_body = preg_replace('/\[(\S.*?)\]/', '', $email_body);    
        if ($html_email_body){
            foreach ($vars as $key => $val){
                if(strpos($html_email_body, '['.trim($key).']')){
                    $html_email_body = preg_replace("/\[$key\]/", $val, $html_email_body);
                }
            }
            $html_email_body = preg_replace('/\[(\S.*?)\]/', '', $html_email_body);     
            $mail->add_html($html_email_body, $email_body, JG_PLUGIN_DIR.'/email/');
            //$mail->add_html($html_email_body, $email_body, 'img');
        }
        else{
            $mail->add_text($email_body);
        }			
        $mail->build_message();
        $headers = array(
            "From: \"$friendly_name\" <$email_from>",
            "To: \"$name\" <$email>",	// A To: header is necessary, but does
            "Subject: $emailSubj",		// not have to match the recipients list.
            "Reply-To: $reply_to"
        );
   
        if ($useSMTP){
            $wpjg_generalSettings = get_option('jg_general_settings');
            include_once(JG_PLUGIN_DIR.'/lib/class.smtp.inc');
            $params = array(
                'host' => $smtp_server,	// Mail server address
                'port' => 25,		// Mail server port
                'helo' => $smtp_helo,	// Use your domain here.
                'auth' => $smtpauth,	// Whether to use authentication or not.
                'user' => $wpjg_generalSettings['mguser'],	// Authentication username
                'pass' => $wpjg_generalSettings['mgpass']	// Authentication password
            );
            //echo '<PRE>'.htmlentities($mail->get_rfc822($name, $email, $friendly_name, $email_from, $email_subj, $headers)).'</PRE>';               
            $smtp =& smtp::connect($params);
            $send_params = array(
                'from'		=> $email_from,	// The return path
                'recipients'	=> $email,	// Can be more than one address in this array.
                'headers'	=> $headers);       
            $mail->smtp_send($smtp, $send_params);
        }
        else{
            $mail->send($name, $email, $friendly_name, $email_from, $emailSubj, $headers);
        }	
        //echo '<PRE>'.htmlentities($mail->get_rfc822($name, $email, $friendly_name, $email_from, $email_subj, $headers)).'</PRE>';               
    }
}

add_action('activated_plugin','save_error');
function save_error(){
    update_option('plugin_error',  ob_get_contents());
}
function teamstuff(){
    if (!current_user_can('edit_posts') ) {
        include_once(JG_PLUGIN_DIR.'/front-end/jg.teamedit.php');
        add_shortcode('jg-teamlist', 'jg_teamlist'); 
        include_once(JG_PLUGIN_DIR.'/front-end/jg.teamadd.php');
        add_shortcode('jg-teamadd', 'jg_teamadd');
    }
}
global $justgiving_db_version;
$justgiving_db_version = "1.0";

register_activation_hook( __FILE__, 'justgiving_install' );
include_once(JG_PLUGIN_DIR.'/front-end/jg.login.php');       
include_once(JG_PLUGIN_DIR.'/front-end/jg.register.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.recover.password.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.create.page.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.viewuser.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.paypal.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.justgiving.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.leaderboard.php');        		
include_once(JG_PLUGIN_DIR.'/front-end/jg.thankyou.php');

if (!is_admin()) {
    // include the menu file for the login screen
    add_shortcode('jg-login', 'jg_front_end_login');

    add_shortcode('jg-logout', 'jg_front_end_logout');
    
    // include the menu file for the register screen
    add_shortcode('jg-register', 'jg_front_end_register');

    // include the menu file for the recover password screen
    add_shortcode('jg-recover-password', 'jg_front_end_password_recovery');
    
    // include the menu file for the createpage screen
    add_shortcode('jg-create-page', 'jg_front_end_create_page');

    // include the menu file for the viewuser screen
    add_shortcode('jg-view-user', 'jg_front_end_view_user');

    // include the menu file for the viewuser screen
    add_shortcode('jg-paypal', 'jg_front_end_paypal');   

    // include the menu file for the viewuser screen
    add_shortcode('jg-justgiving', 'jg_front_end_justgiving');   
        
    // include the menu file for the viewuser screen
    add_shortcode('jg-leaderboard', 'jg_front_end_leaderboard');     
    
    // include the menu file for the viewuser screen
    add_shortcode('jg-thankyou', 'jg_front_end_thankyou');
    
    // Stick in the scripts and localize them if necessary    
    add_action('wp_enqueue_scripts', 'justgiving_enqueuescripts');      
}

add_action( 'plugins_loaded', 'teamstuff' );    



add_action( 'wp_ajax_nopriv_ajaxjustgiving_login', 'ajaxjustgiving_login' );
add_action( 'wp_ajax_ajaxjustgiving_login', 'ajaxjustgiving_login' );     
add_action( 'wp_ajax_nopriv_ajaxjustgiving_register', 'ajaxjustgiving_register' );
add_action( 'wp_ajax_ajaxjustgiving_register', 'ajaxjustgiving_register' );    
add_action( 'wp_ajax_nopriv_ajaxjustgiving_recover', 'ajaxjustgiving_recover' );
add_action( 'wp_ajax_ajaxjustgiving_recover', 'ajaxjustgiving_recover' );
add_action( 'wp_ajax_nopriv_ajaxjustgiving_createpage', 'ajaxjustgiving_createpage' );
add_action( 'wp_ajax_ajaxjustgiving_createpage', 'ajaxjustgiving_createpage' );
add_action( 'wp_ajax_jg_autocompletesearch', 'jg_autocomplete_suggestions' );
add_action( 'wp_ajax_nopriv_jg_autocompletesearch', 'jg_autocomplete_suggestions' );


$wpjg_admin = JG_PLUGIN_DIR . '/admin/';	
/*
if (file_exists ( $wpjg_admin.'class.admin.php' ))	require_once($wpjg_admin.'class.admin.php');
$JG_Admin = new JG_Admin();

register_activation_hook( __FILE__, array( $JG_Admin, 'justgiving_activate' ) );
register_deactivation_hook( __FILE__, array( $JG_Admin, 'justgiving_deactivate' ) );
add_action( 'admin_init', array( $JG_Admin, 'justgiving_initialize' ) );
add_action( 'admin_menu', array( $JG_Admin, 'justgiving_admin' ) );
*/
if(!function_exists('jg_curpageurl')){
    function jg_curpageurl() {
        $pageURL = 'http';
        if ($_SERVER["SERVER_PORT"] == "443")
			$pageURL .= "s";
        $pageURL .= "://";
        $pageURL .= $_SERVER["HTTP_HOST"];
        /*
        if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
			$pageURL .= ":".$_SERVER["SERVER_PORT"];        
        */
        $pageURL .= $_SERVER["REQUEST_URI"];
        return $pageURL;
    }
}

if(!function_exists('jg_generate_random_username')){
    function jg_generate_random_username($sentEmail){
        $email = '';    
        for($i=0; $i<strlen($sentEmail); $i++){
            if (($sentEmail[$i] === '@') || ($sentEmail[$i] === '_') || ($sentEmail[$i] === '-') || ($sentEmail[$i] === '.'))
                break;
            else
                $email .= $sentEmail[$i];
        }
        $username = 'pbUser'.$email.mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
        while (username_exists($username)){
            $username = 'pbUser'.$email.mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
        }
        return $username;
    }
}

if(!function_exists('jg_check_missing_http')){
    function jg_check_missing_http($redirectLink) {
        return preg_match('#^(?:[a-z\d]+(?:-+[a-z\d]+)*\.)+[a-z]+(?::\d+)?(?:/|$)#i', $redirectLink);
    }
}

function justgiving_enqueuescripts(){
    wp_enqueue_style( 'justgiving', JG_PLUGIN_URL.'/css/justgiving.css' );
    
    //wp_enqueue_script('jg_pagesearch', JG_PLUGIN_URL.'/js/jgacsearch.js', array('jquery','jquery-ui-autocomplete'));
    //wp_localize_script('jg_pagesearch', 'JGSearch', array('url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('justgiving-raised', JG_PLUGIN_URL.'/js/justgiving.js', array('jquery'));
    wp_localize_script('justgiving-raised', 'ajaxjustgiving', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_localize_script('justgiving-raised', 'ajaxsiteroot', array('url' => get_home_url('/')));
}

function justgiving_install() {
    global $wpdb;
    global $justgiving_db_version;
    $table_name = $wpdb->prefix . "jgusers";
    //ALTER TABLE  `wp_jgusers` ADD  `address2` VARCHAR( 255 ) NOT NULL AFTER  `address`
    $sql = "CREATE TABLE IF NOT EXISTS  $table_name (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `userid` bigint(20) unsigned NOT NULL,
      `title` varchar(255) NOT NULL,
      `firstname` varchar(255) NOT NULL,
      `lastname` varchar(255) NOT NULL,
      `dob` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `address` varchar(255) NOT NULL,
      `address2` varchar(255) NOT NULL,
      `towncity` varchar(255) NOT NULL,
      `county` varchar(255) NOT NULL,
      `postcode` varchar(20) NOT NULL,
      `packbypost` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
      `cpage` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
      `hasaccount` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
      `userEnc` varchar(255) NOT NULL,  
      `pageurl` varchar(255) NOT NULL,
      `signupdate` int(11) unsigned NOT NULL,
      `optin` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
      `country` varchar(40) NOT NUll,
      `heardabout` varchar(255) NOT NUll,
      `paidaccess` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
      `paytoken` varchar(300) NOT NULL,
      `txn_id` varchar(600) NOT NULL,
      `tsandcs` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
      PRIMARY KEY (`id`)  
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    
    $table_nameb = $wpdb->prefix . "jgteams";   
    $sqlb = "CREATE TABLE IF NOT EXISTS $table_nameb (
        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        `owner` bigint(20) unsigned NOT NULL DEFAULT 0,
        `teamstartpage` text,
        `teamname` varchar(255),
        `teamfriendly` varchar(255),
        `teamshortname` varchar(255),
        `teamstory` text,
        `teamtargettype` enum('Aggregate','Fixed'),
        `teamtarget` varchar(255),
        `teamfbpage` text,
        `teamtwpage` text,
        `teammembers` text,
        `teamtype` enum('Open', 'Closed', 'ByInvitationOnly'),        
        `submittedtime` timestamp default '0000-00-00 00:00:00' ,
        `lastmodified` timestamp default now() on update now() ,
        PRIMARY KEY (`id`)
    );";    
    dbDelta( $sqlb );  

    $table_namec = $wpdb->prefix . "jgjustgiving";   
    $sqlc = "CREATE TABLE IF NOT EXISTS $table_namec (
        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        `owner` bigint(20) unsigned NOT NULL DEFAULT 0,
		`reference` varchar(255),
		`extref` varchar(255),
		`amount` decimal(19,2),
        `paid` smallint(3) UNSIGNED DEFAULT 0 NOT NUll,
		`txn_id` varchar(255),
        `submittedtime` timestamp default '0000-00-00 00:00:00' ,
        `lastmodified` timestamp default now() on update now() ,
        PRIMARY KEY (`id`)
    );";    
    dbDelta( $sqlc );  
    
    add_option( "justgiving_db_version", $justgiving_db_version );    
    
}
