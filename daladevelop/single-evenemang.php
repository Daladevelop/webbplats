<?php get_header(); ?>

<?php
    while ( have_posts() ) : the_post();
        get_template_part( 'partials/content', 'evenemang' );
    endwhile;
?>

<?php get_footer(); ?>