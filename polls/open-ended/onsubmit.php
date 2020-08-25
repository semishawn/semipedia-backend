<?php
header("Access-Control-Allow-Origin: *");

$answer = $_REQUEST['answer'];

$list_file = 'answer-list.txt';
$count_file = 'answer-count.txt';

$date = new DateTime("now", new DateTimeZone('America/New_York'));
$date = $date->format('M j, Y \a\t g:ia');

$fp = fopen($list_file, 'a');
fwrite($fp, $date."\n");
fwrite($fp, '"'.$answer.'"'."\n\n");
fclose($fp);

$count = 1;
$count += file_get_contents($count_file);
file_put_contents($count_file, $count);
?>

<div class="poll-title">Thanks!</div>
<textarea disabled><?php echo($answer);?></textarea>
<div class="poll-bottom">
	<div class="poll-count"><?php echo($count);?> answers</div>
	<button class="submit" disabled>Submit</button>
</div>

<script>
$('.poll-title').height(titleHeight);
</script>