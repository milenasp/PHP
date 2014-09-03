<?php
$text = $_GET['text'];
$hashValue = $_GET['hashValue'];
$fontSize = $_GET['fontSize'];
$style = $_GET['fontStyle'];

for ($i = 0; $i < strlen($text); $i++) {
	$currentChar = $text[$i];
	$charCode = ord($currentChar);

	//odd position
	if ($i % 2 != 0) {
		$charCode -= $hashValue;
	}
	else {
		$charCode += $hashValue;
	}
	$text[$i] = chr($charCode);
}

$paragraph = "";

//If the style is normal or italic, print it with font-style
if ($style == 'normal' || $style == 'italic') {
	$paragraph = "<p style=\"" . "font-size:" . $fontSize . ";" . "font-style:" . $style . ";" .
					"\">" . $text . "</p>";
}
//If it’s bold, print it with font-weight{}{}
else {
	$paragraph = "<p style=\"" . "font-size:" . $fontSize . ";" . "font-weight:" . $style . ";" .
		"\">" . $text . "</p>";
}



echo($paragraph);