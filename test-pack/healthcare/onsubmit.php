<?php
header("Access-Control-Allow-Origin: *");

$vote = $_REQUEST['vote'];

$filename = "votes.txt";
$content = file($filename);

$array = explode("-", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {$yes = $yes + 1;}
if ($vote == 1) {$no = $no + 1;}

$insert_vote = $yes."-".$no;
$fp = fopen($filename, "w");
fputs($fp, $insert_vote);
fclose($fp);

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