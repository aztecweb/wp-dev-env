<?php get_header() ?>

<main>
	<section>
        <?php while( have_posts() ) : the_post(); ?>
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