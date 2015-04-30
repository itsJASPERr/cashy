<?php

/* 
 * @author Jasper Meyer, 30.04.2015
 * Db creation file. Will create database and tables.
 */

include '../_cfg.php';

$dbCreateQuery = "CREATE DATABASE IF NOT EXISTS $db_name";

$expensesCreateQuery = "CREATE TABLE expenses"
        . "("
        . "id mediumint NOT NULL AUTO_INCREMENT, "
        . "date date NOT NULL DEFAULT GETDATE(), "
        . "c_id medium int, "
        . "PRIMARY KEY (id),"
        . "FOREIGN KEY (c_id) REFERENCES categories(id)"
        . ")";

$categoriesCreateQuery = "CREATE TABLE categories"
        . "("
        . "id mediumint NOT NULL AUTO_INCREMENT, "
        . "name varchar(50) NOT NULL, "
        . "description varchar(255), "
        . "PRIMARY KEY (id)"
        . ")";

$locationsCreateQuery = "CREATE TABLE locations"
        . "("
        . "id mediumint NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY (id)"
        . ")";

?>
