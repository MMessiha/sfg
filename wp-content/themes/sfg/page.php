<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfg
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
				
			<?php if( get_field( 'banner' ) ) : ?>
				<div class="banner" style="background-image: url('<?php the_field( 'banner' ); ?>');">
					<div class="container">
						<?php if( is_page( 'about-us' ) ) : ?>
							<p class="title">About the firm</p>
						<?php elseif( is_page( 'reinstatement-payoff-requests' ) ) : ?>
							<p class="title">reinstatement <br> & payoff requests</p>
						<?php elseif( $post->post_parent === 6 ) : ?>
							<p class="title">Services <span><?php the_title(); ?></span></p>
						<?php else : ?>
							<p class="title"><?php the_title(); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php if( is_page( 'attorneys' ) ) : ?>

				<div class="attorneys">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php if( get_field( 'item' ) ) : ?>
									<div class="item">
										<?php while ( have_rows( 'item' ) ) : the_row(); ?>
											<p class="title"><?php the_sub_field( 'name' ); ?> <span><?php the_sub_field( 'position' ); ?></span></p>
											<div class="row">
												<div class="col-md-5">
													<div class="education">
														<img src="<?php echo bloginfo( 'template_url' ); ?>/img/education.png">
														<p class="heading">Education</p>
														<ul>
														<?php while ( have_rows( 'education' ) ) : the_row(); ?>
															<li><?php the_sub_field( 'content' ); ?></li>
														<?php endwhile; ?>
														</ul>
													</div>
												</div>
												<div class="col-md-3">
													<div class="bar-admissions">
														<img src="<?php echo bloginfo( 'template_url' ); ?>/img/bar-admissions.png">
														<p class="heading">Bar Admissions</p>
														<ul>
														<?php while ( have_rows( 'bar_admissions' ) ) : the_row(); ?>
															<li><?php the_sub_field( 'content' ); ?></li>
														<?php endwhile; ?>
														</ul>
													</div>
												</div>
												<div class="col-md-4">
													<div class="courts">
														<img src="<?php echo bloginfo( 'template_url' ); ?>/img/courts.png">
														<p class="heading">Courts</p>
														<ul>
														<?php while ( have_rows( 'courts' ) ) : the_row(); ?>
															<li><?php the_sub_field( 'content' ); ?></li>
														<?php endwhile; ?>
														</ul>
													</div>
												</div>
											</div>
											<?php the_sub_field( 'content' ); ?>
											<hr>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

			<?php elseif( is_page( 'about-us' ) ) : ?>

				<div class="about">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="content"><?php the_field( 'content' ); ?></div>
							</div>
						</div>
					</div>
				</div>

				<?php if( have_rows( 'network', 'options' ) ) : ?>
					<div class="network">
						<div class="firms">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<p>we are part of a national Network of law firms</p>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<ul>
										<?php while ( have_rows( 'network', 'options' ) ) : the_row(); ?>
										<li><?php the_sub_field( 'location' ); ?></li>
										<?php endwhile; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>

			<?php elseif( $post->post_parent === 6 ) : ?>

				<div class="services">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<p class="heading"><?php the_title(); ?></p>
								<div class="content"><?php the_field( 'content' ); ?></div>
							</div>
							<div class="col-md-3">
								<p class="title">Practice Areas</p>
								<ul>
								<?php while ( have_rows( 'practice_areas', 6 ) ) : the_row(); ?>
									<?php $service = strtolower(get_sub_field( 'content' )); ?>
									<a class="<?php echo ( $post->post_name === $service ? 'active' : '' ) ?>" href="<?php the_sub_field( 'link' ); ?>"><li><?php the_sub_field( 'content' ); ?></li></a>
								<?php endwhile; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>

			<?php elseif( is_page( 'blog' ) ) : ?>

				<div class="blog">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<?php $news_query = new WP_Query( array( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
			    				<?php if ( $news_query->have_posts() ) : ?>
			    					<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
										<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive center-block image' ) ); ?>
		    							<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		    							<p class="date"><?php the_date( 'l, F j, Y' ); ?></p>
		    							<?php echo do_shortcode( '[DISPLAY_ULTIMATE_SOCIAL_ICONS]' ); ?>
										<p><?php the_excerpt(); ?></p>
										<p class="text-right"><a href="<?php the_permalink(); ?>" class="button">Read More</a></p>
										<hr>
			    					<?php endwhile; ?>
			    				<?php endif; ?>
							</div>
							<div class="col-md-4">
								<div class="sidebar">
									<?php dynamic_sidebar( 'sidebar-1' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>


			<?php elseif( $post->post_parent === 6 ) : ?>

				<div class="service">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php while ( have_rows( 'content_1' ) ) : the_row(); ?>
									<div class="content-1">
										<img class="pull-left img-responsive" src="<?php the_sub_field( 'image' ); ?>">
										<p class="title"><?php the_sub_field( 'title' ); ?></p>
										<div class="content"><?php the_sub_field( 'content' ); ?></div>
									</div>
								<?php endwhile; ?>
								<?php while ( have_rows( 'content_2' ) ) : the_row(); ?>
									<div class="content-2">
										<img class="pull-right img-responsive" src="<?php the_sub_field( 'image' ); ?>">
										<p class="title"><?php the_sub_field( 'title' ); ?></p>
										<div class="content"><?php the_sub_field( 'content' ); ?></div>									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>

			<?php elseif( is_page( 'reinstatement-payoff-requests' ) ) : ?>

				<div class="reinstatement">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="content-1"><?php the_field( 'content_1' ); ?></div>
								<?php if( get_field( 'request' ) ) : ?>
									<?php while ( have_rows( 'request' ) ) : the_row(); ?>
										<p class="title"><?php the_sub_field( 'title' ); ?></p>
										<ol>
											<?php while ( have_rows( 'item' ) ) : the_row(); ?>
												<li><?php the_sub_field( 'content' ); ?></li>
											<?php endwhile; ?>
										</ol>
									<?php endwhile; ?>
								<?php endif; ?>
								<div class="content-2"><?php the_field( 'content_2' ); ?></div>
							</div>
						</div>
					</div>
				</div>

			<?php elseif( is_page( 'contact-us' ) ) : ?>

				<div class="info">
					<div class="container">
						<?php if( get_field( 'office', 'options' ) ) : ?>
							<?php while ( have_rows( 'office', 'options' ) ) : the_row(); ?>
								<?php $phone_number = str_replace( [ "(", ")", " ", "-", "–", "." ], '', get_sub_field( 'phone_number', 'options' ) ); ?>
								<?php $fax_number = str_replace( [ "(", ")", " ", "-", "–", "." ], '', get_sub_field( 'fax_number', 'options' ) ); ?>
								<div class="item">
									<div class="row">
										<div class="col-md-6">
											<ul class="office">
												<li class="place"><?php the_sub_field( 'name' ); ?></li>
												<li class="state"><?php the_sub_field( 'state' ); ?></li>
												<li class="address"><i class="fa fa-map-marker" aria-hidden="true"></i><?php the_sub_field( 'location' ); ?></li>
												<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $phone_number; ?>"><?php the_sub_field( 'phone_number' ); ?></a><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $fax_number; ?>"><?php the_sub_field( 'fax_number' ); ?></a></li>
												<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php the_sub_field( 'email_1' ); ?>"><?php the_sub_field( 'email_1' ); ?></a><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php the_sub_field( 'email_2' ); ?>"><?php the_sub_field( 'email_2' ); ?></a></li>
												<li><img src="<?php the_sub_field( 'image' ); ?>"></li>
											</ul>
										</div>
										<div class="col-md-6">
											<?php the_sub_field( 'map' ); ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="blue">
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<p class="title"><?php the_field( 'title' ); ?></p>
								<p class="subtitle"><?php the_field( 'subtitle' ); ?></p>
								<?php $form = get_field( 'form_2' ); ?>
								<?php echo do_shortcode( $form ); ?>
								<?php the_field( 'content' ); ?>
							</div>
						</div>
					</div>
				</div>

			<?php else : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="error">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>

			<?php endif; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
