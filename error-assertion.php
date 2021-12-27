<?php

// exception handler YES `AssertionError -> Error -> Throwable`
// error handler     NO
// shutdown only     NO
// shutdown type     E_ERROR

ini_set('zend.assertions', 1); // execute assertions
ini_set('assert.exception', 1); // throw exception when assertion fails

$value = 1;

assert($value === 0);
