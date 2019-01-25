<?php
//encryption key
$key = 'getTheDickMyMann';


function encrypt($string, $key){
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	return $string;
}
function decrypt($string, $key){
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
	return $string;
}
function hashpass($string, $key){
	$string = crypt($string, '$l$'. $key . '$');
	return $string; 
}
?>