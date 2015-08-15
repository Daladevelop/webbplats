<main id="main" class="site-main" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class( !is_front_page() ? 'single-entry' : '' ); ?>>
        <header class="entry-header">
            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        </header>

        <div class="event-details clearfix">
            <?php
                $allTerms = get_the_terms( $post->ID, 'evenemangskategori' );

                if ( $allTerms ) :
            ?>
                <span class="upcoming-event-type">
                    <?php
                        $firstTerm = array_pop( $allTerms );
                        echo $firstTerm->name;
                    ?>
                </span>
            <?php endif; ?>

            <span class="upcoming-event-date">
                <?php echo date( 'd/m', get_field( 'date' ) ); ?>
            </span>

            <ul>
                <li>Datum: <?php echo date( 'Y-m-d', get_field( 'date' ) ); ?>, klockan <?php the_field( 'time' ); ?></li>

                <?php
                    $location = get_field( 'location' );

                    if ( $location ) {
                        printf( '<li>%1s: %2s</li>', 'Plats', $location );
                    }
                ?>
            </ul>
        </div>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </article>
</main>