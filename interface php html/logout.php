<?php
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
if(!isSet($_SESSION['auth'])) {
	$komunikat = "Nie byłeś zalogowany!!!";
} else {
	unset($_SESSION['auth']);
	$komunikat = "Wylogowanie prawidłowe!";
}

session_destroy();
?>
<?php include "header2.php"; ?>

	<div style="width: 70%; margin: auto auto;">
	<div id="srodek2" align="center">
	
    <p style="padding-top:10px;"><div class="text"><?php echo $komunikat ; echo '<meta http-equiv="refresh" content="2; URL=index.php">';?></div></p><br><br>
	<a href="index.php" class="belka2" style="margin: 20px;">Kliknij tutaj, aby nie czekać.</a>
  
	</div>
	</div>
	
<?php 
include "footer2.php";
CloseCon($conn);
 ?>