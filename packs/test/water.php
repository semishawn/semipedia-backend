<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$type = 'open_ended';
$title = 'water';

$answer = $_REQUEST['answer'];
$conn = pg_connect(getenv('DATABASE_URL'));

date_default_timezone_set('America/New_York');
$date = date('M j, Y') . ' at ' . date('g:ia');

pg_query($conn, "INSERT INTO $type (date, answer) VALUES ('$date', '$answer')");
$rows = pg_query($conn, "SELECT * FROM $type");
$count = pg_num_rows($rows);

echo $count;
?>