<?php
/*
 * ARCHEOS-BJ IOT API
 * 2022 BY DARA KEMAL WOROU
 * Test Link
 * http://www.abc.com/test?method=post&deviceid=john&message=HelloWord
 */
//session_start();
header('Content-Type: text/html; charset=utf-8');
require './config.php';
mysqli_set_charset($db, "utf8");

//var 
$deviceId = $_REQUEST['deviceId'];;
$message = $_REQUEST['message'];;

if (empty($deviceId)) {
    echo "data is empty";
} else {
    echo "Votre ID est : " + $deviceId + " et votre message : " + $message;
}