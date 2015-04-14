<?php 
/**
 * Template Name: Home Page
 *
 * @package UndieRun
 */
 
get_header(); ?>
            <div class="main_content hpContent">
               <!-- Homepage hero banner -->
                <section>
                    <div class="hero-banner">
                        <img src="/undierun/images/homepage/hero_trans.png" alt="Undie Run" width="100%" class="hero_image show_desktop"> 
                        <img src="/undierun/images/homepage/hero_trans_mobile.png" alt="Undie Run" width="100%" class="hero_image show_mobile"> 
                        <div class="section_inner">
                            <div class="hpBanner">
                                <h2>Tell Cancer<br />It's pants.<br />We dare you!</h2>                      

                                <a href="<?php echo get_permalink(18);?>">
                                    <div class="register-button">
                                        Register Now<div class="arrow"></div>
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
                                        <a href="#">
                                             <img src="/undierun/images/nav/cancer_mobile.png" alt="Stand Up To Cancer" width="100%">
                                        </a>
                                    </li>
                                    <li class="nav-cruk">
                                        <a href="#">
                                            <img src="/undierun/images/nav/cruk_mobile.png" alt="Stand Up To Cancer" width="100%">
                                        </a>
                                    </li>
                                    <div class="nav-underline"></div>
                                    <li class="nav-twitter">
                                        <a href="#">
                                            <img src="/undierun/images/nav/twitter.png" alt="#Undierun">
                                            #Undierun
                                        </a>
                                    </li>
                                    <li class="logIn siteCTA">
                                        <a href="<?php echo get_permalink(18);?>">
                                            Log In
                                        </a>
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
                            <h2>Don't Hang around.</h2>                        
                            <p>Strip down to your smalls and Stand Up To Cancer. It’s time to run in your undies and raise money to help beat cancer sooner. Everyone’s invited, so grab your mates and give it everything you’ve got. Because when it comes to fighting cancer, it’s what’s undie-neath that counts.</p>
                            <p>Keep it brief. <a href="register.html" title="Register Now">Sign up now</a> and we will beat cancer sooner. Register and enter your details, then create a JustGiving page so you can start raising money. Complete your registration by making a suggested donation of £5 to Stand Up To Cancer. All of your money will go towards speeding up breakthroughs from labs to patients and help save more lives.</p>

                            <h3>What's stand up to cancer?</h3>
                            <p>Stand Up To Cancer is an annual fundraising campaign brought to you by Cancer Research UK and Channel 4. Led by the brightest stars in film, TV and music, we’re calling on the UK to fundraise, March On Cancer, buy merchandise and watch the live show on Channel 4 on Friday 17 October to raise money and help save lives. United, we will beat cancer sooner.</p>
                            <a href="http://standuptocancer.org.uk" target="_blank" title="Stand Up To Cancer" class="standUpToCancer">standuptocancer.org.uk</a>
                            <?php endwhile; endif;?>
                            <div class="spread-social show_mobile">
                                <h5>Spread the word, share this page.</h5>
                                <nav>
                                    <ul>
                                        <li class="twitter_box">
                                            <a href="#">
                                                <img src="/undierun/images/layout/social_box.png" width="100%" alt="Twitter">
                                            </a>
                                        </li>
                                        <li class="fb_box">
                                            <a href="#">
                                                <img src="/undierun/images/layout/social_box.png" width="100%" alt="Facebook">
                                            </a>
                                        </li>
                                        <li class="web_box">
                                            <a href="#">
                                                <img src="/undierun/images/layout/social_box.png" width="100%" alt="@">
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="pickUni">
                            <h3>Pick Your Uni</h3>
                            <!-- select uni -->
                            <?php echo do_shortcode('[jg-leaderboard template="leaderboard-dropdown.html"]'); ?>
                            <!-- end dropdown -->

                            <p>Prove your Uni&rsquo;s the best by gathering the biggest team together. Then suss out the competition on our leader board, and prepare to share. Tweet about it. Facebook it. Instagram selfies in your smalls. Show the world how you&rsquo;re helping to beat cancer sooner.</p>

                            <a href="#" class="uni_register">
                                <a href="#" >Show Me The Event Page <span class="redArrow"></span></a>
                            </a>
                            <div class="underline-white"></div>
                            <p>Can&rsquo;t find your Uni? That&rsquo;s pants! Why not organise an Undie Run there next year?</p>

                            <div class="spread-social show_desktop">
                                <p>Spread the word, share this page.</p>
                                <nav>
                                    <ul>
                                        <li class="twitter_box">
                                            <a href="#">
                                                <img src="/undierun/images/layout/social_box.png" alt="">
                                            </a>
                                        </li>
                                        <li class="fb_box">
                                            <a href="#">
                                                <img src="/undierun/images/layout/social_box.png" alt="">
                                            </a>
                                        </li>
                                        <li class="web_box">
                                            <a href="#">
                                                <img src="/undierun/images/layout/social_box.png" alt="">
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
            


			<div id="content">
				<div id="inner-content" class="wrap cf">
                        <div class="leftborder"><?php echo do_shortcode('[jg-leaderboard template="leaderboard-dropdown.html"]'); ?></div>                
						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
								<header class="article-header">
									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
                                        <?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>
								</header>
								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>
								<footer class="article-footer cf">
                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>
                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
								</footer>
							</article>
							<?php endwhile; ?>
									<?php bones_page_navi(); ?>
							<?php else : ?>
									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
							<?php endif; ?>
						</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
<?php get_footer(); ?>