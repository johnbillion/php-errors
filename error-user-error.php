<?php

// This is not visible in the shutdown handler if it's caught by the error handler

trigger_error( 'Hi there', E_USER_ERROR );
