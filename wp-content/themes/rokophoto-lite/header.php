<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RokoPhoto
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Basic Page Needs
================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php global $wp_customize; ?>

	<?php
	$preloader_display = get_theme_mod( 'rokophotolite_disable_preloader' );
	if ( isset( $preloader_display ) && $preloader_display != 1 ) :
		?>
	<!-- Preloader
	================================================== -->
	<div id="preloader"><div id="status">&nbsp;</div></div>
	<?php endif; ?>

	<!-- Navigation
	================================================== -->
	<nav id="site-navigation" role="navigation" class="main-navigation navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="align-vertical">
				<div class="navbar-header page-scroll">
					<button type="button" class="menu-toggle navbar-toggle" aria-controls="menu" aria-expanded="false">
						<span class="sr-only"><?php _e( 'Toggle Navigation', 'rokophoto-lite' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php
					$logourl = get_theme_mod( 'rokophotolite_logo_image', get_template_directory_uri() . '/img/logo.png' );
					if ( ! empty( $logourl ) ) {
						echo '<a class="navbar-brand navbar-brand-logo" href="' . esc_url( home_url( '/' ) ) . '"><img src="' . $logourl . '" alt="logo"></a>';
						if ( isset( $wp_customize ) ) {
							echo '<a class="navbar-brand navbar-brand-title rokophoto_only_customizer" href="' . esc_url( home_url( '/' ) ) . '"><h4>' . get_bloginfo( 'name' ) . '</h4></a>';
						}
					} else {
						echo '<a class="navbar-brand navbar-brand-title" href="' . esc_url( home_url( '/' ) ) . '"><h4>' . get_bloginfo( 'name' ) . '</h4></a>';
						if ( isset( $wp_customize ) ) {
							echo '<a class="navbar-brand navbar-brand-logo rokophoto_only_customizer" href="' . esc_url( home_url( '/' ) ) . '"><img src="' . $logourl . '" alt="logo"></a>';
						}
					}
					?>


				</div>

				<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'menu'            => 'Primary Menu',
								'container_class' => 'menu-container',
								'fallback_cb'     => 'rokophoto_new_setup',
								'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
							)
						);
						?>
			</div>
		</div>
	</nav><!-- #site-navigation -->

	<!-- Blog
	================================================== -->
	<section id="blog" style="background-image: url('<?php header_image(); ?>');">
	<div class="dark-overlay vision">
		<div class="centered vision-border wow bounceIn">
			<?php
			$subheadtitle = get_theme_mod( 'rokophotolite_subhead_title', __( 'Welcome to', 'rokophoto-lite' ) );
			if ( ! empty( $subheadtitle ) ) {
				echo '<h4>' . $subheadtitle . '</h4>';
			}
			?>
			<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
			<?php get_template_part( 'loop-meta' ); ?>
		</div>
	</div>
</section>
