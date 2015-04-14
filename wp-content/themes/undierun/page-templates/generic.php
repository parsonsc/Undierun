<?php 
/**
 * Template Name: Generic Page
 *
 * @package UndieRun
 */
 
get_header(); ?>
            <!-- Main content -->
            <section class="main_content" role="main">
                <div class="section_inner">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  
                    <div <?php body_class(lcfirst(str_replace(" ", "", ucwords(trim(strtolower(preg_replace('/\b[a-zA-Z]{1,3}\b/u','',preg_replace('/[^a-zA-Z]+/u',' ', get_the_title())))))))); ?>>
                        <?php the_title('<h2>', '</h2>');?>
                        <?php the_content();?>
                    </div>
                    <?php endwhile; endif;?>                    
                </div>
            </section>                    
<?php get_footer(); ?>