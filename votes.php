<?php
$vote = $_REQUEST['vote'];

$filename = "results.txt";
$content = file($filename);

$array = explode("-", $content[0]);
$option1 = $array[0];
$option2 = $array[1];
$option3 = $array[2];

if ($vote == 0) {$option1 = $option1 + 1;}
if ($vote == 1) {$option2 = $option2 + 1;}
if ($vote == 2) {$option3 = $option3 + 1;}

$vote1 = number_format(100*$option1/($option1+$option2+$option3),1);
$vote2 = number_format(100*$option2/($option1+$option2+$option3),1);
$vote3 = number_format(100*$option3/($option1+$option2+$option3),1);

$insertvote = $option1."-".$option2."-".$option3;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
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
	<div class="poll-count"><?php echo($option1+$option2+$option3);?> votes</div>
	<button class="submit" disabled>Submit</button>
</div>

<script>
$('.poll-title').height(titleHeight);
</script>