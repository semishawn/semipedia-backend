<?php
header("Access-Control-Allow-Origin: *");

$vote = $_REQUEST["vote"];

$conn = pg_connect(getenv("DATABASE_URL"));

$type = "multi_choice3";
$title = "beverage";

if ($vote == 1) {pg_query($conn, "UPDATE {$type} SET option1 = option1 + 1 WHERE title = '{$title}'");}
if ($vote == 2) {pg_query($conn, "UPDATE {$type} SET option2 = option2 + 1 WHERE title = '{$title}'");}
if ($vote == 3) {pg_query($conn, "UPDATE {$type} SET option3 = option3 + 1 WHERE title = '{$title}'");}

$result = pg_query($conn, "SELECT * FROM {$type} WHERE title = '{$title}'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
$option1 = $row["option1"];
$option2 = $row["option2"];
$option3 = $row["option3"];

$count = $option1 + $option2 + $option3;

$vote1 = number_format(($option1/$count)*100, 1) . '%';
$vote2 = number_format(($option2/$count)*100, 1) . '%';
$vote3 = number_format(($option3/$count)*100, 1) . '%';

function voteTotal() {
	global $count;
	if ($count == 1) {
		echo($count." vote");
	} else {
		echo($count." votes");
	};
};
?>

<script>
	$('.option-percent1').html('<?=$vote1?>');
	$('.option-fill1').animate({width: '<?=$vote1?>'}, 500);
	$('.option-percent2').html('<?=$vote2?>');
	$('.option-fill2').animate({width: '<?=$vote2?>'}, 500);
	$('.option-percent3').html('<?=$vote3?>');
	$('.option-fill3').animate({width: '<?=$vote3?>'}, 500);
	$('.poll-count').html('<?=voteTotal()?>');
</script>