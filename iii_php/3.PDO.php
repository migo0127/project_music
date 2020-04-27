<?php

/* 
    PDO

*/
$db_host = "localhost";
$db_name = "address_book";
$db_charset = "utf8";
$db_collate = "utf8mb4_unicode_ci";
$username = "test";
$password = "T1st@localhost";

$pdo = new PDO("mysql:host={$db_host};dbname={$db_name};charset={$db_charset},$username,$password");


