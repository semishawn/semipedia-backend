<?php

$answer = $_REQUEST["answer"];

$conn = pg_connect(getenv("DATABASE_URL"));

$title = "open_ended";

$date = new DateTime("now", new DateTimeZone("America/New_York"));
$date = $date->format("M j, Y \a\t g:ia");

pg_query($conn,"INSERT INTO {$title} (date, answer) VALUES ('{$date}', '{$answer}'");

$count = pg_query($conn,"SELECT COUNT(answer) FROM {$title}");

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