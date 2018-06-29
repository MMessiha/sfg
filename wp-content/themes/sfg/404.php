<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package medpro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if( get_field( 'banner', 13 ) ) : ?>
				<div class="banner" style="background-image: url('<?php the_field( 'banner', 13 ); ?>');">
					<div class="container">
						<p class="title">Error 404</p>
					</div>
				</div>
			<?php endif; ?>	

			<div class="error">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Page Not Found.</h1>
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
