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

// Incrementing each checked option
foreach ($response as $key => $i) {
	pg_query($conn, "UPDATE ${pack}_${title} SET option$i = option$i + 1 WHERE title = '$title'");
}

// Select actual table
$result = pg_query($conn, "SELECT * FROM ${pack}_${title} WHERE title = '$title'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

// Number of options
$num_options = pg_num_fields($result) - 1;

// Adding each value to array
$options = array();
for ($i = 1; $i <= $num_options; $i++) {
	array_push($options, intval($row["option$i"]));
}

// Passing JSON encoded array back
echo json_encode($options);
?>