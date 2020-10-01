<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package firinn
 */

?>
	
	<div data-firinn='footer.php'></div>
	<footer id="colophon" class="site-footer noshow">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'firinn' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				// printf( esc_html__( 'Proudly powered by %s', 'firinn' ), 'WordPress' );
				?>
			</a>
			<!-- <span class="sep"> | </span> -->
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'firinn' ), 'firinn', '<a href="http://robynveitch.com">Robyn F H Veitch</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
