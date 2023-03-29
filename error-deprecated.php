<?php

// Dynamic properties are deprecated in PHP 8.2

class NoDynamicProperties {}

$instance = new NoDynamicProperties();
$instance->foo = 'bar';

