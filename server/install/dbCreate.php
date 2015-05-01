<?php

/* 
 * @author Jasper Meyer, 30.04.2015
 * Db creation file. Will create database and tables.
 */

$dbCreateQuery = "CREATE DATABASE " . $db . ";";

$expensesCreateQuery = "CREATE TABLE expenses"
        . "("
        . "id bigint NOT NULL AUTO_INCREMENT, "
        . "date DATETIME NOT NULL, "
        . "c_id bigint, "
        . "u_id bigint, "
        . "l_id bigint, "
        . "PRIMARY KEY (id), "
        . "FOREIGN KEY (c_id) REFERENCES categories(id), "
        . "FOREIGN KEY (u_id) REFERENCES users(id), "
        . "FOREIGN KEY (l_id) REFERENCES locations(id)"
        . ")";

$categoriesCreateQuery = "CREATE TABLE categories"
        . "("
        . "id bigint NOT NULL AUTO_INCREMENT, "
        . "name varchar(50) NOT NULL, "
        . "description varchar(255), "
        . "PRIMARY KEY (id)"
        . ")";

$locationsCreateQuery = "CREATE TABLE locations"
        . "("
        . "id bigint NOT NULL AUTO_INCREMENT, "
        . "name varchar(50) NOT NULL, "
        . "PRIMARY KEY (id)"
        . ")";

$usersCreateQuery = "CREATE TABLE users"
        . "("
        . "id bigint NOT NULL AUTO_INCREMENT, "
        . "name varchar(30) NOT NULL,"
        . "password varchar(255) NOT NULL, "
        . "PRIMARY KEY (id)"
        . ")";

?>
