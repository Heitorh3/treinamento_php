<?php

require 'bootstrap.php';

try {

    $data = router();

    if ( isAjax() ) {
        die();
    }

    if ( !isset( $data[ 'data' ] ) ) {
        throw new Exception( 'O índice [data] está faltando' );
    }

    if ( !isset( $data[ 'data' ][ 'title' ] ) ) {
        throw new Exception( 'O índice [title] está ausente!' );
    }

    if ( !isset( $data[ 'view' ] ) ) {
        throw new Exception( 'O índice [view] está ausente!' );
    }

    if ( !file_exists( VIEWS.$data[ 'view' ].'.view.php' ) ) {
        throw new Exception( "Essa view {$data['view']} não existe" );
    }

    // Create new Plates instance
    $templates = new League\Plates\Engine( VIEWS );

    // Render a template
    echo $templates->render( $data[ 'view' ].'.view', $data[ 'data' ] );

    //extract( $data[ 'data' ] );

    //$view = $data[ 'view' ].'.view.php';

    //require VIEWS.'index.view.php';
} catch ( Throwable $e ) {
    \Sentry\captureException( $e );

    echo $e->getMessage();
}