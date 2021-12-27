<?php

// Usage:
// php -f test.php error-syntax-error.php

echo "Running {$argv[1]}...\n";

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
	echo "\n";
    echo('=== CAUGHT BY EXCEPTION HANDLER ===') . "\n";
    echo(get_class($e)) . "\n";
    echo($e->getCode()) . "\n";
    echo($e->getMessage()) . "\n";
    echo('===================================') . "\n";
} );

set_error_handler(function(...$e) use ( $errors )   {
	// this doesn't catch fatals, but it does catch a E_USER_ERROR
	echo "\n";
	echo('=== CAUGHT BY ERROR HANDLER ===') . "\n";
	echo($e[1]) . "\n";
	echo($errors[ $e[0] ]) . "\n";
	echo('===============================') . "\n";
});

register_shutdown_function( function() use ( $errors ) {
	// this can see a fatal which isn't caught by the exception handler
	$e = error_get_last();
	echo "\n";
	echo('=== SHUTDOWN FUNCTION ===') . "\n";
	if ( $e ) {
		echo($e['type']) . "\n";
		echo($errors[ $e['type'] ]) . "\n";
		echo($e['message']) . "\n";
	} else {
		echo('no error') . "\n";
	}
	echo('=========================') . "\n";
} );

require $argv[1];
