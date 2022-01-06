<?php
session_start();
 if(!isSet($_SESSION['auth'])) {
 $komunikat = "Nie byłeś zalogowany!!!";
}

 else{
 unset($_SESSION['auth']);
 $komunikat = "Wylogowanie prawidłowe!";
}

session_destroy();
?>
<?php include "header2.php"; ?>

	<div style="width: 70%; margin: auto auto;">
	<div id="srodek2" align="center">
	
      <?php echo $komunikat ; echo '<meta http-equiv="refresh" content="2; URL=index.php">';?>
  
	</div>
	</div>
	
<?php include "footer2.php"; ?>