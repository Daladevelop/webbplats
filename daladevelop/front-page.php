<?php get_header(); ?>

<div class="grids">
    <div class="mq1-column-50">
        <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part( 'partials/content', 'single' );
            endwhile; endif;
        ?>
    </div>

    <div class="mq1-column-50">
        <?php get_template_part( 'partials/upcoming-events' ); ?>
    </div>
</div>

<?php get_template_part( 'partials/instagram' ); ?>

<?php get_template_part( 'partials/latest-posts' ); ?>

<?php get_template_part( 'partials/event-categories' ); ?>

<?php get_template_part( 'partials/partners' ); ?>

<?php get_template_part( 'partials/contact' ); ?>

<?php get_footer(); ?>