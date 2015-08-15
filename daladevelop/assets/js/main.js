define( [], function() {
  var $body = jQuery( 'body' );

	$body.on( 'click', '#offcanvas-toggle, #offcanvas-close', function( e ) {
    $body.toggleClass( 'offcanvas' );

    e.preventDefault();
  } );
} );