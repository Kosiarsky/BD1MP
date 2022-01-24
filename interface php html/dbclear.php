<?php 
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   

$id = isset($_GET["id"]) ? $_GET["id"] : '';
$zapytanie = $conn->query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin'");
if($zapytanie) {
	if(mysqli_num_rows($zapytanie)) {	
		echo '<div class="belka">WYCZYŚĆ WSZYSTKIE TABELE</div>';
		echo '<div style="margin:24px; text-align: center;">';
		if($id == 1) {

			if(mysqli_num_rows($zapytanie))
			{
				$clear_query = $conn->query("DELETE FROM kontrole");
				$clear_query = $conn->query("ALTER TABLE kontrole AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM zmiany_pracownicze");
				$clear_query = $conn->query("ALTER TABLE zmiany_pracownicze AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM pracownicy");
				$clear_query = $conn->query("ALTER TABLE pracownicy AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM samochody");
				$clear_query = $conn->query("ALTER TABLE samochody AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM placowki");
				$clear_query = $conn->query("ALTER TABLE placowki AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM stanowiska");
				$clear_query = $conn->query("ALTER TABLE stanowiska AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM dane_pojazdow");
				$clear_query = $conn->query("ALTER TABLE dane_pojazdow AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM stany_pojazdow");
				$clear_query = $conn->query("ALTER TABLE stany_pojazdow AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM produkcja_pojazdow");
				$clear_query = $conn->query("ALTER TABLE produkcja_pojazdow AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM wlasciciele");
				$clear_query = $conn->query("ALTER TABLE wlasciciele AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM informacje_osobowe");
				$clear_query = $conn->query("ALTER TABLE informacje_osobowe AUTO_INCREMENT = 1");
				$clear_query = $conn->query("DELETE FROM adresy");
				$clear_query = $conn->query("ALTER TABLE adresy AUTO_INCREMENT = 1");
			}
			
			if($clear_query > 0) {
				echo '<div class="text">Tabele zostaną wyczyszczone. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo '<div class="text">Wystąpił błąd, tabele nie zostaną wyczyszczone.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else {
			if(mysqli_num_rows($zapytanie)) {
				echo '<div class="text">Czy na pewno chcesz wyczyścić wszystkie tabele w bazie danych? <br> Czynność ta jest nieodwracalna! </div><br><br> <a href="dbclear.php?id=1" class="belka2">TAK WYCZYŚĆ</a>';
			} else {
				echo '<span class="belka2">TABELE SĄ PUSTE</span>';
			}
		}
		echo '</div>';
	} else {
		echo '<div class="belka">INFORMACJA</div>';
		echo '<div style="margin:24px;">';
		echo '<div style="text-align: center;"><div class="text">BAZA DANYCH PUSTA</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
		echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
		echo '</div>';
	}
} else {
	echo '<div class="belka">INFORMACJA</div>';
	echo '<div style="margin:24px;">';
	echo '<div style="text-align: center;"><div class="text">BAZA DANYCH PUSTA</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
	echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
	echo '</div>';
}

include "footer.php";
CloseCon($conn);
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>