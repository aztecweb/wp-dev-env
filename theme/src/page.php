<?php get_header(); ?>

	<main>
    	<?php while (have_posts()) : the_post(); ?>
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
