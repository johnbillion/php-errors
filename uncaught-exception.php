<?php

// exception handler YES `Exception -> Throwable`
// error handler     NO
// shutdown only     NO
// shutdown type     E_ERROR

throw new Exception( 'This is an exception', 123 );
