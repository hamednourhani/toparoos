<?php get_header(); ?>
	
	<main class="site-main">

		
		<div class="site-content">
			<section class="layout">
				<?php get_sidebar("top"); ?>
				<div class="primary">

						<div class="archive-title">

								<?php echo get_search_form('true'); ?>

						</div>
					

					<?php if(have_posts()){ ?>
						<?php while(have_posts()) { the_post();
							$post_link = get_post_meta( get_the_ID(), '_itstar_item_link',1 );
							if($post_link == ""){
								$post_link =  get_the_permalink();
							}
							?>

							<article class="hentry archive-article">

								<div class="featured-image">
									<a href="<?php echo $post_link; ?>">
										<?php the_post_thumbnail('video-larg-thumb'); ?>
									</a>
								</div>

								<header class="article-title">
									<a href="<?php echo $post_link; ?>">
										<h3><?php the_title(); ?></h3>
									</a>
								</header>

								<main class="article-body">

									<?php the_excerpt(); ?>

								</main>
								<footer class="article-footer">
									<?php get_template_part('library/post','meta');?>
								</footer>
							</article>
						<?php } ?>
					<?php } ?>		
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