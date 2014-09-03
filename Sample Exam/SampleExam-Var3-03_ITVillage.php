<?php
$board = 'P I F S | P 0 0 F | N 0 0 V | I F F I';
$beginning = '2 1';
$moves = '5 11 9 8 6 8 4';
$matrix = createBoard($board);
$movesArr = preg_split('/[\s+]/', $moves, -1, PREG_SPLIT_NO_EMPTY);
$movesIndex = 0;
$beg = preg_split('/[\s+]/', $beginning, -1, PREG_SPLIT_NO_EMPTY);
$row = $beg[0];
$col = $beg[1];
$startPosition = $matrix[$row][$col];

while ($movesIndex < count($movesArr)) {
	$currentMove = $movesArr[$movesIndex];
	//define movement across the board
	while ($currentMove > 0) {
		if ($col == 0) $row--; $currentMove--;
		if ($row == 0) $col--; $currentMove--;
		if ($col == 3) $row++; $currentMove--;
		if ($row == 3) $col--; $currentMove--;
	}
	$currentPosition = $matrix[$row][$col];
	$movesIndex++;
}



function createBoard($board) {
	$board = preg_split('/[|]/', $board);
	$matrix = [];

	for ($row = 0; $row < 4; $row++) {
		$curRowArr = preg_split('/[\s+]/', $board[$row], -1, PREG_SPLIT_NO_EMPTY);
		for ($col = 0; $col < 4; $col++) {
			$matrix[$row][$col] = $curRowArr[$col];
		}
	}
	return $board;
}
