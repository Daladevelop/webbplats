<?php
    $eventCategories = get_terms( 'evenemangskategori', array() );

    if ( count( $eventCategories ) > 0 ) :
?>
    <section class="section-event-categories">
        <?php
            foreach ( $eventCategories as $eventCategory ) :
                $nextEvent = new WP_Query( array(
                    'post_type' => 'evenemang',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'evenemangskategori',
                            'field'    => 'id',
                            'terms'    => $eventCategory->term_id,
                        )
                    ),
                    'meta_key' => 'date',
                    'meta_query' => array(
                        array(
                            'key' => 'date',
                            'value' => date( 'Y-m-d' ),
                            'type' => 'DATE',
                            'compare' => '>='
                        )
                    ),
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'posts_per_page' => 1
                ) );
        ?>

            <div class="event-category">
                <div class="event-category-image">
                    <?php if ( $termImage = get_field( 'thumbnail', 'evenemangskategori_' . $eventCategory->term_id ) ) : ?>
                        <img src="<?php echo $termImage; ?>" alt="" />
                    <?php endif; ?>
                </div>

                <div class="event-category-content">
                    <h2 class="event-category-name"><?php echo $eventCategory->name; ?></h2>

                    <p><?php echo $eventCategory->description; ?></p>

                    <?php if ( $nextEvent->have_posts() ) : while ( $nextEvent->have_posts() ) : $nextEvent->the_post(); ?>
                        <a href="<?php the_permalink() ?>">
                            Nästa <?php echo strtolower( $eventCategory->name ); ?> är den <?php echo date( 'd/m', get_field( 'date' ) ); ?>
                        </a>
                    <?php endwhile; endif; ?>
                </div>
            </div>

        <?php endforeach; ?>

        <?php
            wp_reset_query();
            wp_reset_postdata();
            unset( $people );
        ?>
    </section>
<?php endif; ?>