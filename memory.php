<?php

// exception handler NO
// error handler     NO
// shutdown only     YES
// shutdown type     E_ERROR

$x = 'x';

while ( true ) {
	$x = $x . $x;
}
