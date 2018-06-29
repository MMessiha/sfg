<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sfg
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if( get_field( 'banner', 162 ) ) : ?>
				<div class="banner" style="background-image: url('<?php the_field( 'banner', 162 ); ?>');">
					<div class="container">
						<p class="title">Blog <span><?php the_title(); ?></span></p>
					</div>
				</div>
			<?php endif; ?>	

			<div class="blog">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
	    					<?php while ( have_posts() ) : the_post(); ?>
    							<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive center-block image' ) ); ?>
	    							<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
	    							<p class="date"><?php the_date( 'l, F j, Y' ); ?></p>
	    							<?php echo do_shortcode( '[DISPLAY_ULTIMATE_SOCIAL_ICONS]' ); ?>
									<p><?php the_content(); ?></p>
	    					<?php endwhile; ?>
						</div>
						<div class="col-md-4">
							<div class="sidebar">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
