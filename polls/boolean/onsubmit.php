<?php
header("Access-Control-Allow-Origin: *");

$vote = $_REQUEST['vote'];

$filename = "votes.txt";
$content = file($filename);

$array = explode("-", $content[0]);
$true = $array[0];
$false = $array[1];

if ($vote == 0) {$true = $true + 1;}
if ($vote == 1) {$false = $false + 1;}

$insert_vote = $true."-".$false;
$fp = fopen($filename, "w");
fputs($fp, $insert_vote);
fclose($fp);

$count = $true + $false;

$vote1 = number_format(100*$true/($count),1);
$vote2 = number_format(100*$false/($count),1);

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

<input type="radio" name="vote" value="0" id="true" autocomplete="off">
<label class="true" for="true">
	<div class="vote-fill fill1"></div>
	<span class="option"><?php echo($vote1);?>%</span>
</label>

<input type="radio" name="vote" value="1" id="false" autocomplete="off">
<label class="false" for="false">
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