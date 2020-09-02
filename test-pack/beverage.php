<?php

header("Access-Control-Allow-Origin: *");

$vote = $_REQUEST["vote"];

$conn = pg_connect(getenv("DATABASE_URL"));

$type = "multi_choice";
$title = "'beverage'";

if ($vote == 1) {pg_query($conn, "UPDATE {$type} SET option1 = option1 + 1 WHERE title = {$title}");}
if ($vote == 2) {pg_query($conn, "UPDATE {$type} SET option2 = option2 + 1 WHERE title = {$title}");}
if ($vote == 3) {pg_query($conn, "UPDATE {$type} SET option3 = option3 + 1 WHERE title = {$title}");}

$result = pg_query($conn, "SELECT * FROM {$type} WHERE title = {$title}");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
$option1 = $row["option1"];
$option2 = $row["option2"];
$option3 = $row["option3"];

$count = $option1 + $option2 + $option3;

$vote1 = number_format(($option1/$count)*100, 1);
$vote2 = number_format(($option2/$count)*100, 1);
$vote3 = number_format(($option3/$count)*100, 1);

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
.multi-choice label {pointer-events: none;}

.fill1 {animation: fill1 0.5s ease-in-out forwards;}
.fill2 {animation: fill2 0.5s ease-in-out forwards;}
.fill3 {animation: fill3 0.5s ease-in-out forwards;}

@keyframes fill1 {from{width: 0%;} to{width: <?php echo($vote1);?>%;}}
@keyframes fill2 {from{width: 0%;} to{width: <?php echo($vote2);?>%;}}
@keyframes fill3 {from{width: 0%;} to{width: <?php echo($vote3);?>%;}}
</style>

<div class="poll-title">Thanks!</div>

<label>
	<div class="vote-fill fill1"></div>
	<span class="option"><?php echo($vote1);?>%</span>
</label>

<label>
	<div class="vote-fill fill2"></div>
	<span class="option"><?php echo($vote2);?>%</span>
</label>

<label>
	<div class="vote-fill fill3"></div>
	<span class="option"><?php echo($vote3);?>%</span>
</label>

<div class="poll-bottom">
	<div class="poll-count"><?php voteTotal();?></div>
	<button class="submit" disabled>Submit</button>
</div>