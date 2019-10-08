<?php
/**
 * The loop template
 *
 * @package RokoPhoto
 */

if ( is_home() ) : ?>

	<h6><?php bloginfo( 'description' ); ?></h6>

<?php elseif ( is_single() ) : ?>
	<?php if ( has_category() ) : ?>
		<?php $category = get_the_category(); ?>
		<h6>
			<?php
			/* translators: %1$s is category name , %2$s is the category link and %3$s is the title */
			printf( __( 'Home / <a href="%2$s">%1$s</a> / %3$s', 'rokophoto-lite' ), $category[0]->name, get_category_link( $category[0]->term_id ), get_the_title() );
			?>
		</h6>
	<?php elseif ( 'portfolio' == get_post_type() ) : ?>
		<h6>
			<?php
			/* translators: %1$s is the title */
			printf( __( 'Home / Portfolio / %1$s', 'rokophoto-lite' ), get_the_title() );
			?>
		</h6>
	<?php else : ?>
		<h6>
			<?php
			/* translators: %1$s is the title */
			printf( __( 'Home / %1$s', 'rokophoto-lite' ), get_the_title() );
			?>
		</h6>
	<?php endif; ?>
<?php elseif ( is_page() ) : ?>
	<h6>
		<?php
		/* translators: %1$s is the title */
		printf( __( 'Home / %1$s', 'rokophoto-lite' ), get_the_title() );
		?>
	</h6>
<?php elseif ( is_category() ) : ?>
	<h6><?php single_cat_title( 'Home / ', 'rokophoto' ); ?> </h6>
<?php elseif ( is_tag() ) : ?>
	<h6><?php single_tag_title( 'Home / ', 'rokophoto' ); ?> </h6>
<?php elseif ( is_tax() ) : ?>
	<h6><?php single_term_title( 'Home / ', 'rokophoto' ); ?> </h6>
<?php elseif ( is_author() ) : ?>
	<?php $user_id = get_query_var( 'author' ); ?>
	<h6>
		<?php
		/* translators: %1$s is the author name */
		printf( __( 'Posts By: %1$s', 'rokophoto-lite' ), get_the_author_meta( 'display_name', $user_id ) );
		?>
	</h6>
<?php elseif ( is_day() || is_month() || is_year() ) : ?>
	<?php
	if ( is_day() ) {
		$date = get_the_time( __( 'F d, Y', 'rokophoto-lite' ) );
	} elseif ( is_month() ) {
		$date = get_the_time( __( 'F Y', 'rokophoto-lite' ) );
	} elseif ( is_year() ) {
		$date = get_the_time( __( 'Y', 'rokophoto-lite' ) );
	}
	?>
	<h6><?php echo $date; ?></h6>
<?php elseif ( is_archive() ) : ?>
	<h6><?php _e( 'Archives', 'rokophoto-lite' ); ?></h6>
<?php elseif ( is_404() ) : ?>
	<h6><?php _e( 'Ouch!', 'rokophoto-lite' ); ?></h6>
<?php endif; ?>
