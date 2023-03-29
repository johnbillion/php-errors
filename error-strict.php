<?php

// This is only an E_STRICT error in PHP 5.6
// This is an E_DEPRECATED error in PHP 7
// This is a fatal in PHP 8

class foo {
    public function bar() {}
}

foo::bar();
