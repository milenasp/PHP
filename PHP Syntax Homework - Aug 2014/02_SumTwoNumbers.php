<?php

$intValue   = 9;
$floatValue = sprintf('%0.2f', 9.90123);

//OUTPUT:
//$firstNumber + $secondNumber = 9 + 9.90 = 18.90
echo("\$firstNumber" . " + " . "\$secondNumber" . " = " . $intValue . " + " . $floatValue . " = " . sprintf('%0.2f', $intValue + $floatValue));