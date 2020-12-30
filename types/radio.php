<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// Variables
$pack = $_REQUEST['pack'];
$type = $_REQUEST['type'];
$title = $_REQUEST['title'];
$response = json_decode($_REQUEST['response']);

// Connect to database
$conn = pg_connect(getenv('DATABASE_URL'));

// Increment chosen option
pg_query($conn, "UPDATE ${pack}_${title} SET option$i = option$i + 1");

// Select actual table
$result = pg_query($conn, "SELECT * FROM ${pack}_${title}");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

// Number of options
$num_options = pg_num_fields($result);

// Adding each value to array
$options = array();
for ($i = 1; $i <= $num_options; $i++) {
	array_push($options, intval($row["option$i"]));
}

// Passing JSON encoded array back
echo json_encode($options);
?>