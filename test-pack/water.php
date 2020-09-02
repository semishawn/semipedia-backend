<?php

header("Access-Control-Allow-Origin: *");

$answer = $_REQUEST["answer"];

$conn = pg_connect(getenv("DATABASE_URL"));

$type = "open_ended";

date_default_timezone_set('America/New_York');
$date = date("M j, Y") ." at ". date("g:ia");

pg_query($conn,"INSERT INTO {$type} (date, answer) VALUES ('{$date}', '{$answer}')");
$rows = pg_query($conn,"SELECT * FROM {$type}");
$count = pg_num_rows($rows);

function answerTotal() {
	global $count;
	if ($count == 1) {
		echo($count." answer");
	} else {
		echo($count." answers");
	};
};

?>

<div class="poll-title">Thanks!</div>
<textarea disabled><?php echo($answer);?></textarea>
<div class="poll-bottom">
	<div class="poll-count"><?php answerTotal();?></div>
	<button class="submit" disabled>Submit</button>
</div>