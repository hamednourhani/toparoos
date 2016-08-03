<div class="feature-posts">
    <a id="NextPageBtn" href="#">
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="PrevPageBtn" href="#">
        <i class="fa fa-angle-left"></i>
    </a>
    <h4 class="section-title">
        <?php echo __("Best Articles","itstar");?>
    </h4>
    <section class="layout">
        <div class="feature-posts-wrapper">
            <div class="feature-posts-inner ">
                <?php $args = array(
                    'sort_order' => 'asc',
                    'sort_column' => 'post_title',
                    'hierarchical' => 1,
                    'exclude' => '',
                    'include' => '',
                    'meta_key' => '_itstar_feature_post_radio',
                    'meta_value' => 'yes',
                    'authors' => '',
                    'child_of' => 0,
                    'parent' => -1,
                    'exclude_tree' => '',
                    'number' => '',
                    'offset' => 0,
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'suppress_filters' => false
                );
                $pages = get_pages($args);

                ?>
                <ul class="owl-carousel owl-theme">
                    <?php foreach( $pages as $page ) {?>
                        <li>
                            <a class="page-grid" href="<?php echo get_permalink($page->ID); ?>">
                                <div class="page-thumb-container">
                                    <img src="<?php echo get_the_post_thumbnail_url($page->ID,'post-thumb');?>" alt="">
                                </div>
                                <h3>
                                    <?php echo $page->post_title; ?>
                                </h3>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </section>
</div>