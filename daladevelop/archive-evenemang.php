<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <header class="page-header">
        <h1 class="entry-title">Kommande evenemang</h1>
    </header>

    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'partials/content', 'single' );
        endwhile;
    ?>
<?php else : ?>
    <p>Just nu har vi inga planerade evenemang.</p>
<?php endif; ?>

<?php get_footer(); ?>