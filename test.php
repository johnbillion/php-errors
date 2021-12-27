<?php

// Usage:
// php -f test.php error-syntax-error.php

global $caught_exception, $caught_error;

echo "\n" . str_pad( $argv[1], 31 );

$errors = [
	// Fatal
	E_ERROR             => 'E_ERROR',
	E_PARSE             => 'E_PARSE',
	E_CORE_ERROR        => 'E_CORE_ERROR',
	E_COMPILE_ERROR     => 'E_COMPILE_ERROR',
	E_USER_ERROR        => 'E_USER_ERROR',
	E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',

	// Warning
	E_WARNING           => 'E_WARNING',
	E_CORE_WARNING      => 'E_CORE_WARNING',
	E_COMPILE_WARNING   => 'E_COMPILE_WARNING',
	E_USER_WARNING      => 'E_USER_WARNING',

	// Notice
	E_NOTICE            => 'E_NOTICE',
	E_USER_NOTICE       => 'E_USER_NOTICE',

	// Strict
	E_STRICT            => 'E_STRICT',

	// Deprecated
	E_DEPRECATED        => 'E_DEPRECATED',
	E_USER_DEPRECATED   => 'E_USER_DEPRECATED',
];

set_exception_handler( function( $e ) {
	global $caught_exception;

	$caught_exception = $e;
	// echo(get_class($e)) . "\n";
	// echo($e->getCode()) . "\n";
	// echo($e->getMessage()) . "\n";
} );

set_error_handler(function(...$e) use ( $errors ) {
	global $caught_error;

	$caught_error = $e;
	// this doesn't catch fatals, but it does catch a E_USER_ERROR
	// echo($e[1]) . "\n";
	// echo($errors[ $e[0] ]) . "\n";
});

register_shutdown_function( function() use ( $errors ) {
	global $caught_exception, $caught_error;

	// this can see a fatal which isn't caught by the exception handler
	$e = error_get_last();

	if ( $e ) {
		// echo($e['type']) . "\n";
		// echo($errors[ $e['type'] ]) . "\n";
		// echo($e['message']) . "\n";
	} else {
		// echo('no error') . "\n";
	}

	printf(
		'| %1$s | %2$s | %3$s | ',
		str_pad( ( $caught_exception ? '' : 'No' ), 9 ),
		str_pad( ( $caught_error ? '' : 'No' ), 5 ),
		str_pad( ( $e ? '' : 'No' ), 8 )
	);
} );

require $argv[1];
