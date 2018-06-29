<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfg
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">
				<div class="row">
					<?php $blog_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1 ) ); ?>
				    <?php if ( $blog_query->have_posts() ) : ?>
				        <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();  ?>
				        	<p class="title"><?php the_title(); ?></p>
				        	<?php the_date( 'M, d, Y' ); ?>
				        	<?php the_content(); ?>
				        <?php endwhile; ?>
				    	<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
