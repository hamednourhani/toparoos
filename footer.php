<!-- ********************************************************************* -->
	<!--****************** Site footer      ***********************************-->
	<!-- ********************************************************************* -->


			<?php get_sidebar('footer-first'); ?>
			<?php get_sidebar('footer-second'); ?>



			<div class="follow-links">
				<h3 class="follow-title">
					<?php echo __('Follow US ','itstar');?>
				</h3>
				<ul>

					<li>
						<a href="#">
							<img class="follow-telegram" src="<?php echo get_template_directory_uri();?>/images/icons/telegram.png"/>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<img class="follow-aparat" src="<?php echo get_template_directory_uri();?>/images/icons/aparat-white.png"/>
						</a>
					</li>
				</ul>
			</div>

		<div class="cretifies-container">
			<section class="layout">
				<ul>
					<li>
						<img src="<?php echo get_template_directory_uri();?>/images/certifies/tuv.png" alt="">
					</li>
				</ul>
				<ul>
					<li class="narrow-certifie">
						<img src="<?php echo get_template_directory_uri();?>/images/certifies/iso.png" alt="">
					</li>
				</ul>
				<ul>
					<li >
						<img src="<?php echo get_template_directory_uri();?>/images/certifies/rcbh.png" alt="">
					</li>
				</ul>
			</section>
		</div>

			<footer class="site-footer">
				<section class="layout">
					<span class="site-credit"><?php echo __( "Sana © 2016. All rights reserved.","itstar"); ?></span>

					<span class="site-designer">
						<a href="http://karait.com"><?php echo __('Designed ','itstar');?></a>
						<?php echo __('By Farakaranet ','itstar');?>
					</span>
				</section>
			</footer> <!-- footer -->
	
	
	

	<!-- scrolltofixed menu -->
	
	
		</div>

		<?php wp_footer(); ?>
	</body><!-- body -->
</html><!-- html -->