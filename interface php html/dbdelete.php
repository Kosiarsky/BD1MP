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
		echo '<div class="belka">USUŃ WSZYSTKIE TABELE</div>';
		echo '<div style="margin:24px; text-align: center;">';
		if($id == 1) {

			if(mysqli_num_rows($zapytanie))
			{
				$delete_query = $conn->query("DROP PROCEDURE IF EXISTS zmiana_stawki");
				$delete_query = $conn->query("DROP PROCEDURE IF EXISTS zmiana_premii");
				$delete_query = $conn->query("DROP PROCEDURE IF EXISTS zmiana_premii_st");
				$delete_query = $conn->query("DROP PROCEDURE IF EXISTS zmiana_stawki_st");
				$delete_query = $conn->query("DROP PROCEDURE IF EXISTS zmiana_ceny");
				$delete_query = $conn->query("drop view IF EXISTS view_wlasciciele");
				$delete_query = $conn->query("drop view IF EXISTS view_placowki");
				$delete_query = $conn->query("drop view IF EXISTS view_pracownicy");
				$delete_query = $conn->query("drop view IF EXISTS view_samochody");
				$delete_query = $conn->query("drop view IF EXISTS view_kontrole");
				$delete_query = $conn->query("drop view IF EXISTS view_kontrole_week");
				$delete_query = $conn->query("drop view IF EXISTS view_utarg");
				$delete_query = $conn->query("ALTER TABLE informacje_osobowe DROP FOREIGN KEY ifad_fk");
				$delete_query = $conn->query("ALTER TABLE kontrole DROP FOREIGN KEY kp_fk");
				$delete_query = $conn->query("ALTER TABLE kontrole DROP FOREIGN KEY ks_fk");
				$delete_query = $conn->query("ALTER TABLE placowki DROP FOREIGN KEY pa_fk");
				$delete_query = $conn->query("ALTER TABLE pracownicy DROP FOREIGN KEY pif_fk");
				$delete_query = $conn->query("ALTER TABLE pracownicy DROP FOREIGN KEY ppl_fk");
				$delete_query = $conn->query("ALTER TABLE pracownicy DROP FOREIGN KEY pst_fk");
				$delete_query = $conn->query("ALTER TABLE samochody DROP FOREIGN KEY sdp_fk");
				$delete_query = $conn->query("ALTER TABLE samochody DROP FOREIGN KEY spp_fk");
				$delete_query = $conn->query("ALTER TABLE samochody DROP FOREIGN KEY ssp_fk");
				$delete_query = $conn->query("ALTER TABLE samochody DROP FOREIGN KEY sw_fk");
				$delete_query = $conn->query("ALTER TABLE wlasciciele DROP FOREIGN KEY wif_fk");
				$delete_query = $conn->query("ALTER TABLE zmiany_pracownicze DROP FOREIGN KEY zpp_fk");
				$delete_query = $conn->query("DROP TABLE IF EXISTS kontrole, pracownicy, samochody, placowki, zmiany_pracownicze, stanowiska, dane_pojazdow, stany_pojazdow, produkcja_pojazdow, wlasciciele, informacje_osobowe, adresy CASCADE");
				
			}
			
			if($delete_query > 0) {
				echo '<div class="text">Tabele zostaną usunięte. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo '<div class="text">Wystąpił błąd, tabele nie zostaną usunięte.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else {
			if(mysqli_num_rows($zapytanie))
			{
				echo '<div class="text">Czy na pewno chcesz usunąć całą bazę danych wraz z jej zawartością? <br> Czynność ta jest nieodwracalna! </div><br><br> <a href="dbdelete.php?id=1" class="belka2">TAK USUŃ BAZE DANYCH</a>';
			} else {
				echo '<span class="belka2">BAZA DANYCH JEST PUSTA</span>';
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