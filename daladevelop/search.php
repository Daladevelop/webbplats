<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <header class="page-header">
        <h1 class="page-title"><?php printf( 'Sökresultat för: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>

    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/content', 'search' ); ?>
    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>
<?php else : ?>
    <?php get_template_part( 'partials/content', 'none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
