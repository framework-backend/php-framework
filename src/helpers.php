<?php

if ( !function_exists( 'debug' ) ) {
    function debug( $arg ) {
        echo '<pre style="background-color: #eee;color:#212121;font-size:18px;padding:1rem;border:1px solid #212121;border-radius:6px">';
        echo print_r( $arg, true );
        echo '</pre>';
    }
}
