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
} );

set_error_handler(function(...$e) {
	global $caught_error;

	$caught_error = $e;
});

register_shutdown_function( function() use ( $errors ) {
	global $caught_exception, $caught_error;

	$e = error_get_last();

	printf(
		'| %1$s | %2$s | %3$s | ',
		str_pad( ( $caught_exception ? get_class( $caught_exception ) : '-' ), 20 ),
		str_pad( ( $caught_error ? $errors[ $caught_error[0] ] : '-' ), 20 ),
		str_pad( ( $e ? $errors[ $e['type'] ] : '-' ), 20 )
	);
} );

require $argv[1];
