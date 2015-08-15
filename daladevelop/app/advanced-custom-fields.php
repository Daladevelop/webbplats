<?php

function daladevelop_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/app/advanced-custom-fields';
    return $path;
}

function daladevelop_acf_json_load_point( $paths ) {
    unset( $paths[ 0 ] );
    $paths[] = get_stylesheet_directory() . '/app/advanced-custom-fields';
    return $paths;
}