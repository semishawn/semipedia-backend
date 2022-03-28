<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$conn = pg_connect(getenv('DATABASE_URL'));

if ($conn) echo "minamata";
?>