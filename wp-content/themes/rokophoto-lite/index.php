<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
<?php
get_sidebar( 'bottom' );
get_footer();
?>
