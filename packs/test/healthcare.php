<?php
$type = 'multi_choice2';
$title = 'healthcare';

header('Access-Control-Allow-Origin: *');
$vote = $_REQUEST['vote'];
$conn = pg_connect(getenv('DATABASE_URL'));

pg_query($conn, 'UPDATE {$type} SET option{$vote} = option{$vote} + 1 WHERE title = "{$title}"');
$result = pg_query($conn, 'SELECT * FROM {$type} WHERE title = "{$title}"');
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

$option1 = $row['option1'];
$option2 = $row['option2'];

$options = [$option1, $option2];
echo json.encode($options);
?>