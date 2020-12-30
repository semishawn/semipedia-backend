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

// Set timezone and date format
date_default_timezone_set('America/New_York');
$date = date('M j, Y') . ' at ' . date('g:ia');

// Insert new response
pg_query($conn, "INSERT INTO ${pack}_${title} (date, response) VALUES ('$date', '$response')");

// Select and count rows
$rows = pg_query($conn, "SELECT * FROM ${pack}_${title}");
$count = pg_num_rows($rows);

// Pass number of responses back
echo $count;
?>