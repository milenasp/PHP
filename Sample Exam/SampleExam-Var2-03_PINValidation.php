<?php
$name = $_GET['name'];
$gender = $_GET['gender'];
$pin = $_GET['pin'];

$birthDate = substr($pin, 0, 6);
$year = substr($pin, 0, 2);
$year = (int)$year;
$month = substr($pin, 2, 2);
$month = (int)$month;
$date = substr($pin, 4, 2);
$date = (int)$date;
$region = substr($pin, 6, 3);
$gen = $region[2];
$gen = (int)$gen;
$gen = checkGender($gen);
$nine = substr($pin, 0, 9);
$validData = false;

if ((strlen($pin) != 10) || (!checkNamesCount($name))) {
	$validData = false;
}
else {
	if ($month >= 40) {
		//after 2000
		$year = "20" . $year;
		$month -= 40;
	}
	else if ($month > 20 && $month < 40) {
		//before 1900
		$year = "18" . $year;
		$month -= 20;
	}
	else {
		//after 1900 & before 2000
		$year = "19" . $year;
	}

	if ( ($month >= 1 && $month <= 12) || ($date >= 1 && $date <= 31) ) {
		//valid date
		if ( ($gen == $gender) ) {
			//valid gender
			if ( (findCheckSum($nine) == $pin[9]) ) {
				$validData = true;
			}
		}
	}
}
if ($validData) {
	echo "{\"name\":" . "\"" . $name . "\"" . ",\"gender\":" . "\"" . $gender . "\",\"pin\":\"" . $pin . "\"}";
}
else {
	echo "<h2>Incorrect data</h2>";
}


function checkGender($gen)
{
	if ($gen % 2 == 0) {
		return 'male';
	}
	else {
		return 'female';
	}
}

function findCheckSum($nine)
{
	$sum = (int)$nine[0]*2 + (int)$nine[1]*4 + (int)$nine[2]*8 +
		   (int)$nine[3]*5 + (int)$nine[4]*10 + (int)$nine[5]*9 +
		    (int)$nine[6]*7 + (int)$nine[7]*3 + (int)$nine[8]*6;
	$remainder = $sum % 11;
	if ($remainder == 10) {
		$remainder = 0;
	}
	return $remainder;
}

function checkNamesCount($name)
{
	$nameArr = preg_split('/[\s+]/', $name, -1, PREG_SPLIT_NO_EMPTY);
	if (count($nameArr) == 2 && ctype_upper($nameArr[0][0]) && ctype_upper($nameArr[1][0]) ) {
		return true;
	}
	else {
		return false;
	}
}


