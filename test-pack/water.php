<?php

header("Access-Control-Allow-Origin: *");

$answer = $_REQUEST["answer"];

$conn = pg_connect(getenv("DATABASE_URL"));

$type = "open_ended";
$title = "water";

$date = new DateTime("now", new DateTimeZone("America/New_York"));
$date = $date->format("M j, Y \a\t g:ia");

pg_query($conn,"INSERT INTO {$type} (date, answer) VALUES ({$data}, {$answer})");
$count = pg_query($conn,"SELECT COUNT(*) FROM {$type}");

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

<script>
$(".poll-title").height(titleHeight);
</script>