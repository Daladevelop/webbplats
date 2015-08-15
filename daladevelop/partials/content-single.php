<main id="main" class="site-main" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class( !is_front_page() ? 'single-entry' : '' ); ?>>
        <header class="entry-header">
            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

            <?php if ( !( is_front_page() && is_main_query() ) && !is_page() ) : ?>
                <div class="entry-meta">
                    Skrivet: <span class="date"><?php the_time( 'j F, Y' ); ?></span> av: <span><?php the_author(); ?></span>
                </div>
            <?php endif; ?>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <?php
            if ( is_single() && ( comments_open() || get_comments_number() ) ) :
                comments_template();
            endif;
        ?>
    </article>
</main>

<?php
    if ( ! is_front_page() ) {
        get_template_part( 'partials/latest-posts' );
    }
?>