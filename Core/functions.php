<?php

/**
 * Framework Common Functions
 */

function system_dump($s, $e)
{
	echo "<hr>";
	$sys_usage = getrusage();
	printf("Page Rendering : <strong> %.2f s</strong>. ", $e - $s);
	printf("Memory Useage  : <strong> %.2u KB</strong>. ", round(memory_get_usage() / 1024));
	printf("System Time Useage  : <strong> %.2f s</strong>. ", $sys_usage["ru_stime.tv_sec"] / 1000000);
	printf("User Time Useage  : <strong> %.2f s</strong>. ", $sys_usage["ru_utime.tv_sec"] / 1000000);
	echo "<hr>";
}
function variable_dump($variable)
{
	echo "<hr>";
	foreach ($variable as $argname => $arg) {
		$type = gettype($arg);
		$value = var_export($arg, true);
		$name = $argname;
		if ($name == "_SERVER") {
			continue;
		}
		echo "($type) <strong> $name </strong> => $value <br>";
	}
	echo "<hr>";
}
function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}
function print_var($variable)
{
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}
function esc($str)
{
	return htmlspecialchars($str);
}
function redirect($path)
{
	header("Location: " . BASE . $path);
	die();
}
function route_url($path)
{
	echo "<script>window.location.href=' " . BASE . $path . "';</script>";
	die();
}
function cust_log($log_data = "")
{
	$logFile = "logs/system.log";
	$dateTime = date("Y-m-d H:i:s");
	$ip = $_SERVER["REMOTE_ADDR"];
	$message = "[$dateTime] [$ip] {{$log_data}}\n";
	file_put_contents($logFile, $message, FILE_APPEND);
	$logArray = file($logFile);
	$logArray = array_slice($logArray, -5);
	file_put_contents($logFile, implode("", $logArray));
}
function sanitize_input($input)
{
	$input = strip_tags($input);
	$input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, "UTF-8");
	$input = trim($input);
	return $input;
}
function rand_int($min, $max)
{
	return rand($min, $max);
}
function rand_str($length)
{
	$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$random_string = "";
	for ($i = 0; $i < $length; $i++) {
		$random_string .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $random_string;
}
function encrypt_password($password, $salt)
{
	$encrypted_password = "";
	for ($i = 0; $i < strlen($password); $i++) {
		$char = $password[$i];
		$keychar = $salt[$i % strlen($salt)];
		$char = chr(ord($char) + ord($keychar));
		$encrypted_password .= $char;
	}
	return base64_encode($encrypted_password);
}
function decrypt_password($encrypted_password, $salt)
{
	$password = "";
	$encrypted_password = base64_decode($encrypted_password);
	for ($i = 0; $i < strlen($encrypted_password); $i++) {
		$char = $encrypted_password[$i];
		$keychar = $salt[$i % strlen($salt)];
		$char = chr(ord($char) - ord($keychar));
		$password .= $char;
	}
	return $password;
}
