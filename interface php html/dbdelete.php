<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">USUŃ WSZYSTKIE TABELE W BAZIE DANYCH</div>
	<div style="margin:24px; text-align: center;">
		<?php	
		$id = $_GET["id"];
		$zapytanie = mysql_query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin'");
			
		if($id == 1) {

			if(mysql_num_rows($zapytanie))
			{
				$delete_query = mysql_query("ALTER TABLE informacje_osobowe DROP FOREIGN KEY ifad_fk");
				$delete_query = mysql_query("ALTER TABLE kontrole DROP FOREIGN KEY kp_fk");
				$delete_query = mysql_query("ALTER TABLE kontrole DROP FOREIGN KEY ks_fk");
				$delete_query = mysql_query("ALTER TABLE placowki DROP FOREIGN KEY pa_fk");
				$delete_query = mysql_query("ALTER TABLE pracownicy DROP FOREIGN KEY pif_fk");
				$delete_query = mysql_query("ALTER TABLE pracownicy DROP FOREIGN KEY ppl_fk");
				$delete_query = mysql_query("ALTER TABLE pracownicy DROP FOREIGN KEY pst_fk");
				$delete_query = mysql_query("ALTER TABLE samochody DROP FOREIGN KEY sdp_fk");
				$delete_query = mysql_query("ALTER TABLE samochody DROP FOREIGN KEY spp_fk");
				$delete_query = mysql_query("ALTER TABLE samochody DROP FOREIGN KEY ssp_fk");
				$delete_query = mysql_query("ALTER TABLE samochody DROP FOREIGN KEY sw_fk");
				$delete_query = mysql_query("ALTER TABLE wlasciciele DROP FOREIGN KEY wif_fk");
				$delete_query = mysql_query("ALTER TABLE zmiany_pracownicze DROP FOREIGN KEY zpp_fk");
				$delete_query = mysql_query("DROP TABLE IF EXISTS kontrole, pracownicy, samochody, placowki, zmiany_pracownicze, stanowiska, dane_pojazdow, stany_pojazdow, produkcja_pojazdow, wlasciciele, informacje_osobowe, adresy CASCADE");
				
			}
			
			if($delete_query > 0) {
				echo 'Tabele zostaną usunięte. <br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo 'Wystąpił błąd, tabele nie zostaną usunięte.<br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else {
			if(mysql_num_rows($zapytanie))
			{
				echo 'Czy na pewno chcesz usunąć całą bazę danych wraz z jej zawartością? <br> Czynność ta jest nieodwracalna! <br><br> <a href="dbdelete.php?id=1" class="belka2">TAK USUŃ BAZE DANYCH</a>';
			} else {
				echo '<span class="belka2">BAZA DANYCH JEST PUSTA</span>';
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