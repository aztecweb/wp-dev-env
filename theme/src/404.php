<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage MyEnvPress
 * @since 0.1.0
 * @version 0.1.0
 */

get_header(); ?>

	<main>
		<section>
			<article id="post-not-found" class="post-not-found">

				<h1>Page not found</h1>
				<p>
					<a href="<?php echo esc_url( home_url() ); ?>">Back to home</a>
				</p>

			</article>
		</section>
	</main>

<?php get_footer(); ?>
