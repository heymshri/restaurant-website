<?php 

//Start Session
session_start();

//create constants to store non-repeating values
define('SITEURL','https://localhost/www/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die("couldnot connect to mysql"); //database connection
    $db_select = mysqli_select_db($conn, 'food-order') or die("no database"); //selecting database
?>