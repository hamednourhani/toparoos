<?php get_header(); ?>
	
	<main class="site-main">
		<div class="banner-wrapper">
			
				<?php get_template_part('library/banner','maker'); ?>
			
		</div><!-- banner-wrapper -->
		
		<div class="site-content ">
			<section class="layout">

				<?php get_sidebar("top"); ?>

				<div class="primary">

					<div class="items-block">
						<?php if(have_posts()){ ?>
							<ul class="items-list">
								<?php while(have_posts()) { the_post(); ?>
									<li>
											<a href="<?php echo get_the_permalink(); ?>">
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