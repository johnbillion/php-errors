<?php

// exception handler NO
// error handler     YES (fucking what) `E_USER_ERROR`
// shutdown only     NO
// shutdown type     E_USER_ERROR but note:
//                   This is not visible in the shutdown handler if it's caught by the error handler

trigger_error( 'Hi there', E_USER_ERROR );
