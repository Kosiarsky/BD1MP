<?php 
function connection() { 
	$mysql_server = "mysql1.ugu.pl";
	$mysql_admin = "db699535";
	$mysql_pass = "PSKbazydanych";
	$mysql_db = "db699535";
 
	$conn = @mysql_connect("$mysql_server","$mysql_admin","$mysql_pass") or die('Brak po³¹czenia z serwerem.');
	$db = @mysql_select_db($mysql_db, $conn) or die('B³¹d wyboru bazy danych');
 
	header('Content-type: text/html; charset=utf-8');
	mysql_query("SET CHARSET 'utf8'");     
} 
$mysql_dbb = "db699535";
?>