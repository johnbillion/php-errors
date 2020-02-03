<?php

// exception handler YES `DivisionByZeroError -> ArithmeticError -> Error -> Throwable`
// error handler     NO
// shutdown only     NO
// shutdown type     E_ERROR

10 % 0;
