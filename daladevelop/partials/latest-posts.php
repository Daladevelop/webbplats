<section class="section-latest-posts">
    <div class="grids">
        <?php
            $latestPosts = new WP_Query( array(
                'posts_per_page' => 2
            ) );
        ?>

        <?php if ( $latestPosts->have_posts() ) : while ( $latestPosts->have_posts() ) : $latestPosts->the_post(); ?>
            <div class="mq1-column-50">
                <?php get_template_part( 'partials/content' ); ?>

                <div class="text-center">
                    <a class="read-more-link read-more" href="<?php echo get_permalink( get_the_ID() ) ?>">{ Läs mer }</a>
                </div>
            </div>
        <?php
            endwhile; endif;

            wp_reset_query();
            wp_reset_postdata();
        ?>
    </div>
</section>