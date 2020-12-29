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

// Increment
pg_query($conn, "UPDATE $pack_$type SET point$response = point$response + 1 WHERE title = '$title'");

// Select actual table
$result = pg_query($conn, "SELECT * FROM $pack_$type WHERE title = '$title'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

// Number of points
$num_points = pg_num_fields($result) - 1;

// Adding each value to array
$points = array();
for ($i = 0; $i <= $num_points; $i++) {
	array_push($points, intval($row["point$i"]));
}

// Passing JSON encoded array back
echo json_encode($points);
?>