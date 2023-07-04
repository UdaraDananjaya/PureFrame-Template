<?php
/**
 * Framework Common Functions
 *
 * This file contains a collection of common functions used in the framework.
 * These functions provide utility and convenience for various tasks such as debugging, input sanitization,
 * random string generation, password encryption, and more.
 *
 * List of functions:
 * - systemDump($s, $e): Calculates system performance and displays it.
 * - variableDump($variable): Displays the variable name, type, and value for debugging purposes.
 * - show($stuff): Prints the variable in a readable format.
 * - printVar($variable): Displays the variable structure and information.
 * - esc($str): Escapes special characters in a string for safe output in HTML.
 * - redirect($path): Redirects the user to the specified path.
 * - routeUrl($path): Redirects the user to the specified path using JavaScript.
 * - custLog($logData = ""): Logs custom data to a log file.
 * - sanitizeInput($input): Sanitizes user input by stripping tags, escaping special characters, and trimming whitespace.
 * - randInt($min, $max): Generates a random integer between the given minimum and maximum values.
 * - randStr($length): Generates a random string of the specified length using alphanumeric characters.
 * - encryptPassword($password, $salt): Encrypts the password using a simple encryption algorithm.
 * - decryptPassword($encryptedPassword, $salt): Decrypts the encrypted password back to its original form.
 */

// Calculates system performance and displays it
function systemDump($s, $e)
{
    echo "<hr>";
    $sysUsage = getrusage();
    printf("Page Rendering: <strong>%.2f s</strong>. ", $e - $s);
    printf("Memory Usage: <strong>%.2f KB</strong>. ", round(memory_get_usage() / 1024));
    printf("System Time Usage: <strong>%.2f s</strong>. ", $sysUsage["ru_stime.tv_sec"] + $sysUsage["ru_stime.tv_usec"] / 1000000);
    printf("User Time Usage: <strong>%.2f s</strong>. ", $sysUsage["ru_utime.tv_sec"] + $sysUsage["ru_utime.tv_usec"] / 1000000);
    echo "<hr>";
}

// Displays the variable name, type, and value for debugging purposes
function variableDump($variable)
{
    echo "<hr>";
    foreach ($variable as $argName => $arg) {
        $type = gettype($arg);
        $value = var_export($arg, true);
        $name = $argName;
        if ($name === "_SERVER") {
            continue;
        }
        echo "($type) <strong>$name</strong> => $value <br>";
    }
    echo "<hr>";
}

// Prints the variable in a readable format
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

// Displays the variable structure and information
function printVar($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

// Escapes special characters in a string for safe output in HTML
function esc($str)
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, "UTF-8");
}

// Redirects the user to the specified path
function redirect($path)
{
    header("Location: " . BASE . $path);
    exit();
}

// Redirects the user to the specified path using JavaScript
function routeUrl($path)
{
    echo "<script>window.location.href='" . BASE . $path . "';</script>";
    exit();
}

// Logs custom data to a log file
function custLog($logData = "")
{
    $logFile = "logs/system.log";
    $dateTime = date("Y-m-d H:i:s");
    $ip = $_SERVER["REMOTE_ADDR"];
    $message = "[$dateTime] [$ip] {{$logData}}\n";
    file_put_contents($logFile, $message, FILE_APPEND);
}

// Sanitizes user input by removing tags and trimming whitespace
function sanitizeInput($input)
{
    $input = strip_tags($input);
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, "UTF-8");
    $input = trim($input);
    return $input;
}

// Generates a random integer between min and max values
function randInt($min, $max)
{
    return rand($min, $max);
}

// Generates a random string of the specified length
function randStr($length)
{
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomString = "";
    $charCount = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charCount - 1)];
    }
    return $randomString;
}

// Encrypts a password using a simple XOR encryption algorithm
function encryptPassword($password, $salt)
{
    $encryptedPassword = "";
    $passwordLength = strlen($password);
    $saltLength = strlen($salt);
    for ($i = 0; $i < $passwordLength; $i++) {
        $char = $password[$i];
        $keyChar = $salt[$i % $saltLength];
        $char = chr(ord($char) + ord($keyChar));
        $encryptedPassword .= $char;
    }
    return base64_encode($encryptedPassword);
}

// Decrypts a password that was encrypted using the encryptPassword function
function decryptPassword($encryptedPassword, $salt)
{
    $password = "";
    $encryptedPassword = base64_decode($encryptedPassword);
    $encryptedLength = strlen($encryptedPassword);
    $saltLength = strlen($salt);
    for ($i = 0; $i < $encryptedLength; $i++) {
        $char = $encryptedPassword[$i];
        $keyChar = $salt[$i % $saltLength];
        $char = chr(ord($char) - ord($keyChar));
        $password .= $char;
    }
    return $password;
}
