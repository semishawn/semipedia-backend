<?php
 
$fileList = glob('*');
 
foreach($fileList as $filename){
	echo $filename, '<br>'; 
};

?>