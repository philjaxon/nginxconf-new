<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>


<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer>
	<div class="footer-section"
		<?php if ( get_field( 'background_image', 'option' ) ) { ?> style="background-image:url(<?php the_field( 'background_image', 'option' ); ?>)"
<?php } ?>>

<div class="footer-nginx-logo">
<?php if ( get_field( 'logo', 'option' ) ) { ?>
<a href="<?php the_field( 'logo_url', 'option' ); ?>"><img src="<?php the_field( 'logo', 'option' ); ?>" /></a>
<?php } ?>
</div>
		<nav class="footer-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'inner-wrap' ) ); ?>
		</nav>
	</div>
</footer>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
