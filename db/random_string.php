<?php

function randomString($len = 10) {
	$randStr = "";
	$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charLen = strlen($char);
	$randStr = '';
	for ($i = 0 ; $i < $len; $i++){
		$randStr .= $char[rand(0, $charLen - 1)];
	}
	return $randStr;
}

?>
