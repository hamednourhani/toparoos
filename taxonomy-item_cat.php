<?php get_header(); ?>

<?php
$item_cat_id = get_queried_object()->term_id;
$args = array(
	'posts_per_page' => 20,
	'tax_query' => array(
		array(
			'taxonomy' => 'item_cat',
			'field'    => 'term_id',
			'terms'    => $item_cat_id,
		)
	),
	'meta_key' => '_itstar_item_pri',
	'orderby' => 'meta_value',
	'order'   => 'DESC',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
//    'meta_key' => '_itstar_feature_post_radio',
//    'meta_value' => 'yes',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'item',
	'post_status' => 'publish',
	'suppress_filters' => false
);
$items = query_posts($args);
?>


	<main class="site-main">

		
		<div class="site-content ">
			<section class="layout">

				<?php get_sidebar("top"); ?>

				<div class="primary">

					<div class="items-block">
						<?php if(have_posts()){ ?>
							<ul class="items-list">
								<?php while(have_posts()) { the_post();
									$item_link = get_post_meta( get_the_ID(), '_itstar_item_link',1 );
									if($item_link == ""){
										$item_link =  get_the_permalink();
									}
									?>
									<li>
											<a href="<?php echo $item_link; ?>">
												<div class="item-thumb">
													<?php echo get_the_post_thumbnail(get_the_ID(),'post-thumb');?>
												</div>
												<div class="item-detail">
													<h4 class="item-title">
														<?php the_title(); ?>
													</h4>
                                        <span class="item-desc">
                                            <?php the_excerpt();?>
                                         </span>
												</div>
											</a>
										</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>

					<nav class="pagination">
						<?php itstar_pagination(); ?>
					</nav>

				</div><!-- primary -->

				<div class="secondary">
					<?php get_sidebar(); ?>
				</div><!-- secondary -->


			</section>
		</div>
		
	</main>

<?php get_footer(); ?>