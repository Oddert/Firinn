<?php
/**
 * The navbar
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Firinn
 */

?>

<header id="masthead" class="site-header">
		<div class='site-header__wrapper'>
			<div class='site-header__wrapper--inner'>

				<div class="site-branding">

				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
				?>

				<h1 class="site-title">
					<a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<?php
					else :

						$title = get_the_title(); 
						$title_should_hide = 'preffer-topbar';
						if ( strlen( $title ) > 60 ) {
							$title_should_hide = '';
						}

						if ( is_singular() ) {
							the_title( '<h1 class="site-title ' . $title_should_hide . '">', '</h1>' );
						} else {
							the_title( '<h2 class="site-title ' . $title_should_hide . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
					
					endif;
					
					// $robynVeitch_description = get_bloginfo( 'description', 'display' );
					// if ( $robynVeitch_description || is_customize_preview() ) :
				?>
				<!--<p class="site-description">
					<?php //echo $robynVeitch_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</p>-->
				<?php 
					// endif; 
				?>

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<i class='fa fa-chevron-left'></i>
						<i class='fa fa-chevron-right'></i>
					</button>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
        </nav><!-- #site-navigation -->
        
        <div class='site-search'>
          <div class="site-search--inner">
            <img src="/wp-content/uploads/2020/09/cropped-redux-logo.png" alt="search bar">
          </div>
        </div>

			</div><!-- .site-header__wrapper--inner -->
		</div><!-- .site-header__wrapper -->
	</header><!-- #masthead -->