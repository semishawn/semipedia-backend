<!DOCTYPE html>
<html>

<head>
	<!--Meta-->
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="google" content="notranslate"/>

	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://semishawn.github.io/semipedia/fonts/fonts.css"/>

	<!--Main-->
	<link rel="stylesheet" href="https://semishawn.github.io/semipedia/css/main/themes.css"/>
	<link rel="stylesheet" href="https://semishawn.github.io/semipedia/css/main/master.css"/>
	<link rel="stylesheet" href="https://semishawn.github.io/semipedia/css/main/animations.css"/>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://kit.fontawesome.com/5978d27576.js"></script>

	<!--Page Specifics-->
	<link rel="stylesheet" href="https://semishawn.github.io/semipedia/css/main/table/polls.css"/>
</head>

<body>
<div class="poll multi-choice">
	<div class="poll-title">What is your preferred morning beverage?</div>

	<input type="radio" name="vote" value="1" id="option1" autocomplete="off">
	<label for="option1">
		<span class="option">Coffee</span>
	</label>

	<input type="radio" name="vote" value="2" id="option2" autocomplete="off">
	<label for="option2">
		<span class="option">Tea</span>
	</label>

	<input type="radio" name="vote" value="3" id="option3" autocomplete="off">
	<label for="option3">
		<span class="option">Neither</span>
	</label>

	<div class="poll-bottom">
		<div class="poll-count"></div>
		<button class="submit">Submit</button>
	</div>
</div>

<script>
$(document).ready(function() {
	titleHeight = $('.poll-title').outerHeight();
});

$('.submit').click(function() {
	if ($('input[type="radio"]').is(':checked')) {
		var voteVal = $('input[type="radio"]:checked').val();
		var url = 'onsubmit.php';
		$.get(url, {vote:voteVal}, function(xhr) {
			$('.poll').html(xhr);
		});
	};
});
</script>
</body>

</html>