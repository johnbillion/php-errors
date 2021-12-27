<?php

// Usage:
// php -f test.php error-syntax-error.php

echo "Running {$argv[1]}...\n";




// https://github.com/filp/whoops
// https://symfony.com/doc/current/components/error_handler.html


// QM fatals:
// E_ERROR             error-memory, error-undefined-function, error-incorrect-param-type, error-too-few-params
// E_PARSE             error-syntax-error, error-eval-error
// E_COMPILE_ERROR     error-require-not-found
// E_USER_ERROR        error-user-error
// E_RECOVERABLE_ERROR error-incorrect-param-type (PHP < 7)


// Other fatals:
// E_CORE_ERROR


$errors = [
	E_ERROR             => 'E_ERROR', // Fatal
	E_PARSE             => 'E_PARSE', // Fatal
	E_CORE_ERROR        => 'E_CORE_ERROR', // Fatal
	E_COMPILE_ERROR     => 'E_COMPILE_ERROR', // Fatal
	E_USER_ERROR        => 'E_USER_ERROR', // Fatal
	E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR', // Fatal

	E_WARNING           => 'E_WARNING',
	E_NOTICE            => 'E_NOTICE',
	E_CORE_WARNING      => 'E_CORE_WARNING',
	E_COMPILE_WARNING   => 'E_COMPILE_WARNING',
	E_USER_WARNING      => 'E_USER_WARNING',
	E_USER_NOTICE       => 'E_USER_NOTICE',
	E_STRICT            => 'E_STRICT',
	E_DEPRECATED        => 'E_DEPRECATED',
	E_USER_DEPRECATED   => 'E_USER_DEPRECATED',
];

// set_exception_handler( function( \Throwable $e ) {
//     echo('=== EXCEPTION ===') . "\n";
//     echo(get_class($e)) . "\n";
//     echo($e->getCode()) . "\n";
//     echo($e->getMessage()) . "\n";
//     echo('=================') . "\n";
// } );

set_error_handler(function(...$e) use ( $errors )   {
	// this doesn't catch fatals, but it does catch a E_USER_ERROR
	echo('=== ERROR ===') . "\n";
	echo($e[1]) . "\n";
	echo($errors[ $e[0] ]) . "\n";
	echo('=============') . "\n";
});

register_shutdown_function( function() use ( $errors ) {
	// this can see a fatal which isn't caught by the exception handler
	$e = error_get_last();
	echo('=== SHUTDOWN ===') . "\n";
	if ( $e ) {
		echo($e['type']) . "\n";
		echo($errors[ $e['type'] ]) . "\n";
		echo($e['message']) . "\n";
	} else {
		echo('no error') . "\n";
	}
	echo('================') . "\n";
} );

require $argv[1];
