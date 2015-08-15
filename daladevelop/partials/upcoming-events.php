<?php
    $upcomingEvents = new WP_Query( array(
        'post_type' => 'evenemang',
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
        'posts_per_page' => 3
    ) );

    if ( $upcomingEvents->have_posts() ) :
?>
    <aside class="upcoming-events">
        <ul>
            <?php while ( $upcomingEvents->have_posts() ) : $upcomingEvents->the_post(); ?>
                <li class="upcoming-event">
                    <?php
                        $allTerms = get_the_terms( $post->ID, 'evenemangskategori' );

                        if ( $allTerms ) :
                    ?>
                        <span class="upcoming-event-type">
                            <?php
                                $firstTerm = array_pop($allTerms);
                                echo $firstTerm->name;
                            ?>
                        </span>
                    <?php endif; ?>

                    <span class="upcoming-event-date">
                        <?php echo date( 'd/m', get_field( 'date' ) ); ?>
                    </span>

                    <span class="upcoming-event-description">
                        <?php the_excerpt(); ?>
                    </span>

                    <a href="<?php the_permalink(); ?>" class="cover">&nbsp;</a>
                </li>
            <?php
                endwhile;

                wp_reset_query();
                wp_reset_postdata();
            ?>
        </ul>

        <div class="text-center">
            <a href="<?php echo get_post_type_archive_link( 'evenemang' ); ?>" class="read-more-link">{ Visa fler planerade evenemang }</a>
        </div>
    </aside>
<?php endif; ?>