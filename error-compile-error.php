<?php

trait TraitA {
	protected $field = false;
}

trait TraitB {
	protected $field = true;
}

class MyClass {
	use TraitA;
	use TraitB;
}
