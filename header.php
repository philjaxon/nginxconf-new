<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );

// ACF vars
$nav_logo = get_field( 'nav_logo', 'option' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav  class="navbar navbar-expand-md navbar-dark fixed-top">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>

		<button type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
			<span class="navbar-toggler-icon"></span>
		</button>


<!-- Top Nav CTA buttons (mobile) -->
<div class="nav-cta-buttons-mobile">
		<?php if ( have_rows( 'top_nav_cta_buttons', 'option' ) ) : ?>
		<?php while ( have_rows( 'top_nav_cta_buttons', 'option' ) ) : the_row(); ?>
			<?php $cta_button = get_sub_field( 'cta_button' ); ?>
			<?php if ( $cta_button ) { ?>
				<a class="cta-button hide-on-desktop<?php
				// add class to hide button on mobile screens
				if ( get_sub_field( 'mobile_display' ) == 0 ) {?> hide-on-mobile<?php
				} else {
				 // don't add class;
				} ?>" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?>
			</a>
			<?php } ?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>
</div>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><
								<?php if ( $nav_logo ) { ?>
									<img src="<?php echo $nav_logo['url']; ?>" alt="<?php echo $nav_logo['alt']; ?>" />
								<?php } ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
								<?php if ( $nav_logo ) { ?>
									<img src="<?php echo $nav_logo['url']; ?>" alt="<?php echo $nav_logo['alt']; ?>" />
								<?php } ?>
							</a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->



				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>

				<!-- Top Nav CTA buttons (non-mobile) -->
				<div class="nav-cta-buttons">
				<?php if ( have_rows( 'top_nav_cta_buttons', 'option' ) ) : ?>
				<?php while ( have_rows( 'top_nav_cta_buttons', 'option' ) ) : the_row(); ?>
					<?php $cta_button = get_sub_field( 'cta_button' ); ?>
					<?php if ( $cta_button ) { ?>
						<a class="cta-button hide-on-mobile" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?>
					</a>
					<?php } ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
			</div>

			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
