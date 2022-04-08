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

// Deal with each semipoll's response
foreach ($packResponses as $semipollResponse) {
	$title = $semipollResponse['title'];
	$type = $semipollResponse['type'];
	$answer = $semipollResponse['answer'];

	if ($type == "radio" || $type == "checkbox" || $type == "likert") {
		// Incrementing each checked option
		foreach ($answer as $key => $i) {
			pg_query($conn, "UPDATE ${packTitle}_${title} SET option$i = option$i + 1");
		}

		// Select actual table
		$result = pg_query($conn, "SELECT * FROM ${packTitle}_${title}");
		$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);

		// Number of options
		$num_options = pg_num_fields($result);

		// Adding each recieved option value to concise array
		$options = array();
		for ($i = 1; $i <= $num_options; $i++) {
			array_push($options, intval($row["option$i"]));
		}

		// Answer being passed back
		$answer = json_encode($options);
	}

	elseif ($type == "short_answer" || $type == "long_answer") {
		// Set timezone and date format
		date_default_timezone_set('America/New_York');
		$date = date('M j, Y') . ' at ' . date('g:ia');

		// Insert new answer
		pg_query($conn, "INSERT INTO ${packTitle}_${title} (date, response) VALUES ('$date', '$answer')");

		// Select and count number of anwers (convert into array)
		$rows = pg_query($conn, "SELECT * FROM ${packTitle}_${title}");

		// Answer being passed back
		$answer = pg_num_rows($rows);
	}

	// Define result to send back, append to echo array
	$result = [
		'title' => $title,
		'type' => $type,
		'answer' => $answer
	];
	array_push($echo, $result);
}

// Pass back database data
echo json_encode($echo);
?>