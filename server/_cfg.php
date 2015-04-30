<?php

/**
 * database configuration file.
 */

$db_host = ""; //hostname
$db_user = ""; // username
$db_password = ""; // password
$db_name = ""; //database name


$conn = mysql_connect($db_host, $db_user, $db_password );
mysql_select_db($db_name, $conn);

?>