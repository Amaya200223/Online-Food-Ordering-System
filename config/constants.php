<?php

//start the session
session_start();



//create contant to store non repeating values
define('SITEURL','http://localhost/Project%20AD-Food%20ordering%20system/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_ordering_system');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  //database connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //selecting database


?>