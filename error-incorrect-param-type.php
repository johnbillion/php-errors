<?php

// exception handler YES `TypeError -> Error -> Throwable`
// error handler     NO
// shutdown only     NO
// shutdown type     E_ERROR

// in PHP < 7 this isn't a fatal and can be caught in an error handler, type E_RECOVERABLE_ERROR

if ( ! function_exists( 'goodbye' ) ) {

    function goodbye( \SoapParam $one ) {
    }

}

goodbye( 'one' );
