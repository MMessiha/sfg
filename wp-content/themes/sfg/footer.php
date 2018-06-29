<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sfg
 */

?>

		</div><!-- #content -->
		
			<div class="wrap">
				<div class="contact">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php $form = get_field( 'form_1', 13 ); ?>
								<?php echo do_shortcode( $form ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<a href="<?php echo bloginfo( 'siteurl' ); ?>"><img class="img-responsive" src="<?php the_field( 'logo_small', 'option' ); ?>" alt="Logo" /></a>
						</div>
						<?php if( get_field( 'office', 'options' ) ) : ?>
							<?php while ( have_rows( 'office', 'options' ) ) : the_row(); ?>
								<?php $phone_number = str_replace( [ "(", ")", " ", "-", "–", "." ], '', get_sub_field( 'phone_number', 'options' ) ); ?>
								<div class="col-md-4 col-sm-6">
									<ul class="office">
										<li><strong><?php the_sub_field( 'name' ); ?> Office:</strong></li>
										<li><i class="fa fa-map-marker" aria-hidden="true"></i><a target="_blank" href="<?php the_sub_field( 'link' ); ?>"><?php the_sub_field( 'location' ); ?></a></li>
										<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $phone_number; ?>"><?php the_sub_field( 'phone_number' ); ?></a></li>
									</ul>
								</div>
								<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php wp_nav_menu( array( 'menu' => 'secondary', 'depth' => 1, 'container' => 'div', 'menu_class' => 'nav', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php if( get_field( 'footer', 'options' ) ) : ?>
								<div class="content"><?php the_field( 'footer', 'options' ); ?></div>
							<?php endif; ?>
							<p class="copy">Copyright &copy; <?php echo date('Y'); ?> <?php echo bloginfo( 'name' ); ?> - All Rights Reserved | website by 561 media</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
