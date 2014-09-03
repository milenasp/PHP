<?php
date_default_timezone_set('Europe/Sofia');
$start = $_GET['dateOne'];
$end = $_GET['dateTwo'];
$holidays = $_GET['holidays'];
$holidays = preg_split('/[\s+]/', $holidays, -1, PREG_SPLIT_NO_EMPTY);
$workDays = [];

while (strtotime($start) <= strtotime($end)) {
	$currentDay = date('l', strtotime($start));

	if ($currentDay != 'Saturday' && $currentDay != 'Sunday') {
		if (!in_array((string)$start, $holidays)) {
			array_push($workDays, $start);
		}
	}
	$start = date('d-m-Y', strtotime('+1 day', strtotime($start)));
}

if (count($workDays) == 0) {
	echo "<h2>No workdays</h2>";
}
else {
	echo "<ol>";
	foreach ($workDays as $day) {
		echo "<li>".$day."</li>";
	}
	echo "</ol>";
}