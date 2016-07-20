<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?></title>
<?php wp_head(); ?>
</head>
<body>
    <?php while( have_posts() ) : the_post(); ?>
        <h1><?php the_title() ?></h1>
        <?php the_content() ?>
    <?php endwhile; ?>

    <?php wp_footer(); ?>    
</body>
</html>