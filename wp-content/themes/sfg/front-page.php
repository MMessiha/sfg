<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfg
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php if( get_field( 'slider' ) ) : ?>
				<div class="banner">
					<div class="container-fluid">
						<div class="row">
							<?php $slider = get_field( 'slider' ); ?>
							<?php echo do_shortcode( $slider ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if( get_field( 'background' ) ) : ?>
				<div class="compliance" style="background-image: url('<?php the_field( 'background' ); ?>');">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<p class="heading"><?php the_field( 'heading' ); ?></p>
								<div class="content"><?php the_field( 'content' ); ?></div>
								<a class="button" href="<?php the_field( 'link' ); ?>">Learn more</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if( have_rows( 'practice_areas', 6 ) ) : ?>
				<div class="services">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p class="heading">Our Services</p>
								<ul>
									<?php while ( have_rows( 'practice_areas', 6 ) ) : the_row(); ?>
										<a href="<?php the_sub_field( 'link' ); ?>"><li><span><?php the_sub_field( 'content' ); ?></span></li></a>
									<?php endwhile; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if( have_rows( 'network', 'options' ) ) : ?>
				<div class="firms">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p>we are part of a national Network of law firms</p>
							</div>
						</div>
					</div>
				</div>
				<div class="network">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul>
									<?php while ( have_rows( 'network', 'options' ) ) : the_row(); ?>
									<li><a target="_blank" href="<?php the_sub_field( 'link' ); ?>"><?php the_sub_field( 'location' ); ?></a></li>
									<?php endwhile; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
