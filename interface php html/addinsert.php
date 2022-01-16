<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";  
$view_name = $_GET["view"]; 
if($view_name == 'placowka') {
	echo '<div class="belka">DODAJ PLACÓWKĘ</div>';
	echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
		if(!empty($_POST['ad_kraj']) && !empty($_POST['ad_wojewodztwo']) && !empty($_POST['ad_miasto']) && !empty($_POST['ad_ulica']) 
		&& !empty($_POST['ad_nr_domu']) && !empty($_POST['ad_kod_pocztowy']) && !empty($_POST['pl_telefon'])
		&& !empty($_POST['pl_fax']) && !empty($_POST['pl_godzina_otwarcia']) && !empty($_POST['pl_godzina_zamkniecia'])) {
			$ad_kraj = mysql_real_escape_string($_POST['ad_kraj']);
			$ad_wojewodztwo = mysql_real_escape_string($_POST['ad_wojewodztwo']);
			$ad_miasto = mysql_real_escape_string($_POST['ad_miasto']);
			$ad_ulica = mysql_real_escape_string($_POST['ad_ulica']);
			$ad_nr_domu = mysql_real_escape_string($_POST['ad_nr_domu']);
			$ad_kod_pocztowy = mysql_real_escape_string($_POST['ad_kod_pocztowy']);
			$pl_telefon = mysql_real_escape_string($_POST['pl_telefon']);
			$pl_fax = mysql_real_escape_string($_POST['pl_fax']);
			$pl_godzina_otwarcia = mysql_real_escape_string($_POST['pl_godzina_otwarcia']);
			$pl_godzina_zamkniecia = mysql_real_escape_string($_POST['pl_godzina_zamkniecia']);
			
			$insert_query = mysql_query("INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica', '$ad_nr_domu', '$ad_kod_pocztowy' )");
				$ad_id_query = mysql_fetch_array(mysql_query("SELECT MAX(ad_id) FROM adresy"));
				$ad_id = $ad_id_query[0];
				if(!$ad_id) {
					$ad_id = 1;
				}
			$insert_query = mysql_query("INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id ) VALUES ( '$pl_telefon', '$pl_fax', '$pl_godzina_otwarcia', '$pl_godzina_zamkniecia', '$ad_id' )");
			
			if($insert_query > 0) {
				echo '<div class="text">Placówka zostanie dodana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo '<div class="text">Wystąpił błąd, placówka nie zostanie dodana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else { 
			echo '<div class="text">Nie uzupełniłeś wszystkich pozycji!</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
		}
	echo '</div>';
} else if($view_name == 'pracownik') {
	echo '<div class="belka">DODAJ PRACOWNIKA</div>';
	echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
		if(!empty($_POST['ad_kraj']) && !empty($_POST['ad_wojewodztwo']) && !empty($_POST['ad_miasto']) && !empty($_POST['ad_ulica']) 
		&& !empty($_POST['ad_nr_domu']) && !empty($_POST['ad_kod_pocztowy']) && !empty($_POST['if_telefon'])
		&& !empty($_POST['if_pesel']) && !empty($_POST['if_data_urodzenia']) && !empty($_POST['if_plec'])
		&& !empty($_POST['if_nazwisko']) && !empty($_POST['if_imie']) && !empty($_POST['st_nazwa']) && !empty($_POST['st_data_uzyskania']) && !empty($_POST['pl_id'])) {
			$ad_kraj = mysql_real_escape_string($_POST['ad_kraj']);
			$ad_wojewodztwo = mysql_real_escape_string($_POST['ad_wojewodztwo']);
			$ad_miasto = mysql_real_escape_string($_POST['ad_miasto']);
			$ad_ulica = mysql_real_escape_string($_POST['ad_ulica']);
			$ad_nr_domu = mysql_real_escape_string($_POST['ad_nr_domu']);
			$ad_kod_pocztowy = mysql_real_escape_string($_POST['ad_kod_pocztowy']);
			$if_imie = mysql_real_escape_string($_POST['if_imie']);
			$if_nazwisko = mysql_real_escape_string($_POST['if_nazwisko']);
			$if_plec = mysql_real_escape_string($_POST['if_plec']);
			$if_data_urodzenia = mysql_real_escape_string($_POST['if_data_urodzenia']);	
			$if_pesel = mysql_real_escape_string($_POST['if_pesel']);
			$if_telefon = mysql_real_escape_string($_POST['if_telefon']);	
			$st_nazwa = mysql_real_escape_string($_POST['st_nazwa']);
			$st_data_uzyskania = mysql_real_escape_string($_POST['st_data_uzyskania']);	
			$pl_id = mysql_real_escape_string($_POST['pl_id']);
			
		
			$insert_query = mysql_query("INSERT INTO adresy (ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica','$ad_nr_domu','$ad_kod_pocztowy')");
				$ad_id_query = mysql_fetch_array(mysql_query("SELECT MAX(ad_id) FROM adresy"));
				$ad_id = $ad_id_query[0];
				if(!$ad_id) {
					$ad_id = 1;
				}
			$insert_query = mysql_query("INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES ( '$if_imie', '$if_nazwisko', '$if_plec', STR_TO_DATE('$if_data_urodzenia','%Y/%m/%d'), '$if_pesel', '$if_telefon', '$ad_id')");
				if($st_nazwa = 'Prezes') { $st_opis = 'Właściciel stacji kontroli pojazdów, zatrudnia pracowników.'; $st_premia = '2000'; $p_stawka = '9000'; }
				elseif($st_nazwa = 'Kierownik') { $st_opis = 'Kierownik stacji kontroli pojazdów, zatwierdza przeglądy pojazdów.'; $st_premia = '1000'; $p_stawka = '6000'; }
				elseif($st_nazwa = 'Kontroler') { $st_opis = 'Kontroler stacji kontroli pojazdów, zajmuje się przeglądem pojazdów, sprawdza ich stan przydatności do ruchu drogowego.'; $st_premia = '400'; $p_stawka = '4000'; }
				elseif($st_nazwa = 'Konserwator') { $st_opis = 'Konserwator stacji kontroli pojazdów, zajmuje się pracami konserwatorskimi.'; $st_premia = '200';  $p_stawka = '3000'; }
			$insert_query = mysql_query("INSERT INTO stanowiska ( st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES ( '$st_nazwa', '$st_opis', '$st_premia', STR_TO_DATE('$st_data_uzyskania','%Y/%m/%d'))");
				$st_id_query = mysql_fetch_array(mysql_query("SELECT MAX(st_id) FROM stanowiska"));
				$st_id = $st_id_query[0];
				if(!$st_id) {
					$st_id = 1;
				}
				$if_id_query = mysql_fetch_array(mysql_query("SELECT MAX(if_id) FROM informacje_osobowe"));
				$if_id = $if_id_query[0];
				if(!$if_id) {
					$if_id = 1;
				}
			$insert_query = mysql_query("INSERT INTO pracownicy ( p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id ) VALUES ( '0' , '$p_stawka', '$pl_id', '$if_id', '$st_id' )");
			
			if($insert_query > 0) {
				echo '<div class="text">Pracownik zostanie dodany. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo '<div class="text">Wystąpił błąd, pracownik nie zostanie dodany.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else { 
			echo '<div class="text">Nie uzupełniłeś wszystkich pozycji!</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
		}
	echo '</div>';
} else if($view_name == 'kontrola') {
	echo '<div class="belka">DODAJ KONTROLĘ</div>';
	echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
		
		
		
	echo '</div>';
} else {
	echo '<div class="belka">DODAJ REKORDY</div>';
	echo '<div style="margin:24px;">';
		echo '<div style="text-align: center; "><div class="text">Wybierz co chcesz dodać do bazy danych.</div><br><br><a href="add.php?view=placowka" class="belka2">PLACÓWKA</a>    
		<a href="add.php?view=pracownik" class="belka2">PRACOWNIK</a>    <a href="add.php?view=kontrola" class="belka2">KONTROLA</a></div>';
	echo '</div>';
}

include "footer.php";
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>