<?php

// in PHP < 7 this isn't a fatal and can be caught in an error handler, type E_RECOVERABLE_ERROR

function goodbye( \SoapParam $one ) {}

goodbye( 'one' );
