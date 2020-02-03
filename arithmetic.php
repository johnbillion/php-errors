<?php

// exception handler YES `ArithmeticError -> Error -> Throwable`
// error handler     NO
// shutdown only     NO
// shutdown type     E_ERROR

$result = 1 << -1;
