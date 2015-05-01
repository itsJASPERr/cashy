<?php

error_reporting(0);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host = $_POST["host"];
$port = $_POST["port"] + 0;
$user = $_POST["user"];
$pass = $_POST["pass"];
$db = $_POST["name"];
$message_start = '<div id="message">';
$message_end = "</div>";
$errorContainer = '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Connection to Database Management System failed.
</div>';

$successContainer = '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Connection to Database Management System successfull. 
</div>';

$infoContainer = '<div class="alert alert-info" role="alert">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
    <span class="sr-only">Info:</span>
    The database <b>' . $db . '</b> does not exist. It will be created on installation.
</div>';

$dbWarningContainer = '<div class="alert alert-warning" role="alert">
    <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
    <span class="sr-only">Warning:</span>
    The database <b>' . $db . '</b> already exists. Tables will be created within the existing database. Please make sure this is what you intend to do.
</div>';

$missing = '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Please enter all information.
</div>';

$message = $message_start;

if (empty($host) || empty($port) || empty($user) || empty($pass) || empty($db)) {
    $message = $message . $missing;
}

$conn = new mysqli($host, $user, $pass, null, $port);
if ($conn->connect_error) {
    die($message = $message . $errorContainer . $message_end);
    //die("Database connection could not be established: " . $conn->connect_error);
}
if (!empty($db)) {
    if (!mysqli_select_db($conn, $db)) {
        $message = $message . $infoContainer;
    } else {
        $message = $message. $dbWarningContainer;
    }
}
$conn->close();

unset($conn);

echo $message . $successContainer . $message_end;
?>