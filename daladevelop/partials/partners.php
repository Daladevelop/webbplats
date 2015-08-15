<section class="section-partners">
    <h2>Partners och sponsorer</h2>

    <div class="grids">
        <div class="mq1-column-50">
            <?php the_field( 'partners-content' ); ?>
        </div>

        <div class="mq1-column-50">
            <?php
                $partners = new WP_Query( array(
                    'post_type' => 'partner',
                    'posts_per_page' => -1
                ) );
            ?>

            <?php if ( $partners->have_posts() ) : ?>
                <ul class="partner-list">
                    <?php while ( $partners->have_posts() ) : $partners->the_post(); ?>
                        <li class="partner">
                            <?php
                                $url = get_field( 'url' );
                                $thumbnail = get_the_post_thumbnail();

                                echo $url ? '<a href="' . $url . '">' . $thumbnail . '</a>' : $thumbnail;
                            ?>

                            <span class="partner-contribution">
                                <?php the_field( 'contribution' ); ?>
                            </span>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <?php
                wp_reset_query();
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>