<?php

/**
 * Task 1: printing name with a php loop
 *
 * @param string $input_text
 *
 * @return string
 */
function convertTextToBinary(string $input_text) {
	$byteLength = 8;
	$convertFromBase = 16;
	$convertToBase = 2;

	$result = '';

	$chars = str_split(trim($input_text));

	foreach ($chars as $char) {
		$leadingZeros = '';

		$charInHex = bin2hex($char);
		$charBinary = base_convert($charInHex, $convertFromBase, $convertToBase);

		if (strlen($charBinary) < $byteLength) {

			$numberOfLeadingZeros = $byteLength - strlen($charBinary);

			for ($i = 0; $i < $numberOfLeadingZeros; $i++) {
				$leadingZeros .= 0;
			}
		}
		$result .= $leadingZeros . $charBinary . ' ';
	}
	return $result;
}

/**
 * Print chars of splited input string
 *
 * @param string $input_text
 *
 * @return string
 */
function printStringChars(string $input_text): void {
	$chars = str_split(trim($input_text));
	$charsLength = count($chars);
	$i = 0;

	while ($i < $charsLength) {
		echo $chars[$i] . ' ';
		$i++;
	}
}