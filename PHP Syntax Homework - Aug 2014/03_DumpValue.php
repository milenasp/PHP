<?php

$inputExamples = array("hello", 15, 1.234, (object)[2,34], array(1, 2, 3));

foreach ($inputExamples as $value) {

	if (!is_numeric($value)) {
		echo gettype($value), "\n";
	}
	else {
		echo var_dump($value), "\n";
	}
}