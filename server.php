<?php
define('DATA_FILE', 'data.txt');

function save($data) {
	$encoded = json_encode($data);
	$fh = fopen(DATA_FILE, 'w') or die ("Can't open file");
	fwrite($fh, $encoded);
	fclose($fh);
}

function load() {
	$fh = fopen(DATA_FILE, 'r');
	$data = fread($fh, filesize(DATA_FILE));
	print $data;
}

if (function_exists($_POST['action'])) {
	$actionVar = $_POST['action'];
	@$actionVar($_POST['data']);
}