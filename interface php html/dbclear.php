<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">WYCZYŚĆ WSZYSTKIE TABELE</div>
	<div style="margin:24px; text-align: center;">
		<?php	
		$id = $_GET["id"];
		$zapytanie = mysql_query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin'");
			
		if($id == 1) {

			if(mysql_num_rows($zapytanie))
			{
				$clear_query = mysql_query("DELETE FROM kontrole");
				$clear_query = mysql_query("DELETE FROM zmiany_pracownicze");
				$clear_query = mysql_query("DELETE FROM pracownicy");
				$clear_query = mysql_query("DELETE FROM samochody");
				$clear_query = mysql_query("DELETE FROM placowki");
				$clear_query = mysql_query("DELETE FROM stanowiska");
				$clear_query = mysql_query("DELETE FROM dane_pojazdow");
				$clear_query = mysql_query("DELETE FROM stany_pojazdow");
				$clear_query = mysql_query("DELETE FROM produkcja_pojazdow");
				$clear_query = mysql_query("DELETE FROM wlasciciele");
				$clear_query = mysql_query("DELETE FROM informacje_osobowe");
				$clear_query = mysql_query("DELETE FROM adresy");
			}
			
			if($clear_query > 0) {
				echo '<div class="text">Tabele zostaną wyczyszczone. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo '<div class="text">Wystąpił błąd, tabele nie zostaną wyczyszczone.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else {
			if(mysql_num_rows($zapytanie))
			{
				echo '<div class="text">Czy na pewno chcesz wyczyścić wszystkie tabele w bazie danych? <br> Czynność ta jest nieodwracalna! </div><br><br> <a href="dbclear.php?id=1" class="belka2">TAK WYCZYŚĆ</a>';
			} else {
				echo '<span class="belka2">TABELE SĄ PUSTE</span>';
			}
		}
		?>
	</div>
<?php
include "footer.php";
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>