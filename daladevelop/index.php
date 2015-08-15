<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'partials/content', get_post_format() ); ?>
        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <?php get_template_part( 'partials/content', 'none' ); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>