<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage MyEnvPress
 * @since 0.1.0
 * @version 0.1.0
 */

get_header(); ?>

	<main>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>

			<?php the_content(); ?>

			<?php comments_template(); ?>

		</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
