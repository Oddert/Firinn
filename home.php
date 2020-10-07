<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package firinn
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rufina:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	

	<?php wp_head(); ?>
</head>

<?php get_template_part('template-parts/navigation/navbar') ?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site home">
<div data-firinn='home.php'></div>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'firinn' ); ?></a>

	<!-- <img src="https://cdn.pixabay.com/photo/2018/03/19/18/20/tea-time-3240766_1280.jpg" alt="" class="background-image"> -->

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php			
				$firinn_description = get_bloginfo( 'description', 'display' );
				if ( $firinn_description || is_customize_preview() ) :
			?>
			<p class="site-description noshow"><?php echo $firinn_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'firinn' ); ?></button>
			<?php
			// wp_nav_menu(
			// 	array(
			// 		'theme_location' => 'menu-1',
			// 		'menu_id'        => 'primary-menu',
			// 	)
			// );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->


	<main id="primary" class="site-main">
	
		<div class='intro'>
			<h1>
				<?php #echo the_title(); ?>
				Bespoke reading lists, tailored for you
			</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<button>
				View Books
				<i class='fa fa-arrow-right'></i>
			</button>
		</div>

		<div class='home-cta'>
			<div class="home-cta--inner">
				<p class=''>
					<a href="/">
						View Locations and read the Visitor Guidlines <i class="fa fa-map"></i>
					</a>
				</p>
			</div>
		</div>

	</main>

	<?php 
		get_sidebar();
		get_footer();
	?>