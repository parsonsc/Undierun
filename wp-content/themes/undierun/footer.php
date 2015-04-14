            <!-- Site footer -->
            <footer role="contentinfo">
                <div class="section_inner">
                    <section class="footer-banner">
                        <nav role="navigation">
                            <ul>
                                <li>  
                                    <a href="<?php echo get_permalink(61); ?>" title="<?php echo esc_attr(strip_tags(get_the_title(61))); ?>"><?php echo get_the_title(61); ?></a>
                                </li>
                                <li class="bullet show_desktop"></li>
                                <li>    
                                    <a href="<?php echo get_permalink(64); ?>" title="<?php echo esc_attr(strip_tags(get_the_title(64))); ?>"><?php echo get_the_title(64); ?></a>
                                </li>
                            </ul>
                        </nav>
                    </section>
                    <!-- end footer links -->

                    <!-- Footer legal -->
                    <section class="footer-legal">
                        <p>Donations made to Cancer Research UK in support of the Stand Up To Cancer campaign. Stand Up To Cancer and Stand Up To Cancer Brand Marks are registered trademarks or trademarks of the Entertainment Industry Foundation. Cancer Research UK is a registered charity in England and Wales (1089464), Scotland (SC041666) and the Isle of Man (1103). Cancer Research UK is registered as a company limited by guarantee in England &amp; Wales No. 4325234. Cancer Research UK&rsquo;s registered address: Angel Building, 407 St John Street, London EC1V 4AD. &copy; Cancer Research UK. Watch out, cancer: you&rsquo;ve been warned.</p>
                    </section>
                    <!-- End Footer legal -->
                </div>                
            </footer>
            <!-- End footer -->
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
<?php
ob_end_flush();
?>