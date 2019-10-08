<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RokoPhoto
 */

get_header(); ?>
	<!-- Blog Posts
	================================================== -->
	<?php get_sidebar(); ?>
	<div class="blog">
		<div class="container">
			<div class="row">

			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					?>
						<?php get_template_part( 'content' ); ?>
				<?php endwhile; ?>

				<!-- Pagination -->
				<?php rokophoto_pagination(); ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			</div>
		</div>
	</div>
	<?php get_sidebar( 'bottom' ); ?>

<?php get_footer(); ?>
