<?php
/**
 * Template Name: First Page
 *
 *
 */


get_header();

?>


    <main class="site-main">



                <div class="site-content">
                    <section class="layout">

                        <?php get_sidebar("top"); ?>

                    <div class="primary">

                        <?php get_template_part('library/slider','area'); ?>
                        <?php get_template_part('library/featured','page');?>

                        <div class="page-content-desc">
                            <h4 class="section-title">
                                <?php echo __("Top Arous","itstar");?>
                            </h4>
                            <?php
                                if(have_posts()){
                                    while(have_posts()) { the_post();
                                        the_content();
                                    }
                                }
                            ?>
                        </div>


                       <?php get_template_part("library/best", "articles"); ?>
                        <?php get_template_part("library/last","articles");?>


                    </div><!-- primary -->

                    <div class="secondary">
                        <?php get_sidebar(); ?>
                    </div><!-- secondary -->

                    </section>
                </div>


    </main>

<?php get_footer(); ?>