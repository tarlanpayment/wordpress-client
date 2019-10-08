<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RokoPhoto
 */

global $wp_customize;
$rokophoto_social_display_settings = get_theme_mod( 'rokophotolite_social_display_settings' );

if ( ( isset( $rokophoto_social_display_settings ) && $rokophoto_social_display_settings != 1 ) || isset( $wp_customize ) ) :
	?>

<!-- About Section
================================================== -->
<section id="bsocials" 
	<?php
	if ( $rokophoto_social_display_settings == 1 && isset( $wp_customize ) ) {
		echo 'class="rokophoto_only_customizer" ';
	}
	?>
>
	<div class="container wow bounceIn" data-wow-delay="0.8s">
		<?php
		$socialtext  = get_theme_mod( 'rokophotolite_social_text', __( 'Follow Me', 'rokophoto-lite' ) );
		$sociallabel = get_theme_mod( 'rokophotolite_social_label', __( 'To get the latest update of me and my works', 'rokophoto-lite' ) );
		if ( ! empty( $sociallabel ) ) {
			echo '<p class="social-label"> ' . $sociallabel . ' </p>';
		}
		if ( ! empty( $socialtext ) ) {
			echo '<p class="social-text">  &gt;&gt; <span class="follow"> ' . $socialtext . ' </span>  &lt;&lt; </p>';
		}
		?>
		<ol class="social">
			<?php
			$rokophoto_link_tab = get_theme_mod( 'rokophotolite_link_tab' );
			$facebookurl        = get_theme_mod( 'rokophotolite_facebook_link', '#' );
			$twitterurl         = get_theme_mod( 'rokophotolite_twitter_link', '#' );
			$behanceurl         = get_theme_mod( 'rokophotolite_behance_link', '#' );
			$dribbbleurl        = get_theme_mod( 'rokophotolite_dribbble_link', '#' );
			$flickrurl          = get_theme_mod( 'rokophotolite_flickr_link', '#' );
			$googleplusurl      = get_theme_mod( 'rokophotolite_googleplus_link', '#' );
			$instagramurl       = get_theme_mod( 'rokophotolite_instagram_link', '#' );
			$linkedinurl        = get_theme_mod( 'rokophotolite_linkedin_link' );
			$mailurl            = get_theme_mod( 'rokophotolite_mail_link' );
			if ( isset( $rokophoto_link_tab ) && $rokophoto_link_tab == 1 ) {
				$target = '_blank';
			} else {
				$target = '_self';
			}
			if ( ! empty( $facebookurl ) || isset( $wp_customize ) ) {
				if ( empty( $facebookurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-fa rokophoto_only_customizer">';
				} else {
					echo '<li class="social-fa">';
				}
				echo '<a target="' . $target . '" href="' . $facebookurl . '"><i class="fa fa-facebook fa-2x"></i></a></li>';
			}

			if ( ! empty( $twitterurl ) || isset( $wp_customize ) ) {
				if ( empty( $twitterurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-tw rokophoto_only_customizer">';
				} else {
					echo '<li class="social-tw">';
				}
				echo '<a target="' . $target . '" href="' . $twitterurl . '"><i class="fa fa-twitter fa-2x"></i></a></li>';
			}

			if ( ! empty( $behanceurl ) || isset( $wp_customize ) ) {
				if ( empty( $behanceurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-be rokophoto_only_customizer">';
				} else {
					echo '<li class="social-be">';
				}
				echo '<a target="' . $target . '" href="' . $behanceurl . '"><i class="fa fa-behance fa-2x"></i></a></li>';
			}

			if ( ! empty( $dribbbleurl ) || isset( $wp_customize ) ) {
				if ( empty( $dribbbleurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-dr rokophoto_only_customizer">';
				} else {
					echo '<li class="social-dr">';
				}
				echo '<a target="' . $target . '" href="' . $dribbbleurl . '"><i class="fa fa-dribbble fa-2x"></i></a></li>';
			}

			if ( ! empty( $flickrurl ) || isset( $wp_customize ) ) {
				if ( empty( $flickrurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-fl rokophoto_only_customizer">';
				} else {
					echo '<li class="social-fl">';
				}
				echo '<a target="' . $target . '" href="' . $flickrurl . '"><i class="fa fa-flickr fa-2x"></i></a></li>';
			}

			if ( ! empty( $googleplusurl ) || isset( $wp_customize ) ) {
				if ( empty( $googleplusurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-go rokophoto_only_customizer">';
				} else {
					echo '<li class="social-go">';
				}
				echo '<a target="' . $target . '" href="' . $googleplusurl . '"><i class="fa fa-google-plus fa-2x"></i></a></li>';
			}

			if ( ! empty( $instagramurl ) || isset( $wp_customize ) ) {
				if ( empty( $instagramurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-in rokophoto_only_customizer">';
				} else {
					echo '<li class="social-in">';
				}
				echo '<a target="' . $target . '" href="' . $instagramurl . '"><i class="fa fa-instagram fa-2x"></i></a></li>';
			}

			if ( ! empty( $linkedinurl ) || isset( $wp_customize ) ) {
				if ( empty( $linkedinurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-li rokophoto_only_customizer">';
				} else {
					echo '<li class="social-li">';
				}
				echo '<a target="' . $target . '" href="' . $linkedinurl . '"><i class="fa fa-linkedin fa-2x"></i></a></li>';
			}

			if ( ! empty( $mailurl ) || isset( $wp_customize ) ) {
				if ( empty( $mailurl ) && isset( $wp_customize ) ) {
					echo '<li class="social-em rokophoto_only_customizer">';
				} else {
					echo '<li class="social-em">';
				}
				echo '<a href="mailto:' . $mailurl . '"><i class="fa fa-envelope fa-2x"></i></a></li>';
			}
			?>
		</ol>
	</div>
</section>
<?php endif; ?>
<div id="footer-nav">  <!-- Copyright notice on the bottom -->
	<span>
		<?php
		$copyright = get_theme_mod( 'rokophotolite_footer_copyrights', __( 'Awesome Photography. All Rights Reserved', 'rokophoto-lite' ) );
		if ( ! empty( $copyright ) ) {
			echo '<span class="cprts">' . $copyright . '</span>';
		}
		?>

		<br/>
		<?php
		$powered = get_theme_mod( 'rokophotolite_footer_powerdby', __( '<a href="https://themeisle.com/themes/rokophoto-lite/" target="_blank" rel="nofollow">RokoPhoto Lite</a> powered by <a href="https://wordpress.org/" target="_blank" rel="nofollow">WordPress</a>', 'rokophoto-lite' ) );
		if ( ! empty( $powered ) ) {
			echo '<span class="pwred">' . $powered . '</span>';
		}
		?>
	</span>
</div>

<?php wp_footer(); ?>

</body>
</html>
