<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RokoPhoto
 */
?>

<!-- Blog post -->
<div <?php post_class( 'blog-post' ); ?> id="post-<?php the_ID(); ?>">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="post wow fadeIn" data-wow-duration="2s">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php
			if ( has_post_thumbnail() && ! post_password_required() ) {
				the_post_thumbnail(
					'full',
					array(
						'class' => 'img-responsive',
					)
				);
			}
			?>
			<div class="post-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
