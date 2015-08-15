<section class="section-contact">
    <div class="grids">
        <div class="mq1-column-50">
            <h2>Kontakta föreningen</h2>
            <?php the_field( 'contact-content' ); ?>
        </div>

        <div class="mq1-column-50">
            <?php
                $form_object = get_field( 'contact-form' );
                echo do_shortcode( '[gravityform id="' . $form_object[ 'id' ] . '" title="false" description="false" ajax="true" ]');
            ?>
        </div>
    </div>
</section>