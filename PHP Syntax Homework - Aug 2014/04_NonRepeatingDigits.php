<?php

function findThreeDigitRepeatingNumbers($input)
{
	$inputToStr = (string)$input;
	$nonRepeatNumbers = [];

	if (strlen($inputToStr) < 3) {
		echo("no");
	}
	else {

		for ($i = 100; $i <= $input; $i++) {

			if ($i > 999) {
				break;
			}

			if ( (strval($i)[0] != strval($i)[1]) &&
				(strval($i)[1] != strval($i)[2]) &&
				(strval($i)[2]) != strval($i)[0] ) {

				array_push($nonRepeatNumbers,  $i);
			}
		}
	}
	//OUTPUT:
	foreach ($nonRepeatNumbers as $value) {
		echo($value), "\n";
	}
}

findThreeDigitRepeatingNumbers(1234);
//findThreeDigitRepeatingNumbers(145);
//findThreeDigitRepeatingNumbers(15);
//findThreeDigitRepeatingNumbers(247);
