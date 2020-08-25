<?php
header("Access-Control-Allow-Origin: *");

$answer = $_REQUEST['answer'];

$file = 'count.txt';

$count = 1;
   
if (file_exists($file)) {
    $count += file_get_contents($file);
}

file_put_contents($file, $count);
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