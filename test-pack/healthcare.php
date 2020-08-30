<?php

$vote = $_REQUEST['vote'];

$conn = pg_connect(getenv("DATABASE_URL"));

$title = "yes-no";

if ($vote == 1) {pg_query($conn,"UPDATE {$title} SET yes = yes + 1 WHERE title = 'healthcare'");}
if ($vote == 2) {pg_query($conn,"UPDATE {$title} SET no = no + 1 WHERE title = 'healthcare'");}

$result = pg_query($conn, "SELECT * FROM {$title} WHERE title = 'healthcare'");
$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
$yes = $row["yes"];
$no = $row["no"];

$count = $yes + $no;

$vote1 = number_format(100*$yes/($count),1);
$vote2 = number_format(100*$no/($count),1);

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
.boolean label {pointer-events: none;}

.fill1 {animation: fill1 0.5s ease-in-out forwards;}
.fill2 {animation: fill2 0.5s ease-in-out forwards;}

@keyframes fill1 {from{height: 0%;} to{height: <?php echo($vote1);?>%;}}
@keyframes fill2 {from{height: 0%;} to{height: <?php echo($vote2);?>%;}}
</style>

<div class="poll-title">Thanks!</div>

<input type="radio" name="vote" value="0" id="yes" autocomplete="off">
<label class="yes" for="yes">
	<div class="vote-fill fill1"></div>
	<span class="option"><?php echo($vote1);?>%</span>
</label>

<input type="radio" name="vote" value="1" id="no" autocomplete="off">
<label class="no" for="no">
	<div class="vote-fill fill2"></div>
	<span class="option"><?php echo($vote2);?>%</span>
</label>

<div class="poll-bottom">
	<div class="poll-count"><?php voteTotal();?></div>
	<button class="submit" disabled>Submit</button>
</div>

<script>
$('.poll-title').height(titleHeight);
</script>