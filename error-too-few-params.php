<?php

// exception handler YES `ArgumentCountError -> TypeError -> Error -> Throwable`
// error handler     NO
// shutdown only     NO
// shutdown type     E_ERROR

if ( ! function_exists( 'hello' ) ) {

    function hello( $one, $two ) {
    }

}

hello( 'one' );
