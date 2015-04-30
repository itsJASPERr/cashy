<?php

/*
 * @author Jasper Meyer, 30.04.2015
 * installs the database
 * 
 */

$host = $_POST["dbhost"];
$port = $_POST["dbPort"];
$user = $_POST["dbUser"];
$pass = $_POST["dbPassword"];
if (empty($host) || empty($port) || empty($user) || empty($pass)) {
    die("You need to submit <a href='index.php?p=dbconf'>this</a> form and fill out everything.");
}

?>