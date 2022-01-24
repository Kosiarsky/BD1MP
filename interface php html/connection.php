<?php 
function OpenCon() {
	$dbhost = "sql4.5v.pl";
	$dbuser = "kosiarsky_projektbazy";
	$dbpass = "vqey76wuah";
	$db = "kosiarsky_projektbazy";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	header('Content-type: text/html; charset=utf-8');
	$conn->query("SET CHARSET 'utf8'");  
	return $conn;
}

function CloseCon($conn) {
	$conn -> close();
}

$mysql_dbb = "kosiarsky_projektbazy";
?>