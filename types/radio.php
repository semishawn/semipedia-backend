<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// Variables
$pack = $_REQUEST['pack'];
$type = $_REQUEST['type'];
$title = $_REQUEST['title'];
$response = $_REQUEST['response'];

// Connect to database
$conn = pg_connect(getenv('DATABASE_URL'));

// Increment option chosen
pg_query($conn, "UPDATE ${pack}_${type} SET option$response = option$response + 1 WHERE title = '$title'");

// Select actual table
$result = pg_query($conn, "SELECT * FROM ${pack}_${type} WHERE title = '$title'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

// Number of options
$num_options = pg_num_fields($result) - 1;

echo $row['option1'];
?>