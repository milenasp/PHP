<?php
$list = $_GET['list'];
$partsArr = preg_split('/[ ,]+/', $list, -1, PREG_SPLIT_NO_EMPTY);
$totalCost = 0;
$cpuCounter = 0;
$romCounter = 0;
$ramCounter = 0;
$viaCounter = 0;
$uniqueElementsCount = findPartCount($partsArr);

for ($i = 0; $i < count($uniqueElementsCount); $i++) {
	$price = calculateCost($i, $uniqueElementsCount[$i]);

	if ($uniqueElementsCount[$i] >= 5) {
		$price /= 2;
	}
	$totalCost += $price;
}

//count number of assembled computers & spare parts
foreach ($partsArr as $part) {
	switch ($part) {
		case 'CPU': $cpuCounter++; break;
		case 'ROM': $romCounter++; break;
		case 'RAM': $ramCounter++; break;
		case 'VIA': $viaCounter++; break;
	}
}
$assembled = 0;

while ($cpuCounter >= 1 && $romCounter >= 1 && $ramCounter >= 1 && $viaCounter >= 1) {
	$assembled++;
	$cpuCounter--;
	$romCounter--;
	$ramCounter--;
	$viaCounter--;
}
$spareParts = $cpuCounter + $romCounter + $ramCounter + $viaCounter;
$sparePartsSale = (($cpuCounter * 85) + ($romCounter * 45) + ($ramCounter * 35) + ($viaCounter * 45)) / 2;
$profit = $sparePartsSale + (420 * $assembled);
$result = $profit - $totalCost;

if ($result > 0) {
	echo "<ul>";
	echo "<li>" . $assembled . " computers assembled</li>";
	echo "<li>" . $spareParts . " parts left</li>";
	echo "</ul>";
	echo "<p>Nakov gained ". $result . " leva</p>";
}
else {
	echo "<ul>";
	echo "<li>" . $assembled . " computers assembled</li>";
	echo "<li>" . $spareParts . " parts left</li>";
	echo "</ul>";
	echo "<p>Nakov lost ". $result . " leva</p>";
}

	function calculateCost($part, $counter)
{
	$cpuCost = 85;
	$romCost = 45;
	$ramCost = 35;
	$viaCost = 45;
	$price = 0;

	switch ($part) {
		case 0: $price = (85 * $counter); break;
		case 1: $price = (45 * $counter); break;
		case 2: $price = (35 * $counter); break;
		case 3: $price = (45 * $counter); break;
	}
	return $price;
}

function findPartCount($partsArr)
{
	$uniqueElementsCount = [0, 0, 0, 0];
	foreach ($partsArr as $part) {
		switch ($part) {
			case 'CPU': $uniqueElementsCount[0]++; break;
			case 'ROM': $uniqueElementsCount[1]++; break;
			case 'RAM': $uniqueElementsCount[2]++; break;
			case 'VIA': $uniqueElementsCount[3]++; break;
		}
	}
	return $uniqueElementsCount;
}
