<?php

error_reporting(E_ALL);

/*
 * @author Jasper Meyer, 30.04.2015
 * installs the database
 * 
 */

include_once './testconnection.php';

if (empty($db)) {
    die("db empty from install");
}

// write information to ../_cfg.php;

$message = $message_start;

$myfile = fopen("../_cfg.php", "w") or die("fopen fail");

$txt = '<?php
        
    // THIS IS A GENERATED FILE. SHOULD NOT EDIT IT UNLESS YOU KNOW WHAT YOU ARE DOING!
        
    $host = "' . $host . '"; //hostname
    $port = "' . $port . '"; //port
    $user = "' . $user . '"; // username
    $pass = "' . $pass . '"; // password
    $db = "' . $db . '"; //database name
            
    $conn = new mysqli($host, $user, $pass, $db, $port); 
    // Check connection
    if ($conn->connect_error) {
        die($message . $message_end . "Could not establish database connection " . $conn->connection_error);
    } 
        
?>';

fwrite($myfile, $txt) or die("fwrite fail");
fclose($myfile);

$message = '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Configuration file successfully created. 
</div>';

// run db creation script.
include_once './dbCreate.php';

// Create database
$conn = new mysqli($host, $user, $pass, null, $port);
if ($conn->connect_error) {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Could not establish database connection: ' . $conn->connect_error . ' 
    </div>';
}
if ($conn->query($dbCreateQuery) === TRUE) {
    $message = $message . '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Database <b>' . $db . '</b> successfully created. 
    </div>';
} else {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Error executing query: ' . $dbCreateQuery . " " . $conn->error . ' 
    </div>';
}
$conn->close();

unset($conn);

include_once '../_cfg.php';
// script dies here...


// Check connection
if ($conn->connect_error) {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Database connection could not be established: ' . $conn->error . ' 
    </div>';
    die($message . $message_end);
}

//create tables

if ($conn->query($categoriesCreateQuery) === TRUE) {
    $message = $message . '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Table <b>categories</b> successfully created. 
    </div>';
} else {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Error creating table: ' . $conn->error . ' 
    </div>';
}

if ($conn->query($locationsCreateQuery) === TRUE) {
    $message = $message . '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Table <b>locations</b> successfully created. 
    </div>';
} else {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Error creating table: ' . $conn->error . ' 
    </div>';
}

if ($conn->query($usersCreateQuery) === TRUE) {
    $message = $message . '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Table <b>users</b> successfully created. 
    </div>';
} else {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Error creating table: ' . $conn->error . ' 
    </div>';
}

if ($conn->query($expensesCreateQuery) === TRUE) {
    $message = $message . '<div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    Table <b>expenses</b> successfully created. 
    </div>';
} else {
    $message = $message . '<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Error creating table: ' . $conn->error . ' 
    </div>';
}

$conn->close();

// if everything successful, show success message
// somehow delete the install folder

echo $message . $message_end;
?>