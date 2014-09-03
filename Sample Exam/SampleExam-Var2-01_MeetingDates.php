<?php
date_default_timezone_set('Europe/Sofia');
$startDate = $_GET['dateOne'];
$endDate = $_GET['dateTwo'];
$thursdays = "<ol>";
$isGay = false;

if (strtotime($startDate) > strtotime($endDate)) {
	$temp = $startDate;
	$startDate = $endDate;
	$endDate = $temp;
}
while (strtotime($startDate) <= strtotime($endDate)) {
	$day = date('l', strtotime($startDate));
	if ($day == "Thursday") {
		$thursdays .= "<li>" . $startDate . "</li>";
		$isGay = true;
		$startDate = date('d-m-Y', strtotime('+7 day', strtotime($startDate)));
	}
	else {
		$startDate = date('d-m-Y', strtotime('+1 day', strtotime($startDate)));
	}

}

if ($isGay) {
	echo $thursdays;
	echo "</ol>";
}
else {
	echo "<h2>No Thursdays</h2>";
}