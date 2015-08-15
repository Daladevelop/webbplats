<?php if ( defined( 'INSTAGRAM_CLIENT_ID' ) ) : ?>
    <section class="section-instagram">
        <h2 class="instagram-header">Instagram</h2>

        <?php
            $instagramFeed = get_transient( 'daladevelop-instagram' );

            if ( ! $instagramFeed ) {
                $response = wp_remote_request( 'https://api.instagram.com/v1/tags/daladevelop/media/recent?count=6&client_id=' . INSTAGRAM_CLIENT_ID );
                $instagram = '';

                if ( !is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) == 200 ) {
                    $json = json_decode( wp_remote_retrieve_body( $response ), true );

                    if ( isset( $json[ 'data' ] ) && count( $json[ 'data' ] ) > 0 ) {
                        foreach ( $json[ 'data' ] as $image ) {
                            $instagram .= '<div class="column-33 mq1-column-16"><a href="' . $image[ 'link' ] . '"><img src="' . esc_url( $image[ 'images' ][ 'low_resolution' ][ 'url' ] ) . '" width="320" height="320" alt="" /></a></div>';
                        }

                        $instagram = '<div class="grids">' . $instagram . '</div>';
                    }

                    set_transient( 'daladevelop-instagram', $instagram, 600 );
                    $instagramFeed = get_transient( 'daladevelop-instagram' );
                }
            }

            echo $instagramFeed;
        ?>

        <a href="https://instagram.com/explore/tags/daladevelop/" class="tag-link">#daladevelop</a>
    </section>
<?php endif; ?>