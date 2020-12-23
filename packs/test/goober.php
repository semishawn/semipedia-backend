<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$type = 'likert';
$title = 'goober';

$point = $_REQUEST['vote'];
$conn = pg_connect(getenv('DATABASE_URL'));

pg_query($conn, "UPDATE $type SET point$point = point$point + 1 WHERE title = '$title'");
$result = pg_query($conn, "SELECT * FROM $type WHERE title = '$title'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

$point1 = intval($row['point1']);
$point2 = intval($row['point2']);
$point3 = intval($row['point3']);
$point4 = intval($row['point4']);
$point5 = intval($row['point5']);
$points = [$point1, $point2, $point3, $point4, $point5];

echo json_encode($points);
?>