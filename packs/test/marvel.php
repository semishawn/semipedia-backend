<?php
header('Access-Control-Allow-Origin: *');

$type = 'multi_choice4';
$title = 'marvel';

$vote = $_REQUEST['vote'];
$conn = pg_connect(getenv('DATABASE_URL'));

pg_query($conn, "UPDATE $type SET option$vote = option$vote + 1 WHERE title = '$title'");
$result = pg_query($conn, "SELECT * FROM $type WHERE title = '$title'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

$option1 = intval($row['option1']);
$option2 = intval($row['option2']);
$option3 = intval($row['option3']);
$option4 = intval($row['option3']);
$options = [$option1, $option2, $option3, $option4];

echo json_encode($options);
?>