<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$type = 'multi_choice2';
$title = 'healthcare';

$vote = $_REQUEST['vote'];
$conn = pg_connect(getenv('DATABASE_URL'));

pg_query($conn, "UPDATE $type SET option$vote = option$vote + 1 WHERE title = '$title'");
$result = pg_query($conn, "SELECT * FROM $type WHERE title = '$title'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

$option1 = intval($row['option1']);
$option2 = intval($row['option2']);
$options = [$option1, $option2];

echo json_encode($options);
?>