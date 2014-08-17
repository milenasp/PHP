<?php
$currentDay = getdate();
$now = $currentDay[0];
$firstDayOfNewYear = mktime(0,0,0,1,1,date("Y")+1);
$secsRemaining = $firstDayOfNewYear - $now;

$lastSundayOfMarch = strtotime("last Sunday of March");
$daylightSavingsStart = mktime(3,0,0,3, date('d', $lastSundayOfMarch),date("Y"));
$lastSundayOfOctober = strtotime("last Sunday of March");
$daylightSavingsStart = mktime(3,0,0,10, date('d', $lastSundayOfOctober),date("Y"));

if ($daylightSavingsStart <= $now && $now <= $daylightSavingsStart) {
	$secsRemaining -= 3600; // remove 1 hour
}

$leftMinutes = (int)($secsRemaining/60);
$leftHours = (int)($secsRemaining/3600);

$day  = (int)($secsRemaining / (3600 * 24));
$hours = (int)(($secsRemaining % (3600 * 24)) / 3600);
$minutes = (int)(($secsRemaining % 3600) / 60);
$seconds = (int)(($secsRemaining % 3600) % 60);

echo "Hours until new year : $leftHours <br / >";
echo "Minutes until new year : $leftMinutes <br / >";
echo "Seconds until new year : $secsRemaining <br / >";
echo "Days:Hours:Minutes:Seconds $day:$hours:$minutes:$seconds";