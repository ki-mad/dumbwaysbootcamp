<?php

$key = array(
	 'a' => 'N',
	 'b' => 'O',
	 'c' => 'P',
	 'd' => 'Q',
	 'e' => 'R',

	 'f' => 'S',
	 'g' => 'T',
	 'h' => 'U',
	 'i' => 'V',
	 'j' => 'W',

	 'k' => 'X',
	 'l' => 'Y',
	 'm' => 'Z',
	 'n' => 'A',
	 'o' => 'B',

	 'p' => 'C',
	 'q' => 'D',
	 'r' => 'E',
	 's' => 'F',
	 't' => 'G',

	 'u' => 'H',
	 'v' => 'I',
	 'w' => 'J',
	 'x' => 'K',
	 'y' => 'L',
	 'z' => 'M'
	 );

function encrypt($word) {
	global $key;
	$word = strtolower($word);

	//substitusi kode
	$output = str_replace(array_keys($key), $key , $word);

	echo strtolower($output);
	echo "<br>";
	 
}

function decrypt($word) {
	global $key;
	$word = strtoupper($word);
	//substitusi kode
	$output = str_replace($key, array_keys($key) , $word);

	echo $output;
	 
}

$word = 'Arsenal';
$word1 = 'nefrany';

encrypt($word);

decrypt($word1);

?>