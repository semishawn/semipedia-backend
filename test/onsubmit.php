<?php

header("Access-Control-Allow-Origin: *");

$vote = $_REQUEST["vote"];

$conn = pg_connect(getenv("DATABASE_URL"));

if ($vote == 1) {pg_query($conn,"UPDATE poll1 SET vote1 = vote1 + 1 WHERE id = '1'");}
if ($vote == 1) {pg_query($conn,"UPDATE poll1 SET vote2 = vote2 + 1 WHERE id = '1'");}
if ($vote == 1) {pg_query($conn,"UPDATE poll1 SET vote3 = vote3 + 1 WHERE id = '1'");}

$result = pg_query($conn, "SELECT * FROM poll1 WHERE id = '1'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
$option1 = $row["vote1"];
$option2 = $row["vote2"];
$option3 = $row["vote3"];

$count = $option1 + $option2 + $option3;

$vote1 = number_format(100*$option1/($count),1);
$vote2 = number_format(100*$option2/($count),1);
$vote3 = number_format(100*$option3/($count),1);

function voteTotal() {
	global $count;
	if ($count == 1) {
		echo($count." vote");
	} else {
		echo($count." votes");
	};
};

?> 

<style>
.poll>label {pointer-events: none;}

.fill1 {animation: fill1 0.5s ease-in-out forwards;}
.fill2 {animation: fill2 0.5s ease-in-out forwards;}
.fill3 {animation: fill3 0.5s ease-in-out forwards;}

@keyframes fill1 {from{width: 0%;} to{width: <?php echo($vote1);?>%;}}
@keyframes fill2 {from{width: 0%;} to{width: <?php echo($vote2);?>%;}}
@keyframes fill3 {from{width: 0%;} to{width: <?php echo($vote3);?>%;}}
</style>

<div class="poll-title">Thanks!</div>

<input type="radio" name="vote" name="0" id="option1" autocomplete="off">
<label for="option1">
	<div class="vote-fill fill1"></div>
	<span class="option"><?php echo($vote1);?>%</span>
</label>

<input type="radio" name="vote" name="1" id="option2" autocomplete="off">
<label for="option2">
	<div class="vote-fill fill2"></div>
	<span class="option"><?php echo($vote2);?>%</span>
</label>

<input type="radio" name="vote" name="2" id="option3" autocomplete="off">
<label for="option3">
	<div class="vote-fill fill3"></div>
	<span class="option"><?php echo($vote3);?>%</span>
</label>

<div class="poll-bottom">
	<div class="poll-count"><?php voteTotal();?></div>
	<button class="submit" disabled>Submit</button>
</div>

<script>
$(".poll-title").height(titleHeight);
</script>