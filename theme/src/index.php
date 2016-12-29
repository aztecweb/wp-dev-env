<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage MyEnvPress
 * @since 0.1.0
 * @version 0.1.0
 */

get_header(); ?>

<main>
	<section>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_post_thumbnail( 'full' ) ?>

			<h2>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute()?>"><?php the_title() ?></a>
			</h2>

			<?php the_excerpt() ?>

		</article>
		<?php endwhile; ?>

		<p><?php posts_nav_link(); ?></p>
	</section>
</main>
<?php get_footer() ?>
