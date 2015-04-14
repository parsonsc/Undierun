<?php 
ob_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=11; IE=10; IE=9; IE=8; IE=7; IE=EDGE;" />
		<title><?php wp_title(''); ?></title>
		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-152x152.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/> <!--320-->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f7941d">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon-144x144.png">
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
	</head>
    <body>
        <?php include_once("analyticstracking.php") ?>
        <div class="site-container hp-container <?php echo lcfirst(str_replace(" ", "", ucwords(trim(strtolower(preg_replace('/\b[a-zA-Z]{1,2}\b/u','',preg_replace('/[^a-zA-Z]+/u',' ', get_the_title()))))))); ?>">
            <!-- Site header -->
            <header>
                <div class="headerBanner home-logo">
                    <h1>
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/layout/logo.png" alt="<?php bloginfo('name'); ?>" width="100%">
                        </a>
                    </h1>
                </div>
                <!-- Desktop nav -->
                <nav class="siteNav show_desktop" role="navigation">
                    <ul>                       
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
                        
                        <li class="nav-cruk">
                            <a href="http://standuptocancer.org.uk">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/nav/cruk.png" alt="Stand Up To Cancer" width="100%">
                            </a>
                        </li>
                         <li class="nav-cancer">
                            <a href="http://www.standuptocancer.org.uk/">
                                 <img src="<?php echo get_template_directory_uri(); ?>/images/nav/cancer.png" alt="Stand Up To Cancer" width="100%">
                            </a>
                        </li>
                        <li class="nav-twitter hide_tablet">
                            <a href="https://twitter.com/hashtag/undierun?f=realtime">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/nav/twitter.png" alt="#Undierun">
                                #Undierun
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End nav -->
                <?php if (!is_home()):?>
                <!-- mobile nav -->
                <nav class="siteNav show_mobile hide_homepage">
                    <ul>
                        <li class="nav-cancer">
                            <a href="http://www.standuptocancer.org.uk/">
                                 <img src="<?php echo get_template_directory_uri(); ?>/images/nav/cancer_mobile.png" alt="Stand Up To Cancer" width="100%">
                            </a>
                        </li>
                        <li class="nav-cruk">
                            <a href="http://www.standuptocancer.org.uk/">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/nav/cruk_mobile.png" alt="Stand Up To Cancer" width="100%">
                            </a>
                        </li>                         
                    </ul>
                </nav>
                <!-- End mobile nav -->                
                <?php endif;?>
            </header>
            <!-- End header -->    	
