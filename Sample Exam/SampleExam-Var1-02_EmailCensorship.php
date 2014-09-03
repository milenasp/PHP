<?php
date_default_timezone_set('Europe/Sofia');
$text = $_GET['text'];
$blacklist = $_GET['blacklist'];

$blacklist = preg_split("/[\s+]/", $blacklist, -1, PREG_SPLIT_NO_EMPTY);
$textArr = preg_split("/[\s+]/", $text, -1, PREG_SPLIT_NO_EMPTY);
$text = extractEmails($textArr, $blacklist, $text);

echo "<p>" . $text . "</p>";

function extractEmails($textArr, $blacklist, $text)
{
	$emailArr = [];
	for ($i = 0; $i < count($textArr); $i++ ) {
		$currentWord = $textArr[$i];

		if (preg_match('/(\w+|\d+|\-|\_|\+)+\@(\w+|\d+|\-|\–)+\.(\w+|\d+|\-|\.|\-)+/', $currentWord)) {
			$isMatch = false;

			for ($k = 0; $k < count($blacklist); $k++) {
				$blacklistItem = $blacklist[$k];
				if ($blacklist[$k] == $currentWord) {
					$isMatch = true;
					break;
				}
				else {
					$length = strlen($blacklist[$k]) - 1;
					$substring = '*' . substr($currentWord, strlen($currentWord) - $length, $length);

					if ($substring == $blacklist[$k]) {
						$isMatch = true;
						break;
					}
				}
			}
			if ($isMatch) {
				$censored = str_repeat("*", strlen($currentWord));
				$text = str_replace($currentWord, $censored, $text);
			}
			else {
				$hrefStr = "<a href=\"mailto:" . $currentWord . "\">" . $currentWord . "</a>";
				$text = str_ireplace($currentWord, $hrefStr, $text);
			}
		}
	}
	return $text;
}

