<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sfg
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" />

	<?php wp_head(); ?>
</head>

<body class="<?php echo ( !is_front_page() ? 'inner' : 'home' ) ?> page-<?php echo $post->post_name; ?> <?php echo ( $post->post_parent === 6 ? 'sub-service' : '' ) ?> page-<?php echo $post->post_name; ?>" <?php body_class(); ?>>

<div class="site">
	<header class="header">
		<nav class="navbar navbar-default" data-spy="affix" data-offset-top="87">
			<div class="container">
				<div class="primary">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?php echo bloginfo( 'siteurl' ); ?>"><img class="img-responsive center-block" src="<?php the_field( 'logo_large', 'option' ); ?>" alt="Logo" /></a>
					</div>
					<?php if( get_field( 'office', 'options' ) ) : ?>
						<ul class="office">
							<?php while ( have_rows( 'office', 'options' ) ) : the_row(); ?>
								<?php $phone_number = str_replace( [ "(", ")", " ", "-", "–", "." ], '', get_sub_field( 'phone_number', 'options' ) ); ?>
								<li><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php the_sub_field( 'name' ); ?></span><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $phone_number; ?>"><?php the_sub_field( 'phone_number' ); ?></a></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php wp_nav_menu( array( 'menu' => 'primary', 'depth' => 2, 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'navbar', 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
				</div>
			</div>
		</nav>
	</header>
	
	<div id="content" class="site-content">
