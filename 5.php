<?php
function urutkanstring($data) {
	$data = strtolower($data);
	
	// merubah data menjadi array
	$data = str_split($data);

	// mengurutkan data dengan sort
	sort($data);

	$sort = implode($data);
	echo ucwords($sort);
}

urutkanstring('Hello');
?>