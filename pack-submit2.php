<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// Recieve JSONified ajax post
$packTitle = $_REQUEST['packTitle'];
$packResponses = json_decode($_REQUEST['packResponses']);
$echo = [];

// Connect to databse
$conn = pg_connect(getenv('DATABASE_URL'));

// Calculate date
date_default_timezone_set('America/New_York');
$date = date('M j, Y') . ' at ' . date('g:i:s a');

// Initialize title and answer string arrays
$semipollTitlesString = '';
$semipollAnswersString = '';

// Deal with each semipoll's response
foreach ($packResponses as $semipollResponse) {
	$semipollTitle = $semipollResponse -> title;
	$semipollType = $semipollResponse -> type;
	$semipollAnswer = $semipollResponse -> answer;

	$semipollTitlesString .= ", ${semipollTitle}";
	$semipollAnswersString .= ", '${semipollAnswer}'";
}

// Actual SQL call
pg_query($conn, "INSERT INTO ${packTitle} (date${semipollTitlesString}) VALUES ('${date}'${semipollAnswersString});");

// Get every row back
$everything = pg_query($conn, "SELECT * FROM ${packTitle};");

// Pass back database data
echo json_encode($everything);
?>