<?php 
/**
 * Template Name: Home Page
 *
 * @package UndieRun
 */
 
get_header(); ?>
            <div class="main_content ">
               <!-- Homepage hero banner -->
                <section>
                    <div class="hero-banner">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/homepage/hero_trans.png" alt="Undie Run" width="100%" class="hero_image desktop"> 
                        <img src="<?php echo get_template_directory_uri(); ?>/images/homepage/hero_trans_tablet.png" alt="Undie Run" width="100%" class="hero_image tablet"> 
                        <img src="<?php echo get_template_directory_uri(); ?>/images/homepage/hero_trans_mobile.png" alt="Undie Run" width="100%" class="hero_image show_mobile"> 
                        <div class="section_inner">
                            <div class="hpBanner">
                                <h2>Tell Cancer<br />It's pants!<!--<br /> We dare you! --></h2>                      

                                <a href="<?php echo get_permalink(18);?>">
                                    <div class="register-button">
                                        Register Now<span class="arrow"></span>
                                    </div>
                                </a>

                                <!-- Top 5 Teams -->
                                <section class="top5">
                                    <?php echo do_shortcode('[jg-leaderboard template="top5teamsbymembers.html" orderby="numMembers" order="desc" limit=5]'); ?>
                                    
                                </section>   
                                <!-- End top 5 teams table  -->
                               
                            </div>
                            <!-- mobile nav -->
                            <nav class="siteNav show_mobile" role="navigation">
                                <ul>
                                    <li class="nav-cancer">
                                        <a href="http://www.standuptocancer.org.uk/">
                                             <img src="<?php echo get_template_directory_uri(); ?>/images/nav/cancer_mobile.png" alt="Stand Up To Cancer" width="100%">
                                        </a>
                                    </li>
                                    <li class="nav-cruk">
                                        <a href="http://www.cancerresearchuk.org/">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/nav/cruk_mobile.png" alt="Stand Up To Cancer" width="100%">
                                        </a>
                                    </li>
                                    <div class="nav-underline"></div>
                                    <li class="nav-twitter">
                                        <a href="https://twitter.com/hashtag/undierun?f=realtime">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/nav/twitter.png" alt="#Undierun">
                                            <strong>#Undierun</strong>
                                        </a>
                                    </li>
                                    <li class="logIn siteCTA">
                            <?php if ( isset($_SESSION['userEnc']) )
                            {
                            ?>
                            <a href="<?php echo get_permalink(13);?>">
                               Log Out
                            </a>                                
                            <?php
                            }
                            else
                            {
                            ?>
                            <a href="<?php echo get_permalink(18);?>">
                               Log In
                            </a>
                            <?php
                            }
                            ?>
                                    </li>
                                </ul>
                            </nav>
                            <!-- End mobile nav -->
                        </div>
                    </div>
                </section>
                <!-- End hero banner -->
                <div style="clear: both;"></div> 
                <!-- Main content -->
                <section class="main_content" role="main">
                    <div class="section_inner">
                        <div class="get-involved">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content();?>
                            <?php endwhile; endif;?>
                            <div class="spread-social show_mobile">
                                <h5>Spread the word, share this page.</h5>
                                <nav>
<?php
$wpjg_generalSettings = get_option('jg_general_settings');

if ($wpjg_generalSettings['fbappid'] != ''){
?>
<script type="application/javascript">
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '<?php echo $wpjg_generalSettings['fbappid'];?>',                            
      status     : true,                                 
      xfbml      : true                                  
    });
  };
  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
function FBShareOp(){
	var product_name   = 	'Undie Run';
	var description	   =	"Strip down to your smalls and #StandUpToCancer. It's time to run in your undies and beat cancer sooner. Sign up now to your university's Undie Run!";
	var share_image	   =	'<?php global $wpjg_generalSettings; echo (!jg_check_missing_http($wpjg_generalSettings['imageurl'])) ? get_home_url() : '';?><?php echo $wpjg_generalSettings['imageurl']; ?>';
	var share_url	   =	'<?php echo get_home_url() ?>';	
    var share_capt     =    'Stand Up To Cancer';
    FB.ui({
        method: 'feed',
        name: product_name,
        link: share_url,
        picture: share_image,
        caption: share_capt,
        description: description
    }, function(response) {
        if(response && response.post_id){}
        else{}
    });
}
</script>
<?php
}
?>                                
                                    <ul>
                                        <li class="twitter_box">
                                            <a data-provider="twitter"  rel="nofollow" title="Share on Twitter" href="http://twitter.com/share?url=http://bit.ly/Undie&amp;text=<?php echo urlencode("Strip down to your smalls and #StandUpToCancer. It's time to run in your undies and beat cancer sooner. Sign up now ");?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/layout/social_box.png" width="100%" alt="Twitter">
                                            </a>
                                        </li>
                                        <li class="fb_box">
<a data-provider="facebook" rel="nofollow" title="Share on Facebook" 
    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_home_url();?>" <?php if ($wpjg_generalSettings['fbappid'] != ''){?> onclick="FBShareOp(); return false;"<?php } ?>>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/layout/social_box.png" width="100%" alt="Facebook">
                                            </a>
                                        </li>
                                        <li class="web_box">
                <?php
                    $home = get_home_url('/');
                    $subj = "It's what's undie-neath that counts.";
                    $body = "Have you heard of Undie Run? Universities across the country are going to be stripping down to their smalls for Stand Up To Cancer, and I think we should get involved!\nLet's sign up now because when it comes to fighting cancer, it's what's undie-neath that counts.\nWe will beat cancer sooner. Find out more and register today at www.theundierun.co.uk";                     
                    
                    $subj = str_replace(" ", "%20", $subj);
                    $body = str_replace(array("\n", "\r"), '%0D%0A%0D%0A', str_replace(" ", "%20",$body));
                ?>
                                            <a data-provider="email" href="mailto: ?subject=<?php echo $subj;?>&body=<?php echo $body;?>" rel="nofollow">    
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/layout/social_box.png" width="100%" alt="@">
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="pickUni">
                            <h3>Show Me My Uni</h3>
                            <!-- select uni -->
                            <?php echo do_shortcode('[jg-leaderboard template="leaderboard-dropdown.html" orderby="teamname" order="asc"]'); ?>
                            <!-- end dropdown -->



                            <div class="underline-white"></div>
                            <p>Can&rsquo;t find your Uni? That&rsquo;s pants! Why not organise an Undie Run there next year?</p>

                            <div class="spread-social show_desktop">

                           
                            
                                <p><strong>Spread the word, share this page.</strong></p>
                                <nav>
                                    <ul>
                                        <li class="twitter_box">
                                            <a data-provider="twitter"  rel="nofollow" title="Share on Twitter" href="http://twitter.com/share?url=http://bit.ly/Undie&amp;text=<?php echo urlencode("Strip down to your smalls and #StandUpToCancer. It's time to run in your undies and beat cancer sooner. Sign up now ");?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/layout/social_box.png" alt="">
                                            </a>
                                        </li>
                                        <li class="fb_box">
                                            <a data-provider="facebook"  rel="nofollow" title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_home_url();?>" onclick="FBShareOp(); return false;">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/layout/social_box.png" alt="">
                                            </a>
                                        </li>
                                        <li class="web_box">
                                            <a data-provider="email" href="mailto: ?subject=<?php echo $subj;?>&body=<?php echo $body;?>" rel="nofollow">    
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/layout/social_box.png" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <div style="clear: both;"></div>
            </div>           
<?php get_footer(); ?>
