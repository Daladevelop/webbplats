<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <div class="entry-meta">
            Skrivet: <span class="date"><?php the_time( 'j F, Y' ); ?></span> av: <span><?php the_author(); ?></span>
        </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-thumbnail">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
</article>