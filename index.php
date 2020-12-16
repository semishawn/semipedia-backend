<?php
function fileTree($dir) {
	$files = preg_grep('/^([^.])/', scandir($dir));
	foreach ($files as $link) {
		if (!strpos($link, ".")) {
			echo $link."/<br>";
			$subfiles = preg_grep('/^([^.])/', scandir($link));
			foreach ($subfiles as $sublink) {
				echo "	<a href=".$link."/".$sublink.">".$sublink."</a><br>";
			}
		} else {echo "<a href=".$link.">".$link."</a><br>";}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
	<style>
	body {
		font-family: Calibri;
		margin: 10px;
	}

	div {white-space: pre;}

	a {
		text-decoration: none;
		color: blue;
	}
	a:hover {text-decoration: underline;}
	</style>
</head>

<body>
	<div><?=fileTree('./')?></div>
</body>

</html>