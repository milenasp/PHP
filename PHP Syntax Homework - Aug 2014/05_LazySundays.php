<?php

$month = date("F");
$year = date("Y");
$totalDaysInMonth = date("t");

for ($i = 1; $i <= $totalDaysInMonth; $i++) {

	$currentDate = strtotime("$i $month $year");

	if (date("l", $currentDate) == "Sunday") {

		echo date("jS F, Y", $currentDate) . "\n";

	}
}
