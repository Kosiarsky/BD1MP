<?php 
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";  
$view_name = isset($_GET["view"]) ? $_GET["view"] : '';
$query = $conn->query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin'");
if($query) {
	if(mysqli_num_rows($query)) {
		if($view_name == 'placowka') {
			echo '<div class="belka">DODAJ PLACÓWKĘ</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
				if(!empty($_POST['pl_rekordy'])) {
					for($i=0; $i<$_POST['pl_rekordy'];$i++) {
						$ad_kraj = 'Polska';
						$ad_wojewodztwo_rand = rand(0,15);
						if($ad_wojewodztwo_rand == '0') { $ad_wojewodztwo = 'Dolnośląskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Wrocław'; $ad_kod_pocztowy = '51-416'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Legnica'; $ad_kod_pocztowy = '59-220'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Jelenia Góra'; $ad_kod_pocztowy = '58-500'; } }
						if($ad_wojewodztwo_rand == '1') { $ad_wojewodztwo = 'Kujawsko-pomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Bydgoszcz'; $ad_kod_pocztowy = '85-461 '; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Toruń'; $ad_kod_pocztowy = '87-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Włocławek'; $ad_kod_pocztowy = '87-800'; } }
						if($ad_wojewodztwo_rand == '2') { $ad_wojewodztwo = 'Lubelskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Lublin'; $ad_kod_pocztowy = '20-218'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Zamość'; $ad_kod_pocztowy = '22-400'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Chełm'; $ad_kod_pocztowy = '22-100'; } }
						if($ad_wojewodztwo_rand == '3') { $ad_wojewodztwo = 'Lubuskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Zielona Góra'; $ad_kod_pocztowy = '65-751'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Nowa Sól'; $ad_kod_pocztowy = '67-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Żary'; $ad_kod_pocztowy = '68-200'; } }
						if($ad_wojewodztwo_rand == '4') { $ad_wojewodztwo = 'Łódzkie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Łódź'; $ad_kod_pocztowy = '90-001'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Piotrków Trybunalski'; $ad_kod_pocztowy = '97-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Bełchatów'; $ad_kod_pocztowy = '97-400'; } }
						if($ad_wojewodztwo_rand == '5') { $ad_wojewodztwo = 'Małopolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Kraków'; $ad_kod_pocztowy = '31-403'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Tarnów'; $ad_kod_pocztowy = '33-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Zakopane'; $ad_kod_pocztowy = '34-500'; } }
						if($ad_wojewodztwo_rand == '6') { $ad_wojewodztwo = 'Mazowieckie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Warszawa'; $ad_kod_pocztowy = '01-464'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Radom'; $ad_kod_pocztowy = '26-604'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Płock'; $ad_kod_pocztowy = '09-400'; } }
						if($ad_wojewodztwo_rand == '7') { $ad_wojewodztwo = 'Opolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Opole'; $ad_kod_pocztowy = '45-309'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Nysa'; $ad_kod_pocztowy = '48-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Kluczbork'; $ad_kod_pocztowy = '46-200'; } }
						if($ad_wojewodztwo_rand == '8') { $ad_wojewodztwo = 'Podkarpackie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Rzeszów'; $ad_kod_pocztowy = '35-085'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Przemyśl'; $ad_kod_pocztowy = '37-700'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Tarnobrzeg'; $ad_kod_pocztowy = '39-400'; } }
						if($ad_wojewodztwo_rand == '9') { $ad_wojewodztwo = 'Podlaskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Białystok'; $ad_kod_pocztowy = '15-102'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Suwałki'; $ad_kod_pocztowy = '16-400'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Łomża'; $ad_kod_pocztowy = '18-400'; } }
						if($ad_wojewodztwo_rand == '10') { $ad_wojewodztwo = 'Pomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Gdańsk'; $ad_kod_pocztowy = '80-761'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Gdynia'; $ad_kod_pocztowy = '81-222'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Sopot'; $ad_kod_pocztowy = '81-704'; } }
						if($ad_wojewodztwo_rand == '11') { $ad_wojewodztwo = 'Śląskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Katowice'; $ad_kod_pocztowy = '40-203'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Sosnowiec'; $ad_kod_pocztowy = '41-200'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Częstochowa'; $ad_kod_pocztowy = '42-200'; } }
						if($ad_wojewodztwo_rand == '12') { $ad_wojewodztwo = 'Świętokrzyskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Kielce'; $ad_kod_pocztowy = '25-900'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Sandomierz'; $ad_kod_pocztowy = '27-600'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Starachowice'; $ad_kod_pocztowy = '27-200'; } }
						if($ad_wojewodztwo_rand == '13') { $ad_wojewodztwo = 'Warmińsko-mazurskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Olsztyn'; $ad_kod_pocztowy = '10-900'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Elbląg'; $ad_kod_pocztowy = '82-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Ełk'; $ad_kod_pocztowy = '19-300'; } }
						if($ad_wojewodztwo_rand == '14') { $ad_wojewodztwo = 'Wielkopolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Poznań'; $ad_kod_pocztowy = '60-967'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Kalisz'; $ad_kod_pocztowy = '62-800'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Gniezno'; $ad_kod_pocztowy = '62-200'; } }
						if($ad_wojewodztwo_rand == '15') { $ad_wojewodztwo = 'Zachodniopomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Szczecin'; $ad_kod_pocztowy = '70-735'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Koszalin'; $ad_kod_pocztowy = '75-841'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Stargard Szczeciński'; $ad_kod_pocztowy = '73-110'; } }
						$ad_ulica_rand = rand(0,144);
						$ad_ulica[] = '1 Maja'; $ad_ulica[] = 'Akacjowa'; $ad_ulica[] = 'Alabastrowa'; $ad_ulica[] = 'Aleksandra Fredry'; $ad_ulica[] = 'Andrzeja Struga'; $ad_ulica[] = 'Armii Krajowej'; $ad_ulica[] = 'Bernardyńska'; $ad_ulica[] = 'Beskidzka'; $ad_ulica[] = 'Białogońska'; $ad_ulica[] = 'Biesak'; $ad_ulica[] = 'Bieszczadzka'; $ad_ulica[] = 'Cedrowa'; $ad_ulica[] = 'Cedzyńska'; $ad_ulica[] = 'Ceglana'; $ad_ulica[] = 'Ciekocka'; $ad_ulica[] = 'Ciepła'; $ad_ulica[] = 'Cisowa'; $ad_ulica[] = 'Cmentarna'; $ad_ulica[] = 'Działkowa'; $ad_ulica[] = 'Dzielna'; $ad_ulica[] = 'Dzika'; $ad_ulica[] = 'Długa'; $ad_ulica[] = 'Ewangelicka'; $ad_ulica[] = 'Fabryczna'; $ad_ulica[] = 'Grochowa'; $ad_ulica[] = 'Gromadzka'; $ad_ulica[] = 'Gronowa'; $ad_ulica[] = 'Gruchawka'; $ad_ulica[] = 'Grunwaldzka'; $ad_ulica[] = 'Grzybowa'; $ad_ulica[] = 'Hubalczyków'; $ad_ulica[] = 'Husarska'; $ad_ulica[] = 'Hutnicza'; $ad_ulica[] = 'Iglasta'; $ad_ulica[] = 'Ignacego Daszyńskiego'; $ad_ulica[] = 'Ignacego Paderewskiego'; $ad_ulica[] = 'Jagiellońska'; $ad_ulica[] = 'Jagodowa'; $ad_ulica[] = 'Kapitulna'; $ad_ulica[] = 'Karbońska'; $ad_ulica[] = 'Karczówka - Klasztor'; $ad_ulica[] = 'Karczówkowska'; $ad_ulica[] = 'Karczunek'; $ad_ulica[] = 'Karkonoska'; $ad_ulica[] = 'Karola Henryka Kadena'; $ad_ulica[] = 'Karola Kurpińskiego'; $ad_ulica[] = 'Karola Olszewskiego'; $ad_ulica[] = 'Karola Szymanowskiego'; $ad_ulica[] = 'Karpacka'; $ad_ulica[] = 'Kasztanowa'; $ad_ulica[] = 'Kazimierza Kaznowskiego'; $ad_ulica[] = 'Kazimierza Smolaka'; $ad_ulica[] = 'Klecka'; $ad_ulica[] = 'Klonowa'; $ad_ulica[] = 'Kocka'; $ad_ulica[] = 'Legnicka'; $ad_ulica[] = 'Leona Skibińskiego'; $ad_ulica[] = 'Leopolda Staffa'; $ad_ulica[] = 'Leśna'; $ad_ulica[] = 'Leśniówka'; $ad_ulica[] = 'Leszczyńska'; $ad_ulica[] = 'Mazurska'; $ad_ulica[] = 'Mała'; $ad_ulica[] = 'Mała Zgoda'; $ad_ulica[] = 'Małopolska'; $ad_ulica[] = 'Mechaników'; $ad_ulica[] = 'Miechowska'; $ad_ulica[] = 'Mieczysława Karłowicza'; $ad_ulica[] = 'Mieczysławy Ćwiklińskiej'; $ad_ulica[] = 'Miedziana'; $ad_ulica[] = 'Mikołaja Gomółki'; $ad_ulica[] = 'Mikołaja Reja'; $ad_ulica[] = 'Niestachowska'; $ad_ulica[] = 'Niewachlowska'; $ad_ulica[] = 'Niska'; $ad_ulica[] = 'Niwy Lisowskie'; $ad_ulica[] = 'Norweska'; $ad_ulica[] = 'Nowa'; $ad_ulica[] = 'Nowowiejska'; $ad_ulica[] = 'Nowy Świat'; $ad_ulica[] = 'Pakosz'; $ad_ulica[] = 'Pancerna'; $ad_ulica[] = 'Panoramiczna'; $ad_ulica[] = 'Pańska'; $ad_ulica[] = 'Parkowa'; $ad_ulica[] = 'Patrol'; $ad_ulica[] = 'Pawia'; $ad_ulica[] = 'Permska'; $ad_ulica[] = 'Peryferyjna'; $ad_ulica[] = 'Petyhorska'; $ad_ulica[] = 'Piekoszowska'; $ad_ulica[] = 'Pienińska'; $ad_ulica[] = 'Piesza'; $ad_ulica[] = 'Pietraszki'; $ad_ulica[] = 'Śląska'; $ad_ulica[] = 'Ślazy'; $ad_ulica[] = 'Ślichowicka'; $ad_ulica[] = 'Ślusarska'; $ad_ulica[] = 'Sokola'; $ad_ulica[] = 'Solidarności'; $ad_ulica[] = 'Solna'; $ad_ulica[] = 'Sosnowa'; $ad_ulica[] = 'Sowia'; $ad_ulica[] = 'Spacerowa'; $ad_ulica[] = 'Spokojna'; $ad_ulica[] = 'Strycharska'; $ad_ulica[] = 'Studencka'; $ad_ulica[] = 'Studziankowska'; $ad_ulica[] = 'Studzienna'; $ad_ulica[] = 'Sucha'; $ad_ulica[] = 'Sudecka'; $ad_ulica[] = 'Tatarska'; $ad_ulica[] = 'Tatrzańska'; $ad_ulica[] = 'Tektoniczna'; $ad_ulica[] = 'Tobrucka'; $ad_ulica[] = 'Zacisze'; $ad_ulica[] = 'Zagnańska'; $ad_ulica[] = 'Zagonowa'; $ad_ulica[] = 'Zagórska'; $ad_ulica[] = 'Zagrabowicka'; $ad_ulica[] = 'Zagrodowa'; $ad_ulica[] = 'Zakopiańska'; $ad_ulica[] = 'Zakręt'; $ad_ulica[] = 'Zakładowa'; $ad_ulica[] = 'Zalesie'; $ad_ulica[] = 'Łódzka'; $ad_ulica[] = 'Łopianowa'; $ad_ulica[] = 'Łopuszniańska'; $ad_ulica[] = 'Łotewska';
						$ad_nr_domu = rand(1,500);
						$pl_telefon = rand(100,999).rand(100,999).rand(100,999);
						$pl_fax = rand(100,999).rand(100,999).rand(100,999).rand(100,999);
						$pl_godzina_otwarcia = 8;
						$pl_godzina_zamkniecia = 20;
						
						$insert_query = $conn->query("INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica[$ad_ulica_rand]', '$ad_nr_domu', '$ad_kod_pocztowy' )");
							$ad_id_query = mysqli_fetch_array($conn->query("SELECT MAX(ad_id) FROM adresy"),MYSQLI_NUM);
							$ad_id = $ad_id_query[0];
							if(!$ad_id) {
								$ad_id = 1;
							}
						$insert_query = $conn->query("INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id ) VALUES ( '$pl_telefon', '$pl_fax', '$pl_godzina_otwarcia', '$pl_godzina_zamkniecia', '$ad_id' )");
						
					}
					
					if($insert_query > 0) {
						echo '<div class="text">Placówka zostanie dodana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, placówka nie zostanie dodana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				} else { 
					echo '<div class="text">Nie uzupełniłeś pozycji!</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
				}
			echo '</div>';
		} else if($view_name == 'pracownik') {
			echo '<div class="belka">WYLOSUJ PRACOWNIKÓW</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
				if(!empty($_POST['p_rekordy'])) {
					for($i=0; $i<$_POST['p_rekordy'];$i++) {
						$ad_kraj = 'Polska';
						$ad_wojewodztwo_rand = rand(0,15);
						if($ad_wojewodztwo_rand == '0') { $ad_wojewodztwo = 'Dolnośląskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Wrocław'; $ad_kod_pocztowy = '51-416'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Legnica'; $ad_kod_pocztowy = '59-220'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Jelenia Góra'; $ad_kod_pocztowy = '58-500'; } }
						if($ad_wojewodztwo_rand == '1') { $ad_wojewodztwo = 'Kujawsko-pomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Bydgoszcz'; $ad_kod_pocztowy = '85-461 '; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Toruń'; $ad_kod_pocztowy = '87-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Włocławek'; $ad_kod_pocztowy = '87-800'; } }
						if($ad_wojewodztwo_rand == '2') { $ad_wojewodztwo = 'Lubelskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Lublin'; $ad_kod_pocztowy = '20-218'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Zamość'; $ad_kod_pocztowy = '22-400'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Chełm'; $ad_kod_pocztowy = '22-100'; } }
						if($ad_wojewodztwo_rand == '3') { $ad_wojewodztwo = 'Lubuskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Zielona Góra'; $ad_kod_pocztowy = '65-751'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Nowa Sól'; $ad_kod_pocztowy = '67-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Żary'; $ad_kod_pocztowy = '68-200'; } }
						if($ad_wojewodztwo_rand == '4') { $ad_wojewodztwo = 'Łódzkie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Łódź'; $ad_kod_pocztowy = '90-001'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Piotrków Trybunalski'; $ad_kod_pocztowy = '97-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Bełchatów'; $ad_kod_pocztowy = '97-400'; } }
						if($ad_wojewodztwo_rand == '5') { $ad_wojewodztwo = 'Małopolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Kraków'; $ad_kod_pocztowy = '31-403'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Tarnów'; $ad_kod_pocztowy = '33-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Zakopane'; $ad_kod_pocztowy = '34-500'; } }
						if($ad_wojewodztwo_rand == '6') { $ad_wojewodztwo = 'Mazowieckie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Warszawa'; $ad_kod_pocztowy = '01-464'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Radom'; $ad_kod_pocztowy = '26-604'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Płock'; $ad_kod_pocztowy = '09-400'; } }
						if($ad_wojewodztwo_rand == '7') { $ad_wojewodztwo = 'Opolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Opole'; $ad_kod_pocztowy = '45-309'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Nysa'; $ad_kod_pocztowy = '48-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Kluczbork'; $ad_kod_pocztowy = '46-200'; } }
						if($ad_wojewodztwo_rand == '8') { $ad_wojewodztwo = 'Podkarpackie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Rzeszów'; $ad_kod_pocztowy = '35-085'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Przemyśl'; $ad_kod_pocztowy = '37-700'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Tarnobrzeg'; $ad_kod_pocztowy = '39-400'; } }
						if($ad_wojewodztwo_rand == '9') { $ad_wojewodztwo = 'Podlaskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Białystok'; $ad_kod_pocztowy = '15-102'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Suwałki'; $ad_kod_pocztowy = '16-400'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Łomża'; $ad_kod_pocztowy = '18-400'; } }
						if($ad_wojewodztwo_rand == '10') { $ad_wojewodztwo = 'Pomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Gdańsk'; $ad_kod_pocztowy = '80-761'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Gdynia'; $ad_kod_pocztowy = '81-222'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Sopot'; $ad_kod_pocztowy = '81-704'; } }
						if($ad_wojewodztwo_rand == '11') { $ad_wojewodztwo = 'Śląskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Katowice'; $ad_kod_pocztowy = '40-203'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Sosnowiec'; $ad_kod_pocztowy = '41-200'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Częstochowa'; $ad_kod_pocztowy = '42-200'; } }
						if($ad_wojewodztwo_rand == '12') { $ad_wojewodztwo = 'Świętokrzyskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Kielce'; $ad_kod_pocztowy = '25-900'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Sandomierz'; $ad_kod_pocztowy = '27-600'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Starachowice'; $ad_kod_pocztowy = '27-200'; } }
						if($ad_wojewodztwo_rand == '13') { $ad_wojewodztwo = 'Warmińsko-mazurskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Olsztyn'; $ad_kod_pocztowy = '10-900'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Elbląg'; $ad_kod_pocztowy = '82-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Ełk'; $ad_kod_pocztowy = '19-300'; } }
						if($ad_wojewodztwo_rand == '14') { $ad_wojewodztwo = 'Wielkopolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Poznań'; $ad_kod_pocztowy = '60-967'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Kalisz'; $ad_kod_pocztowy = '62-800'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Gniezno'; $ad_kod_pocztowy = '62-200'; } }
						if($ad_wojewodztwo_rand == '15') { $ad_wojewodztwo = 'Zachodniopomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Szczecin'; $ad_kod_pocztowy = '70-735'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Koszalin'; $ad_kod_pocztowy = '75-841'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Stargard Szczeciński'; $ad_kod_pocztowy = '73-110'; } }
						$ad_ulica_rand = rand(0,144);
						$ad_ulica[] = '1 Maja'; $ad_ulica[] = 'Akacjowa'; $ad_ulica[] = 'Alabastrowa'; $ad_ulica[] = 'Aleksandra Fredry'; $ad_ulica[] = 'Andrzeja Struga'; $ad_ulica[] = 'Armii Krajowej'; $ad_ulica[] = 'Bernardyńska'; $ad_ulica[] = 'Beskidzka'; $ad_ulica[] = 'Białogońska'; $ad_ulica[] = 'Biesak'; $ad_ulica[] = 'Bieszczadzka'; $ad_ulica[] = 'Cedrowa'; $ad_ulica[] = 'Cedzyńska'; $ad_ulica[] = 'Ceglana'; $ad_ulica[] = 'Ciekocka'; $ad_ulica[] = 'Ciepła'; $ad_ulica[] = 'Cisowa'; $ad_ulica[] = 'Cmentarna'; $ad_ulica[] = 'Działkowa'; $ad_ulica[] = 'Dzielna'; $ad_ulica[] = 'Dzika'; $ad_ulica[] = 'Długa'; $ad_ulica[] = 'Ewangelicka'; $ad_ulica[] = 'Fabryczna'; $ad_ulica[] = 'Grochowa'; $ad_ulica[] = 'Gromadzka'; $ad_ulica[] = 'Gronowa'; $ad_ulica[] = 'Gruchawka'; $ad_ulica[] = 'Grunwaldzka'; $ad_ulica[] = 'Grzybowa'; $ad_ulica[] = 'Hubalczyków'; $ad_ulica[] = 'Husarska'; $ad_ulica[] = 'Hutnicza'; $ad_ulica[] = 'Iglasta'; $ad_ulica[] = 'Ignacego Daszyńskiego'; $ad_ulica[] = 'Ignacego Paderewskiego'; $ad_ulica[] = 'Jagiellońska'; $ad_ulica[] = 'Jagodowa'; $ad_ulica[] = 'Kapitulna'; $ad_ulica[] = 'Karbońska'; $ad_ulica[] = 'Karczówka - Klasztor'; $ad_ulica[] = 'Karczówkowska'; $ad_ulica[] = 'Karczunek'; $ad_ulica[] = 'Karkonoska'; $ad_ulica[] = 'Karola Henryka Kadena'; $ad_ulica[] = 'Karola Kurpińskiego'; $ad_ulica[] = 'Karola Olszewskiego'; $ad_ulica[] = 'Karola Szymanowskiego'; $ad_ulica[] = 'Karpacka'; $ad_ulica[] = 'Kasztanowa'; $ad_ulica[] = 'Kazimierza Kaznowskiego'; $ad_ulica[] = 'Kazimierza Smolaka'; $ad_ulica[] = 'Klecka'; $ad_ulica[] = 'Klonowa'; $ad_ulica[] = 'Kocka'; $ad_ulica[] = 'Legnicka'; $ad_ulica[] = 'Leona Skibińskiego'; $ad_ulica[] = 'Leopolda Staffa'; $ad_ulica[] = 'Leśna'; $ad_ulica[] = 'Leśniówka'; $ad_ulica[] = 'Leszczyńska'; $ad_ulica[] = 'Mazurska'; $ad_ulica[] = 'Mała'; $ad_ulica[] = 'Mała Zgoda'; $ad_ulica[] = 'Małopolska'; $ad_ulica[] = 'Mechaników'; $ad_ulica[] = 'Miechowska'; $ad_ulica[] = 'Mieczysława Karłowicza'; $ad_ulica[] = 'Mieczysławy Ćwiklińskiej'; $ad_ulica[] = 'Miedziana'; $ad_ulica[] = 'Mikołaja Gomółki'; $ad_ulica[] = 'Mikołaja Reja'; $ad_ulica[] = 'Niestachowska'; $ad_ulica[] = 'Niewachlowska'; $ad_ulica[] = 'Niska'; $ad_ulica[] = 'Niwy Lisowskie'; $ad_ulica[] = 'Norweska'; $ad_ulica[] = 'Nowa'; $ad_ulica[] = 'Nowowiejska'; $ad_ulica[] = 'Nowy Świat'; $ad_ulica[] = 'Pakosz'; $ad_ulica[] = 'Pancerna'; $ad_ulica[] = 'Panoramiczna'; $ad_ulica[] = 'Pańska'; $ad_ulica[] = 'Parkowa'; $ad_ulica[] = 'Patrol'; $ad_ulica[] = 'Pawia'; $ad_ulica[] = 'Permska'; $ad_ulica[] = 'Peryferyjna'; $ad_ulica[] = 'Petyhorska'; $ad_ulica[] = 'Piekoszowska'; $ad_ulica[] = 'Pienińska'; $ad_ulica[] = 'Piesza'; $ad_ulica[] = 'Pietraszki'; $ad_ulica[] = 'Śląska'; $ad_ulica[] = 'Ślazy'; $ad_ulica[] = 'Ślichowicka'; $ad_ulica[] = 'Ślusarska'; $ad_ulica[] = 'Sokola'; $ad_ulica[] = 'Solidarności'; $ad_ulica[] = 'Solna'; $ad_ulica[] = 'Sosnowa'; $ad_ulica[] = 'Sowia'; $ad_ulica[] = 'Spacerowa'; $ad_ulica[] = 'Spokojna'; $ad_ulica[] = 'Strycharska'; $ad_ulica[] = 'Studencka'; $ad_ulica[] = 'Studziankowska'; $ad_ulica[] = 'Studzienna'; $ad_ulica[] = 'Sucha'; $ad_ulica[] = 'Sudecka'; $ad_ulica[] = 'Tatarska'; $ad_ulica[] = 'Tatrzańska'; $ad_ulica[] = 'Tektoniczna'; $ad_ulica[] = 'Tobrucka'; $ad_ulica[] = 'Zacisze'; $ad_ulica[] = 'Zagnańska'; $ad_ulica[] = 'Zagonowa'; $ad_ulica[] = 'Zagórska'; $ad_ulica[] = 'Zagrabowicka'; $ad_ulica[] = 'Zagrodowa'; $ad_ulica[] = 'Zakopiańska'; $ad_ulica[] = 'Zakręt'; $ad_ulica[] = 'Zakładowa'; $ad_ulica[] = 'Zalesie'; $ad_ulica[] = 'Łódzka'; $ad_ulica[] = 'Łopianowa'; $ad_ulica[] = 'Łopuszniańska'; $ad_ulica[] = 'Łotewska';
						$ad_nr_domu = rand(1,500);
						$if_telefon = rand(100,999).rand(100,999).rand(100,999);
						
						$if_imie_rand = rand(0,146);
						if($if_imie_rand >= 0 && $if_imie_rand <=73) {
							$if_plec = 'Kobieta';
							$if_nazwisko_rand = rand(0,72);
						} else if($if_imie_rand >= 74 && $if_imie_rand <=146) {
							$if_plec = 'Mezczyzna';
							$if_nazwisko_rand = rand(73,145);
						}
						$if_imie[] = 'ANNA';$if_imie[] = 'MARIA';$if_imie[] = 'KATARZYNA';$if_imie[] = 'MAŁGORZATA';$if_imie[] = 'AGNIESZKA';$if_imie[] = 'BARBARA';$if_imie[] = 'EWA';$if_imie[] = 'KRYSTYNA';$if_imie[] = 'MAGDALENA';$if_imie[] = 'ELŻBIETA';$if_imie[] = 'JOANNA';$if_imie[] = 'ALEKSANDRA';$if_imie[] = 'ZOFIA';$if_imie[] = 'MONIKA';$if_imie[] = 'TERESA';$if_imie[] = 'DANUTA';$if_imie[] = 'NATALIA';$if_imie[] = 'JULIA';$if_imie[] = 'KAROLINA';$if_imie[] = 'MARTA';$if_imie[] = 'BEATA';$if_imie[] = 'DOROTA';$if_imie[] = 'HALINA';$if_imie[] = 'JADWIGA';$if_imie[] = 'JANINA';$if_imie[] = 'ALICJA';$if_imie[] = 'JOLANTA';$if_imie[] = 'GRAŻYNA';$if_imie[] = 'IWONA';$if_imie[] = 'IRENA';$if_imie[] = 'PAULINA';$if_imie[] = 'JUSTYNA';$if_imie[] = 'ZUZANNA';$if_imie[] = 'BOŻENA';$if_imie[] = 'WIKTORIA';$if_imie[] = 'URSZULA';$if_imie[] = 'RENATA';$if_imie[] = 'HANNA';$if_imie[] = 'SYLWIA';$if_imie[] = 'AGATA';$if_imie[] = 'HELENA';$if_imie[] = 'PATRYCJA';$if_imie[] = 'MAJA';$if_imie[] = 'IZABELA';$if_imie[] = 'EMILIA';$if_imie[] = 'ANETA';$if_imie[] = 'WERONIKA';$if_imie[] = 'EWELINA';$if_imie[] = 'OLIWIA';$if_imie[] = 'MARTYNA';$if_imie[] = 'KLAUDIA';$if_imie[] = 'MARIANNA';$if_imie[] = 'MARZENA';$if_imie[] = 'GABRIELA';$if_imie[] = 'STANISŁAWA';$if_imie[] = 'DOMINIKA';$if_imie[] = 'KINGA';$if_imie[] = 'LENA';$if_imie[] = 'EDYTA';$if_imie[] = 'AMELIA';$if_imie[] = 'WIESŁAWA';$if_imie[] = 'KAMILA';$if_imie[] = 'WANDA';$if_imie[] = 'ALINA';$if_imie[] = 'LIDIA';$if_imie[] = 'LUCYNA';$if_imie[] = 'MARIOLA';$if_imie[] = 'NIKOLA';$if_imie[] = 'MIROSŁAWA';$if_imie[] = 'WIOLETTA';$if_imie[] = 'MILENA';$if_imie[] = 'DARIA';$if_imie[] = 'ANGELIKA';$if_imie[] = 'PIOTR';$if_imie[] = 'KRZYSZTOF';$if_imie[] = 'ANDRZEJ';$if_imie[] = 'TOMASZ';$if_imie[] = 'PAWEŁ';$if_imie[] = 'JAN';$if_imie[] = 'MICHAŁ';$if_imie[] = 'MARCIN';$if_imie[] = 'JAKUB';$if_imie[] = 'ADAM';$if_imie[] = 'STANISŁAW';$if_imie[] = 'MAREK';$if_imie[] = 'ŁUKASZ';$if_imie[] = 'GRZEGORZ';$if_imie[] = 'MATEUSZ';$if_imie[] = 'WOJCIECH';$if_imie[] = 'MARIUSZ';$if_imie[] = 'DARIUSZ';$if_imie[] = 'ZBIGNIEW';$if_imie[] = 'MACIEJ';$if_imie[] = 'RAFAŁ';$if_imie[] = 'ROBERT';$if_imie[] = 'JERZY';$if_imie[] = 'KAMIL';$if_imie[] = 'JACEK';$if_imie[] = 'JÓZEF';$if_imie[] = 'DAWID';$if_imie[] = 'SZYMON';$if_imie[] = 'TADEUSZ';$if_imie[] = 'RYSZARD';$if_imie[] = 'KACPER';$if_imie[] = 'BARTOSZ';$if_imie[] = 'JAROSŁAW';$if_imie[] = 'JANUSZ';$if_imie[] = 'SŁAWOMIR';$if_imie[] = 'ARTUR';$if_imie[] = 'MIROSŁAW';$if_imie[] = 'SEBASTIAN';$if_imie[] = 'DAMIAN';$if_imie[] = 'HENRYK';$if_imie[] = 'PATRYK';$if_imie[] = 'DANIEL';$if_imie[] = 'PRZEMYSŁAW';$if_imie[] = 'KAROL';$if_imie[] = 'ROMAN';$if_imie[] = 'KAZIMIERZ';$if_imie[] = 'FILIP';$if_imie[] = 'ANTONI';$if_imie[] = 'WIESŁAW';$if_imie[] = 'ADRIAN';$if_imie[] = 'MARIAN';$if_imie[] = 'ALEKSANDER';$if_imie[] = 'ARKADIUSZ';$if_imie[] = 'DOMINIK';$if_imie[] = 'FRANCISZEK';$if_imie[] = 'BARTŁOMIEJ';$if_imie[] = 'MIKOŁAJ';$if_imie[] = 'LESZEK';$if_imie[] = 'WALDEMAR';$if_imie[] = 'KRYSTIAN';$if_imie[] = 'WIKTOR';$if_imie[] = 'ZDZISŁAW';$if_imie[] = 'RADOSŁAW';$if_imie[] = 'BOGDAN';$if_imie[] = 'KONRAD';$if_imie[] = 'EDWARD';$if_imie[] = 'MIECZYSŁAW';$if_imie[] = 'HUBERT';$if_imie[] = 'MARCEL';$if_imie[] = 'WŁADYSŁAW';$if_imie[] = 'IGOR';$if_imie[] = 'CZESŁAW';$if_imie[] = 'OSKAR';$if_imie[] = 'EUGENIUSZ';
						$if_nazwisko[] = 'NOWAK';$if_nazwisko[] = 'KOWALSKA';$if_nazwisko[] = 'WIŚNIEWSKA';$if_nazwisko[] = 'WÓJCIK';$if_nazwisko[] = 'KOWALCZYK';$if_nazwisko[] = 'KAMIŃSKA';$if_nazwisko[] = 'LEWANDOWSKA';$if_nazwisko[] = 'ZIELIŃSKA';$if_nazwisko[] = 'SZYMAŃSKA';$if_nazwisko[] = 'DĄBROWSKA';$if_nazwisko[] = 'WOŹNIAK';$if_nazwisko[] = 'KOZŁOWSKA';$if_nazwisko[] = 'JANKOWSKA';$if_nazwisko[] = 'MAZUR';$if_nazwisko[] = 'KWIATKOWSKA';$if_nazwisko[] = 'WOJCIECHOWSKA';$if_nazwisko[] = 'KRAWCZYK';$if_nazwisko[] = 'KACZMAREK';$if_nazwisko[] = 'PIOTROWSKA';$if_nazwisko[] = 'GRABOWSKA';$if_nazwisko[] = 'PAWŁOWSKA';$if_nazwisko[] = 'MICHALSKA';$if_nazwisko[] = 'KRÓL';$if_nazwisko[] = 'ZAJĄC';$if_nazwisko[] = 'WIECZOREK';$if_nazwisko[] = 'JABŁOŃSKA';$if_nazwisko[] = 'WRÓBEL';$if_nazwisko[] = 'NOWAKOWSKA';$if_nazwisko[] = 'MAJEWSKA';$if_nazwisko[] = 'OLSZEWSKA';$if_nazwisko[] = 'ADAMCZYK';$if_nazwisko[] = 'JAWORSKA';$if_nazwisko[] = 'MALINOWSKA';$if_nazwisko[] = 'STĘPIEŃ';$if_nazwisko[] = 'DUDEK';$if_nazwisko[] = 'GÓRSKA';$if_nazwisko[] = 'NOWICKA';$if_nazwisko[] = 'WITKOWSKA';$if_nazwisko[] = 'PAWLAK';$if_nazwisko[] = 'SIKORA';$if_nazwisko[] = 'WALCZAK';$if_nazwisko[] = 'RUTKOWSKA';$if_nazwisko[] = 'MICHALAK';$if_nazwisko[] = 'SZEWCZYK';$if_nazwisko[] = 'OSTROWSKA';$if_nazwisko[] = 'BARAN';$if_nazwisko[] = 'TOMASZEWSKA';$if_nazwisko[] = 'ZALEWSKA';$if_nazwisko[] = 'PIETRZAK';$if_nazwisko[] = 'WRÓBLEWSKA';$if_nazwisko[] = 'JASIŃSKA';$if_nazwisko[] = 'MARCINIAK';$if_nazwisko[] = 'JAKUBOWSKA';$if_nazwisko[] = 'SADOWSKA';$if_nazwisko[] = 'ZAWADZKA';$if_nazwisko[] = 'DUDA';$if_nazwisko[] = 'WŁODARCZYK';$if_nazwisko[] = 'BĄK';$if_nazwisko[] = 'CHMIELEWSKA';$if_nazwisko[] = 'BORKOWSKA';$if_nazwisko[] = 'WILK';$if_nazwisko[] = 'SOKOŁOWSKA';$if_nazwisko[] = 'SZCZEPAŃSKA';$if_nazwisko[] = 'SAWICKA';$if_nazwisko[] = 'LIS';$if_nazwisko[] = 'KUCHARSKA';$if_nazwisko[] = 'MACIEJEWSKA';$if_nazwisko[] = 'KALINOWSKA';$if_nazwisko[] = 'MAZUREK';$if_nazwisko[] = 'WYSOCKA';$if_nazwisko[] = 'KUBIAK';$if_nazwisko[] = 'KOŁODZIEJ';$if_nazwisko[] = 'CZARNECKA';$if_nazwisko[] = 'NOWAK';$if_nazwisko[] = 'KOWALSKI';$if_nazwisko[] = 'WIŚNIEWSKI';$if_nazwisko[] = 'WÓJCIK';$if_nazwisko[] = 'KOWALCZYK';$if_nazwisko[] = 'KAMIŃSKI';$if_nazwisko[] = 'LEWANDOWSKI';$if_nazwisko[] = 'ZIELIŃSKI';$if_nazwisko[] = 'SZYMAŃSKI';$if_nazwisko[] = 'WOŹNIAK';$if_nazwisko[] = 'DĄBROWSKI';$if_nazwisko[] = 'KOZŁOWSKI';$if_nazwisko[] = 'MAZUR';$if_nazwisko[] = 'JANKOWSKI';$if_nazwisko[] = 'KWIATKOWSKI';$if_nazwisko[] = 'WOJCIECHOWSKI';$if_nazwisko[] = 'KRAWCZYK';$if_nazwisko[] = 'KACZMAREK';$if_nazwisko[] = 'PIOTROWSKI';$if_nazwisko[] = 'GRABOWSKI';$if_nazwisko[] = 'ZAJĄC';$if_nazwisko[] = 'PAWŁOWSKI';$if_nazwisko[] = 'KRÓL';$if_nazwisko[] = 'MICHALSKI';$if_nazwisko[] = 'WRÓBEL';$if_nazwisko[] = 'WIECZOREK';$if_nazwisko[] = 'JABŁOŃSKI';$if_nazwisko[] = 'NOWAKOWSKI';$if_nazwisko[] = 'MAJEWSKI';$if_nazwisko[] = 'OLSZEWSKI';$if_nazwisko[] = 'DUDEK';$if_nazwisko[] = 'STĘPIEŃ';$if_nazwisko[] = 'JAWORSKI';$if_nazwisko[] = 'ADAMCZYK';$if_nazwisko[] = 'MALINOWSKI';$if_nazwisko[] = 'GÓRSKI';$if_nazwisko[] = 'PAWLAK';$if_nazwisko[] = 'NOWICKI';$if_nazwisko[] = 'SIKORA';$if_nazwisko[] = 'WITKOWSKI';$if_nazwisko[] = 'RUTKOWSKI';$if_nazwisko[] = 'WALCZAK';$if_nazwisko[] = 'BARAN';$if_nazwisko[] = 'MICHALAK';$if_nazwisko[] = 'SZEWCZYK';$if_nazwisko[] = 'OSTROWSKI';$if_nazwisko[] = 'TOMASZEWSKI';$if_nazwisko[] = 'ZALEWSKI';$if_nazwisko[] = 'WRÓBLEWSKI';$if_nazwisko[] = 'PIETRZAK';$if_nazwisko[] = 'JASIŃSKI';$if_nazwisko[] = 'MARCINIAK';$if_nazwisko[] = 'SADOWSKI';$if_nazwisko[] = 'BĄK';$if_nazwisko[] = 'ZAWADZKI';$if_nazwisko[] = 'DUDA';$if_nazwisko[] = 'JAKUBOWSKI';$if_nazwisko[] = 'WILK';$if_nazwisko[] = 'CHMIELEWSKI';$if_nazwisko[] = 'BORKOWSKI';$if_nazwisko[] = 'WŁODARCZYK';$if_nazwisko[] = 'SOKOŁOWSKI';$if_nazwisko[] = 'SZCZEPAŃSKI';$if_nazwisko[] = 'SAWICKI';$if_nazwisko[] = 'LIS';$if_nazwisko[] = 'KUCHARSKI';$if_nazwisko[] = 'KALINOWSKI';$if_nazwisko[] = 'WYSOCKI';$if_nazwisko[] = 'MAZUREK';$if_nazwisko[] = 'KUBIAK';$if_nazwisko[] = 'MACIEJEWSKI';$if_nazwisko[] = 'KOŁODZIEJ';$if_nazwisko[] = 'KAŹMIERCZAK';

						$timestamp = rand(1712405,1074627605);
						$timestamp2 = rand($timestamp+600000000,1074627605);
						$if_data_urodzenia = date("Y-m-d",$timestamp);
						$if_pesel = date("Ymd",$timestamp).rand(100,999);
						$st_nazwa_rand = rand(1,101);
						if($st_nazwa_rand > 0 && $st_nazwa_rand < 7) $st_nazwa = 'Prezes';
						if($st_nazwa_rand > 6 && $st_nazwa_rand < 25) $st_nazwa = 'Kierownik';
						if($st_nazwa_rand > 24 && $st_nazwa_rand < 60) $st_nazwa = 'Kontroler';
						if($st_nazwa_rand > 59 && $st_nazwa_rand < 100) $st_nazwa = 'Konserwator';
						$st_data_uzyskania = date("Y-m-d",$timestamp2);
						$pl_rand_id_query = mysqli_fetch_array($conn->query("SELECT MAX(pl_id) FROM placowki"),MYSQLI_NUM);
							$pl_rand_id = $pl_rand_id_query[0];
							if(!$pl_rand_id) {
								$pl_rand_id = 0;
							}
						$pl_id = rand(1,$pl_rand_id);
						
					
						$insert_query = $conn->query("INSERT INTO adresy (ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica[$ad_ulica_rand]','$ad_nr_domu','$ad_kod_pocztowy')");
							$ad_id_query = mysqli_fetch_array($conn->query("SELECT MAX(ad_id) FROM adresy"),MYSQLI_NUM);
							$ad_id = $ad_id_query[0];
							if(!$ad_id) {
								$ad_id = 1;
							}
						$insert_query = $conn->query("INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES ( '$if_imie[$if_imie_rand]', '$if_nazwisko[$if_nazwisko_rand]', '$if_plec', STR_TO_DATE('$if_data_urodzenia','%Y-%m-%d'), '$if_pesel', '$if_telefon', '$ad_id')");
							if($st_nazwa == 'Prezes') { $st_opis = 'Właściciel stacji kontroli pojazdów, zatrudnia pracowników.'; $st_premia = '2000'; $p_stawka = '9000'; }
							elseif($st_nazwa == 'Kierownik') { $st_opis = 'Kierownik stacji kontroli pojazdów, zatwierdza przeglądy pojazdów.'; $st_premia = '1000'; $p_stawka = '6000'; }
							elseif($st_nazwa == 'Kontroler') { $st_opis = 'Kontroler stacji kontroli pojazdów, zajmuje się przeglądem pojazdów, sprawdza ich stan przydatności do ruchu drogowego.'; $st_premia = '400'; $p_stawka = '4000'; }
							elseif($st_nazwa == 'Konserwator') { $st_opis = 'Konserwator stacji kontroli pojazdów, zajmuje się pracami konserwatorskimi.'; $st_premia = '200';  $p_stawka = '3000'; }
						$insert_query = $conn->query("INSERT INTO stanowiska ( st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES ( '$st_nazwa', '$st_opis', '$st_premia', STR_TO_DATE('$st_data_uzyskania','%Y-%m-%d'))");
							$st_id_query = mysqli_fetch_array($conn->query("SELECT MAX(st_id) FROM stanowiska"),MYSQLI_NUM);
							$st_id = $st_id_query[0];
							if(!$st_id) {
								$st_id = 1;
							}
							$if_id_query =mysqli_fetch_array($conn->query("SELECT MAX(if_id) FROM informacje_osobowe"),MYSQLI_NUM);
							$if_id = $if_id_query[0];
							if(!$if_id) {
								$if_id = 1;
							}
						$insert_query = $conn->query("INSERT INTO pracownicy ( p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id ) VALUES ( '0' , '$p_stawka', '$pl_id', '$if_id', '$st_id' )");
						
					}
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
				if(!empty($_POST['k_rekordy'])) {
					for($i=0; $i<$_POST['k_rekordy'];$i++) {
						$ad_kraj = 'Polska';
						$ad_wojewodztwo_rand = rand(0,15);
						if($ad_wojewodztwo_rand == '0') { $ad_wojewodztwo = 'Dolnośląskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Wrocław'; $ad_kod_pocztowy = '51-416'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Legnica'; $ad_kod_pocztowy = '59-220'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Jelenia Góra'; $ad_kod_pocztowy = '58-500'; } }
						if($ad_wojewodztwo_rand == '1') { $ad_wojewodztwo = 'Kujawsko-pomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Bydgoszcz'; $ad_kod_pocztowy = '85-461 '; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Toruń'; $ad_kod_pocztowy = '87-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Włocławek'; $ad_kod_pocztowy = '87-800'; } }
						if($ad_wojewodztwo_rand == '2') { $ad_wojewodztwo = 'Lubelskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Lublin'; $ad_kod_pocztowy = '20-218'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Zamość'; $ad_kod_pocztowy = '22-400'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Chełm'; $ad_kod_pocztowy = '22-100'; } }
						if($ad_wojewodztwo_rand == '3') { $ad_wojewodztwo = 'Lubuskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Zielona Góra'; $ad_kod_pocztowy = '65-751'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Nowa Sól'; $ad_kod_pocztowy = '67-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Żary'; $ad_kod_pocztowy = '68-200'; } }
						if($ad_wojewodztwo_rand == '4') { $ad_wojewodztwo = 'Łódzkie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Łódź'; $ad_kod_pocztowy = '90-001'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Piotrków Trybunalski'; $ad_kod_pocztowy = '97-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Bełchatów'; $ad_kod_pocztowy = '97-400'; } }
						if($ad_wojewodztwo_rand == '5') { $ad_wojewodztwo = 'Małopolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Kraków'; $ad_kod_pocztowy = '31-403'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Tarnów'; $ad_kod_pocztowy = '33-100'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Zakopane'; $ad_kod_pocztowy = '34-500'; } }
						if($ad_wojewodztwo_rand == '6') { $ad_wojewodztwo = 'Mazowieckie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Warszawa'; $ad_kod_pocztowy = '01-464'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Radom'; $ad_kod_pocztowy = '26-604'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Płock'; $ad_kod_pocztowy = '09-400'; } }
						if($ad_wojewodztwo_rand == '7') { $ad_wojewodztwo = 'Opolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Opole'; $ad_kod_pocztowy = '45-309'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Nysa'; $ad_kod_pocztowy = '48-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Kluczbork'; $ad_kod_pocztowy = '46-200'; } }
						if($ad_wojewodztwo_rand == '8') { $ad_wojewodztwo = 'Podkarpackie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Rzeszów'; $ad_kod_pocztowy = '35-085'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Przemyśl'; $ad_kod_pocztowy = '37-700'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Tarnobrzeg'; $ad_kod_pocztowy = '39-400'; } }
						if($ad_wojewodztwo_rand == '9') { $ad_wojewodztwo = 'Podlaskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Białystok'; $ad_kod_pocztowy = '15-102'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Suwałki'; $ad_kod_pocztowy = '16-400'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Łomża'; $ad_kod_pocztowy = '18-400'; } }
						if($ad_wojewodztwo_rand == '10') { $ad_wojewodztwo = 'Pomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Gdańsk'; $ad_kod_pocztowy = '80-761'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Gdynia'; $ad_kod_pocztowy = '81-222'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Sopot'; $ad_kod_pocztowy = '81-704'; } }
						if($ad_wojewodztwo_rand == '11') { $ad_wojewodztwo = 'Śląskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Katowice'; $ad_kod_pocztowy = '40-203'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Sosnowiec'; $ad_kod_pocztowy = '41-200'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Częstochowa'; $ad_kod_pocztowy = '42-200'; } }
						if($ad_wojewodztwo_rand == '12') { $ad_wojewodztwo = 'Świętokrzyskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Kielce'; $ad_kod_pocztowy = '25-900'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Sandomierz'; $ad_kod_pocztowy = '27-600'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Starachowice'; $ad_kod_pocztowy = '27-200'; } }
						if($ad_wojewodztwo_rand == '13') { $ad_wojewodztwo = 'Warmińsko-mazurskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Olsztyn'; $ad_kod_pocztowy = '10-900'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Elbląg'; $ad_kod_pocztowy = '82-300'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Ełk'; $ad_kod_pocztowy = '19-300'; } }
						if($ad_wojewodztwo_rand == '14') { $ad_wojewodztwo = 'Wielkopolskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Poznań'; $ad_kod_pocztowy = '60-967'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Kalisz'; $ad_kod_pocztowy = '62-800'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Gniezno'; $ad_kod_pocztowy = '62-200'; } }
						if($ad_wojewodztwo_rand == '15') { $ad_wojewodztwo = 'Zachodniopomorskie'; $ad_miasto_rand = rand(0,2);
								if($ad_miasto_rand == '0') { $ad_miasto = 'Szczecin'; $ad_kod_pocztowy = '70-735'; }
								if($ad_miasto_rand == '1') { $ad_miasto = 'Koszalin'; $ad_kod_pocztowy = '75-841'; }
								if($ad_miasto_rand == '2') { $ad_miasto = 'Stargard Szczeciński'; $ad_kod_pocztowy = '73-110'; } }
						$ad_ulica_rand = rand(0,144);
						$ad_ulica[] = '1 Maja'; $ad_ulica[] = 'Akacjowa'; $ad_ulica[] = 'Alabastrowa'; $ad_ulica[] = 'Aleksandra Fredry'; $ad_ulica[] = 'Andrzeja Struga'; $ad_ulica[] = 'Armii Krajowej'; $ad_ulica[] = 'Bernardyńska'; $ad_ulica[] = 'Beskidzka'; $ad_ulica[] = 'Białogońska'; $ad_ulica[] = 'Biesak'; $ad_ulica[] = 'Bieszczadzka'; $ad_ulica[] = 'Cedrowa'; $ad_ulica[] = 'Cedzyńska'; $ad_ulica[] = 'Ceglana'; $ad_ulica[] = 'Ciekocka'; $ad_ulica[] = 'Ciepła'; $ad_ulica[] = 'Cisowa'; $ad_ulica[] = 'Cmentarna'; $ad_ulica[] = 'Działkowa'; $ad_ulica[] = 'Dzielna'; $ad_ulica[] = 'Dzika'; $ad_ulica[] = 'Długa'; $ad_ulica[] = 'Ewangelicka'; $ad_ulica[] = 'Fabryczna'; $ad_ulica[] = 'Grochowa'; $ad_ulica[] = 'Gromadzka'; $ad_ulica[] = 'Gronowa'; $ad_ulica[] = 'Gruchawka'; $ad_ulica[] = 'Grunwaldzka'; $ad_ulica[] = 'Grzybowa'; $ad_ulica[] = 'Hubalczyków'; $ad_ulica[] = 'Husarska'; $ad_ulica[] = 'Hutnicza'; $ad_ulica[] = 'Iglasta'; $ad_ulica[] = 'Ignacego Daszyńskiego'; $ad_ulica[] = 'Ignacego Paderewskiego'; $ad_ulica[] = 'Jagiellońska'; $ad_ulica[] = 'Jagodowa'; $ad_ulica[] = 'Kapitulna'; $ad_ulica[] = 'Karbońska'; $ad_ulica[] = 'Karczówka - Klasztor'; $ad_ulica[] = 'Karczówkowska'; $ad_ulica[] = 'Karczunek'; $ad_ulica[] = 'Karkonoska'; $ad_ulica[] = 'Karola Henryka Kadena'; $ad_ulica[] = 'Karola Kurpińskiego'; $ad_ulica[] = 'Karola Olszewskiego'; $ad_ulica[] = 'Karola Szymanowskiego'; $ad_ulica[] = 'Karpacka'; $ad_ulica[] = 'Kasztanowa'; $ad_ulica[] = 'Kazimierza Kaznowskiego'; $ad_ulica[] = 'Kazimierza Smolaka'; $ad_ulica[] = 'Klecka'; $ad_ulica[] = 'Klonowa'; $ad_ulica[] = 'Kocka'; $ad_ulica[] = 'Legnicka'; $ad_ulica[] = 'Leona Skibińskiego'; $ad_ulica[] = 'Leopolda Staffa'; $ad_ulica[] = 'Leśna'; $ad_ulica[] = 'Leśniówka'; $ad_ulica[] = 'Leszczyńska'; $ad_ulica[] = 'Mazurska'; $ad_ulica[] = 'Mała'; $ad_ulica[] = 'Mała Zgoda'; $ad_ulica[] = 'Małopolska'; $ad_ulica[] = 'Mechaników'; $ad_ulica[] = 'Miechowska'; $ad_ulica[] = 'Mieczysława Karłowicza'; $ad_ulica[] = 'Mieczysławy Ćwiklińskiej'; $ad_ulica[] = 'Miedziana'; $ad_ulica[] = 'Mikołaja Gomółki'; $ad_ulica[] = 'Mikołaja Reja'; $ad_ulica[] = 'Niestachowska'; $ad_ulica[] = 'Niewachlowska'; $ad_ulica[] = 'Niska'; $ad_ulica[] = 'Niwy Lisowskie'; $ad_ulica[] = 'Norweska'; $ad_ulica[] = 'Nowa'; $ad_ulica[] = 'Nowowiejska'; $ad_ulica[] = 'Nowy Świat'; $ad_ulica[] = 'Pakosz'; $ad_ulica[] = 'Pancerna'; $ad_ulica[] = 'Panoramiczna'; $ad_ulica[] = 'Pańska'; $ad_ulica[] = 'Parkowa'; $ad_ulica[] = 'Patrol'; $ad_ulica[] = 'Pawia'; $ad_ulica[] = 'Permska'; $ad_ulica[] = 'Peryferyjna'; $ad_ulica[] = 'Petyhorska'; $ad_ulica[] = 'Piekoszowska'; $ad_ulica[] = 'Pienińska'; $ad_ulica[] = 'Piesza'; $ad_ulica[] = 'Pietraszki'; $ad_ulica[] = 'Śląska'; $ad_ulica[] = 'Ślazy'; $ad_ulica[] = 'Ślichowicka'; $ad_ulica[] = 'Ślusarska'; $ad_ulica[] = 'Sokola'; $ad_ulica[] = 'Solidarności'; $ad_ulica[] = 'Solna'; $ad_ulica[] = 'Sosnowa'; $ad_ulica[] = 'Sowia'; $ad_ulica[] = 'Spacerowa'; $ad_ulica[] = 'Spokojna'; $ad_ulica[] = 'Strycharska'; $ad_ulica[] = 'Studencka'; $ad_ulica[] = 'Studziankowska'; $ad_ulica[] = 'Studzienna'; $ad_ulica[] = 'Sucha'; $ad_ulica[] = 'Sudecka'; $ad_ulica[] = 'Tatarska'; $ad_ulica[] = 'Tatrzańska'; $ad_ulica[] = 'Tektoniczna'; $ad_ulica[] = 'Tobrucka'; $ad_ulica[] = 'Zacisze'; $ad_ulica[] = 'Zagnańska'; $ad_ulica[] = 'Zagonowa'; $ad_ulica[] = 'Zagórska'; $ad_ulica[] = 'Zagrabowicka'; $ad_ulica[] = 'Zagrodowa'; $ad_ulica[] = 'Zakopiańska'; $ad_ulica[] = 'Zakręt'; $ad_ulica[] = 'Zakładowa'; $ad_ulica[] = 'Zalesie'; $ad_ulica[] = 'Łódzka'; $ad_ulica[] = 'Łopianowa'; $ad_ulica[] = 'Łopuszniańska'; $ad_ulica[] = 'Łotewska';
						$ad_nr_domu = rand(1,500);
						$if_telefon = rand(100,999).rand(100,999).rand(100,999);
						
						$if_imie_rand = rand(0,146);
						if($if_imie_rand >= 0 && $if_imie_rand <=73) {
							$if_plec = 'Kobieta';
							$if_nazwisko_rand = rand(0,72);
						} else if($if_imie_rand >= 74 && $if_imie_rand <=146) {
							$if_plec = 'Mezczyzna';
							$if_nazwisko_rand = rand(73,145);
						}
						$if_imie[] = 'ANNA';$if_imie[] = 'MARIA';$if_imie[] = 'KATARZYNA';$if_imie[] = 'MAŁGORZATA';$if_imie[] = 'AGNIESZKA';$if_imie[] = 'BARBARA';$if_imie[] = 'EWA';$if_imie[] = 'KRYSTYNA';$if_imie[] = 'MAGDALENA';$if_imie[] = 'ELŻBIETA';$if_imie[] = 'JOANNA';$if_imie[] = 'ALEKSANDRA';$if_imie[] = 'ZOFIA';$if_imie[] = 'MONIKA';$if_imie[] = 'TERESA';$if_imie[] = 'DANUTA';$if_imie[] = 'NATALIA';$if_imie[] = 'JULIA';$if_imie[] = 'KAROLINA';$if_imie[] = 'MARTA';$if_imie[] = 'BEATA';$if_imie[] = 'DOROTA';$if_imie[] = 'HALINA';$if_imie[] = 'JADWIGA';$if_imie[] = 'JANINA';$if_imie[] = 'ALICJA';$if_imie[] = 'JOLANTA';$if_imie[] = 'GRAŻYNA';$if_imie[] = 'IWONA';$if_imie[] = 'IRENA';$if_imie[] = 'PAULINA';$if_imie[] = 'JUSTYNA';$if_imie[] = 'ZUZANNA';$if_imie[] = 'BOŻENA';$if_imie[] = 'WIKTORIA';$if_imie[] = 'URSZULA';$if_imie[] = 'RENATA';$if_imie[] = 'HANNA';$if_imie[] = 'SYLWIA';$if_imie[] = 'AGATA';$if_imie[] = 'HELENA';$if_imie[] = 'PATRYCJA';$if_imie[] = 'MAJA';$if_imie[] = 'IZABELA';$if_imie[] = 'EMILIA';$if_imie[] = 'ANETA';$if_imie[] = 'WERONIKA';$if_imie[] = 'EWELINA';$if_imie[] = 'OLIWIA';$if_imie[] = 'MARTYNA';$if_imie[] = 'KLAUDIA';$if_imie[] = 'MARIANNA';$if_imie[] = 'MARZENA';$if_imie[] = 'GABRIELA';$if_imie[] = 'STANISŁAWA';$if_imie[] = 'DOMINIKA';$if_imie[] = 'KINGA';$if_imie[] = 'LENA';$if_imie[] = 'EDYTA';$if_imie[] = 'AMELIA';$if_imie[] = 'WIESŁAWA';$if_imie[] = 'KAMILA';$if_imie[] = 'WANDA';$if_imie[] = 'ALINA';$if_imie[] = 'LIDIA';$if_imie[] = 'LUCYNA';$if_imie[] = 'MARIOLA';$if_imie[] = 'NIKOLA';$if_imie[] = 'MIROSŁAWA';$if_imie[] = 'WIOLETTA';$if_imie[] = 'MILENA';$if_imie[] = 'DARIA';$if_imie[] = 'ANGELIKA';$if_imie[] = 'PIOTR';$if_imie[] = 'KRZYSZTOF';$if_imie[] = 'ANDRZEJ';$if_imie[] = 'TOMASZ';$if_imie[] = 'PAWEŁ';$if_imie[] = 'JAN';$if_imie[] = 'MICHAŁ';$if_imie[] = 'MARCIN';$if_imie[] = 'JAKUB';$if_imie[] = 'ADAM';$if_imie[] = 'STANISŁAW';$if_imie[] = 'MAREK';$if_imie[] = 'ŁUKASZ';$if_imie[] = 'GRZEGORZ';$if_imie[] = 'MATEUSZ';$if_imie[] = 'WOJCIECH';$if_imie[] = 'MARIUSZ';$if_imie[] = 'DARIUSZ';$if_imie[] = 'ZBIGNIEW';$if_imie[] = 'MACIEJ';$if_imie[] = 'RAFAŁ';$if_imie[] = 'ROBERT';$if_imie[] = 'JERZY';$if_imie[] = 'KAMIL';$if_imie[] = 'JACEK';$if_imie[] = 'JÓZEF';$if_imie[] = 'DAWID';$if_imie[] = 'SZYMON';$if_imie[] = 'TADEUSZ';$if_imie[] = 'RYSZARD';$if_imie[] = 'KACPER';$if_imie[] = 'BARTOSZ';$if_imie[] = 'JAROSŁAW';$if_imie[] = 'JANUSZ';$if_imie[] = 'OLAF';$if_imie[] = 'ARTUR';$if_imie[] = 'MIROSŁAW';$if_imie[] = 'SEBASTIAN';$if_imie[] = 'DAMIAN';$if_imie[] = 'HENRYK';$if_imie[] = 'PATRYK';$if_imie[] = 'DANIEL';$if_imie[] = 'PRZEMYSŁAW';$if_imie[] = 'KAROL';$if_imie[] = 'ROMAN';$if_imie[] = 'DAWID';$if_imie[] = 'FILIP';$if_imie[] = 'ANTONI';$if_imie[] = 'JAKUB';$if_imie[] = 'ADRIAN';$if_imie[] = 'MARIAN';$if_imie[] = 'ALEKSANDER';$if_imie[] = 'ARKADIUSZ';$if_imie[] = 'DOMINIK';$if_imie[] = 'FRANCISZEK';$if_imie[] = 'BARTŁOMIEJ';$if_imie[] = 'MIKOŁAJ';$if_imie[] = 'LESZEK';$if_imie[] = 'WALDEMAR';$if_imie[] = 'KRYSTIAN';$if_imie[] = 'WIKTOR';$if_imie[] = 'ZDZISŁAW';$if_imie[] = 'RADOSŁAW';$if_imie[] = 'BOGDAN';$if_imie[] = 'KONRAD';$if_imie[] = 'EDWARD';$if_imie[] = 'MIECZYSŁAW';$if_imie[] = 'HUBERT';$if_imie[] = 'MARCEL';$if_imie[] = 'WŁADYSŁAW';$if_imie[] = 'IGOR';$if_imie[] = 'CZESŁAW';$if_imie[] = 'OSKAR';$if_imie[] = 'EUGENIUSZ';
						$if_nazwisko[] = 'NOWAK';$if_nazwisko[] = 'KOWALSKA';$if_nazwisko[] = 'WIŚNIEWSKA';$if_nazwisko[] = 'WÓJCIK';$if_nazwisko[] = 'KOWALCZYK';$if_nazwisko[] = 'KAMIŃSKA';$if_nazwisko[] = 'LEWANDOWSKA';$if_nazwisko[] = 'ZIELIŃSKA';$if_nazwisko[] = 'SZYMAŃSKA';$if_nazwisko[] = 'DĄBROWSKA';$if_nazwisko[] = 'WOŹNIAK';$if_nazwisko[] = 'KOZŁOWSKA';$if_nazwisko[] = 'JANKOWSKA';$if_nazwisko[] = 'MAZUR';$if_nazwisko[] = 'KWIATKOWSKA';$if_nazwisko[] = 'WOJCIECHOWSKA';$if_nazwisko[] = 'KRAWCZYK';$if_nazwisko[] = 'KACZMAREK';$if_nazwisko[] = 'PIOTROWSKA';$if_nazwisko[] = 'GRABOWSKA';$if_nazwisko[] = 'PAWŁOWSKA';$if_nazwisko[] = 'MICHALSKA';$if_nazwisko[] = 'KRÓL';$if_nazwisko[] = 'ZAJĄC';$if_nazwisko[] = 'WIECZOREK';$if_nazwisko[] = 'JABŁOŃSKA';$if_nazwisko[] = 'WRÓBEL';$if_nazwisko[] = 'NOWAKOWSKA';$if_nazwisko[] = 'MAJEWSKA';$if_nazwisko[] = 'OLSZEWSKA';$if_nazwisko[] = 'ADAMCZYK';$if_nazwisko[] = 'JAWORSKA';$if_nazwisko[] = 'MALINOWSKA';$if_nazwisko[] = 'STĘPIEŃ';$if_nazwisko[] = 'DUDEK';$if_nazwisko[] = 'GÓRSKA';$if_nazwisko[] = 'NOWICKA';$if_nazwisko[] = 'WITKOWSKA';$if_nazwisko[] = 'PAWLAK';$if_nazwisko[] = 'SIKORA';$if_nazwisko[] = 'WALCZAK';$if_nazwisko[] = 'RUTKOWSKA';$if_nazwisko[] = 'MICHALAK';$if_nazwisko[] = 'SZEWCZYK';$if_nazwisko[] = 'OSTROWSKA';$if_nazwisko[] = 'BARAN';$if_nazwisko[] = 'TOMASZEWSKA';$if_nazwisko[] = 'ZALEWSKA';$if_nazwisko[] = 'PIETRZAK';$if_nazwisko[] = 'WRÓBLEWSKA';$if_nazwisko[] = 'JASIŃSKA';$if_nazwisko[] = 'MARCINIAK';$if_nazwisko[] = 'JAKUBOWSKA';$if_nazwisko[] = 'SADOWSKA';$if_nazwisko[] = 'ZAWADZKA';$if_nazwisko[] = 'DUDA';$if_nazwisko[] = 'WŁODARCZYK';$if_nazwisko[] = 'BĄK';$if_nazwisko[] = 'CHMIELEWSKA';$if_nazwisko[] = 'BORKOWSKA';$if_nazwisko[] = 'WILK';$if_nazwisko[] = 'SOKOŁOWSKA';$if_nazwisko[] = 'SZCZEPAŃSKA';$if_nazwisko[] = 'SAWICKA';$if_nazwisko[] = 'LIS';$if_nazwisko[] = 'KUCHARSKA';$if_nazwisko[] = 'MACIEJEWSKA';$if_nazwisko[] = 'KALINOWSKA';$if_nazwisko[] = 'MAZUREK';$if_nazwisko[] = 'WYSOCKA';$if_nazwisko[] = 'KUBIAK';$if_nazwisko[] = 'KOŁODZIEJ';$if_nazwisko[] = 'CZARNECKA';$if_nazwisko[] = 'NOWAK';$if_nazwisko[] = 'KOWALSKI';$if_nazwisko[] = 'WIŚNIEWSKI';$if_nazwisko[] = 'WÓJCIK';$if_nazwisko[] = 'KOWALCZYK';$if_nazwisko[] = 'KAMIŃSKI';$if_nazwisko[] = 'LEWANDOWSKI';$if_nazwisko[] = 'ZIELIŃSKI';$if_nazwisko[] = 'SZYMAŃSKI';$if_nazwisko[] = 'WOŹNIAK';$if_nazwisko[] = 'DĄBROWSKI';$if_nazwisko[] = 'KOZŁOWSKI';$if_nazwisko[] = 'MAZUR';$if_nazwisko[] = 'JANKOWSKI';$if_nazwisko[] = 'KWIATKOWSKI';$if_nazwisko[] = 'WOJCIECHOWSKI';$if_nazwisko[] = 'KRAWCZYK';$if_nazwisko[] = 'KACZMAREK';$if_nazwisko[] = 'PIOTROWSKI';$if_nazwisko[] = 'GRABOWSKI';$if_nazwisko[] = 'ZAJĄC';$if_nazwisko[] = 'PAWŁOWSKI';$if_nazwisko[] = 'KRÓL';$if_nazwisko[] = 'MICHALSKI';$if_nazwisko[] = 'WRÓBEL';$if_nazwisko[] = 'WIECZOREK';$if_nazwisko[] = 'JABŁOŃSKI';$if_nazwisko[] = 'NOWAKOWSKI';$if_nazwisko[] = 'MAJEWSKI';$if_nazwisko[] = 'OLSZEWSKI';$if_nazwisko[] = 'DUDEK';$if_nazwisko[] = 'STĘPIEŃ';$if_nazwisko[] = 'JAWORSKI';$if_nazwisko[] = 'ADAMCZYK';$if_nazwisko[] = 'MALINOWSKI';$if_nazwisko[] = 'GÓRSKI';$if_nazwisko[] = 'PAWLAK';$if_nazwisko[] = 'NOWICKI';$if_nazwisko[] = 'SIKORA';$if_nazwisko[] = 'WITKOWSKI';$if_nazwisko[] = 'RUTKOWSKI';$if_nazwisko[] = 'WALCZAK';$if_nazwisko[] = 'BARAN';$if_nazwisko[] = 'MICHALAK';$if_nazwisko[] = 'SZEWCZYK';$if_nazwisko[] = 'OSTROWSKI';$if_nazwisko[] = 'TOMASZEWSKI';$if_nazwisko[] = 'ZALEWSKI';$if_nazwisko[] = 'WRÓBLEWSKI';$if_nazwisko[] = 'PIETRZAK';$if_nazwisko[] = 'JASIŃSKI';$if_nazwisko[] = 'MARCINIAK';$if_nazwisko[] = 'SADOWSKI';$if_nazwisko[] = 'BĄK';$if_nazwisko[] = 'ZAWADZKI';$if_nazwisko[] = 'DUDA';$if_nazwisko[] = 'JAKUBOWSKI';$if_nazwisko[] = 'WILK';$if_nazwisko[] = 'CHMIELEWSKI';$if_nazwisko[] = 'BORKOWSKI';$if_nazwisko[] = 'WŁODARCZYK';$if_nazwisko[] = 'SOKOŁOWSKI';$if_nazwisko[] = 'SZCZEPAŃSKI';$if_nazwisko[] = 'SAWICKI';$if_nazwisko[] = 'LIS';$if_nazwisko[] = 'KUCHARSKI';$if_nazwisko[] = 'KALINOWSKI';$if_nazwisko[] = 'WYSOCKI';$if_nazwisko[] = 'MAZUREK';$if_nazwisko[] = 'KUBIAK';$if_nazwisko[] = 'MACIEJEWSKI';$if_nazwisko[] = 'KOŁODZIEJ';$if_nazwisko[] = 'KAŹMIERCZAK';

						
						$timestamp = rand(1712405,1074627605);
						$timestamp2 = rand($timestamp+600000000,1074627605);
						$timestamp3 = rand($timestamp2+600000000,1074627605);
						$if_data_urodzenia = date("Y-m-d",$timestamp);
						$if_pesel = date("Ymd",$timestamp).rand(100,999);
						
						$w_data_prawa_jazdy = date("Y-m-d",$timestamp2);
						$w_waznosc_prawa_jazdy = date("Y-m-d",$timestamp3);
						$p_rand_id_query = mysqli_fetch_array($conn->query("SELECT MAX(p_id) FROM pracownicy"),MYSQLI_NUM);
							$p_rand_id = $p_rand_id_query[0];
							if(!$p_rand_id) {
								$p_rand_id = 0;
							}
						$w_ilosc_samochodow = rand(0,4);
						$w_procent_znizek_oc = rand(0,100);	
						$p_id = rand(1,$p_rand_id);
						if(!mysqli_num_rows($conn->query("SELECT * FROM pracownicy WHERE p_id = '$p_id'"))) {
							$p_id_ch = mysqli_fetch_array($conn->query("SELECT p_id FROM pracownicy"),MYSQLI_NUM);
							$p_id = $p_id_ch[0];
						}
							
						$sp_silnik_rand = rand(1,30); if($sp_silnik_rand > 0 && $sp_silnik_rand < 2)  {  $sp_silnik = 'NIESPRAWNE'; } else { $sp_silnik = 'SPRAWNE'; };
						$sp_hamulce_rand = rand(1,30); if($sp_hamulce_rand > 0 && $sp_hamulce_rand < 3)  {  $sp_hamulce = 'NIESPRAWNE'; } else { $sp_hamulce = 'SPRAWNE'; };
						$sp_amortyzatory_rand = rand(1,30); if($sp_amortyzatory_rand > 0 && $sp_amortyzatory_rand < 3)  {  $sp_amortyzatory = 'NIESPRAWNE'; } else { $sp_amortyzatory = 'SPRAWNE'; };
						$sp_zawieszenie_rand = rand(1,30); if($sp_zawieszenie_rand > 0 && $sp_zawieszenie_rand < 3)  {  $sp_zawieszenie = 'NIESPRAWNE'; } else { $sp_zawieszenie = 'SPRAWNE'; };
						$sp_zarowki_rand = rand(1,30); if($sp_zarowki_rand > 0 && $sp_zarowki_rand < 4)  {  $sp_zarowki = 'NIESPRAWNE'; } else { $sp_zarowki = 'SPRAWNE'; };
						$sp_lampy_rand = rand(1,30); if($sp_lampy_rand > 0 && $sp_lampy_rand < 2)  {  $sp_lampy = 'NIESPRAWNE'; } else { $sp_lampy = 'SPRAWNE'; };
						$dp_skrzynia_biegow_rand = rand(1,30); if($dp_skrzynia_biegow_rand > 0 && $dp_skrzynia_biegow_rand < 10)  { $dp_skrzynia_biegow = 'automatyczna'; } else { $dp_skrzynia_biegow = 'manualna'; };
						$w_ilosc_samochodow = rand(0,4);
						$pp_kraj_produkcji_rand = rand (0,11);
						$pp_kraj_produkcji[] = 'Polska';$pp_kraj_produkcji[] = 'Japonia';$pp_kraj_produkcji[] = 'Niemcy';$pp_kraj_produkcji[] = 'Hiszpania';$pp_kraj_produkcji[] = 'Belgia';$pp_kraj_produkcji[] = 'Szwecja';$pp_kraj_produkcji[] = 'Portugalia';$pp_kraj_produkcji[] = 'Włochy';$pp_kraj_produkcji[] = 'USA';$pp_kraj_produkcji[] = 'Anglia';$pp_kraj_produkcji[] = 'Austria';$pp_kraj_produkcji[] = 'Holandia';
						$pp_ilosc_wlascicieli = rand(0,4);
						
						$min_date_query = mysqli_fetch_array($conn->query("SELECT MIN(zp_data) FROM zmiany_pracownicze"),MYSQLI_NUM);
							$min_date = $min_date_query[0];
							if(!$min_date) {
								$min_date = date("Y-m-d");
							}
						$data_now = date("Y-m-d");
						$k_data_kontroli = date("Y-m-d",rand(date_timestamp_get(date_create($min_date)), date_timestamp_get(date_create($data_now))));
						$skrot_nr_rand = rand(0,31);
						$skrot_nr[] = 'BI';$skrot_nr[] = 'BS';$skrot_nr[] = 'CB';$skrot_nr[] = 'CG';$skrot_nr[] = 'DJ';$skrot_nr[] = 'DL';$skrot_nr[] = 'EP';$skrot_nr[] = 'EL';$skrot_nr[] = 'FG';$skrot_nr[] = 'FZ';$skrot_nr[] = 'GD';$skrot_nr[] = 'GA';$skrot_nr[] = 'KR';$skrot_nr[] = 'KT';$skrot_nr[] = 'LB';$skrot_nr[] = 'LU';$skrot_nr[] = 'NE';$skrot_nr[] = 'NO';$skrot_nr[] = 'OP';$skrot_nr[] = 'OB';$skrot_nr[] = 'PK';$skrot_nr[] = 'PN';$skrot_nr[] = 'RK';$skrot_nr[] = 'RP';$skrot_nr[] = 'SK';$skrot_nr[] = 'SB';$skrot_nr[] = 'TK';$skrot_nr[] = 'TBU';$skrot_nr[] = 'WR';$skrot_nr[] = 'WA';$skrot_nr[] = 'ZK';$skrot_nr[] = 'ZS';
						$s_numer_rejestracyjny = $skrot_nr[$skrot_nr_rand].' '.rand(1000,999999);
						
						$car_rand = rand(0,54);
						if($car_rand == 0) {
							$s_typ = 'Sedan';$s_marka = 'Audi';$s_model = 'A4';$s_generacja = 'B6';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(150000,400000); $dp_pojemnosc = '2.0'; $dp_moc_km = '131'; $dp_moc_kw = '96'; $dp_masa_wlasna = '1365';$car_ds = '2001-01-01'; $car_de = '2005-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 1) {
							$s_typ = 'Sedan';$s_marka = 'Audi';$s_model = 'A4';$s_generacja = 'B6';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(150000,400000); $dp_pojemnosc = '1.8'; $dp_moc_km = '190'; $dp_moc_kw = '140'; $dp_masa_wlasna = '1365';$car_ds = '2001-01-01'; $car_de = '2005-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 2) {
							$s_typ = 'Kombi';$s_marka = 'Audi';$s_model = 'A4';$s_generacja = 'B6';$dp_paliwo = 'Diesel';$dp_przebieg = rand(150000,400000); $dp_pojemnosc = '1.9'; $dp_moc_km = '130'; $dp_moc_kw = '96'; $dp_masa_wlasna = '1365';$car_ds = '2001-01-01'; $car_de = '2005-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 3) {
							$s_typ = 'Kombi';$s_marka = 'Audi';$s_model = 'A6';$s_generacja = 'C8';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(15000,150000); $dp_pojemnosc = '3.0'; $dp_moc_km = '333'; $dp_moc_kw = '245'; $dp_masa_wlasna = '1735';$car_ds = '2011-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 4) {
							$s_typ = 'Sedan';$s_marka = 'Audi';$s_model = 'A6';$s_generacja = 'C8';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(15000,150000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '252'; $dp_moc_kw = '185'; $dp_masa_wlasna = '1735';$car_ds = '2011-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 5) {
							$s_typ = 'Kombi';$s_marka = 'Audi';$s_model = 'A6';$s_generacja = 'C8';$dp_paliwo = 'Diesel';$dp_przebieg = rand(15000,150000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '190'; $dp_moc_kw = '140'; $dp_masa_wlasna = '1735';$car_ds = '2011-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 6) {
							$s_typ = 'Sedan';$s_marka = 'Audi';$s_model = 'A6';$s_generacja = 'C8';$dp_paliwo = 'Diesel';$dp_przebieg = rand(15000,150000);  $dp_pojemnosc = '3.0'; $dp_moc_km = '326'; $dp_moc_kw = '240'; $dp_masa_wlasna = '1735';$car_ds = '2011-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 7) {
							$s_typ = 'Sedan';$s_marka = 'BMW';$s_model = 'Seria 5';$s_generacja = 'E60';$dp_paliwo = 'Diesel';$dp_przebieg = rand(100000,350000);  $dp_pojemnosc = '3.0'; $dp_moc_km = '286'; $dp_moc_kw = '210'; $dp_masa_wlasna = '1510';$car_ds = '2003-01-01'; $car_de = '2011-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 8) {
							$s_typ = 'Kombi';$s_marka = 'BMW';$s_model = 'Seria 5';$s_generacja = 'E60';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(100000,350000);  $dp_pojemnosc = '2.5'; $dp_moc_km = '218'; $dp_moc_kw = '160'; $dp_masa_wlasna = '1510';$car_ds = '2003-01-01'; $car_de = '2011-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 9) {
							$s_typ = 'Sedan';$s_marka = 'BMW';$s_model = 'Seria 3';$s_generacja = 'E46';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(150000,400000);  $dp_pojemnosc = '1.8'; $dp_moc_km = '116'; $dp_moc_kw = '85'; $dp_masa_wlasna = '1320';$car_ds = '1998-01-01'; $car_de = '2006-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 10) {
							$s_typ = 'Sedan';$s_marka = 'BMW';$s_model = 'Seria 3';$s_generacja = 'E46';$dp_paliwo = 'Diesel';$dp_przebieg = rand(150000,400000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '136'; $dp_moc_kw = '100'; $dp_masa_wlasna = '1320';$car_ds = '1998-01-01'; $car_de = '2006-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 11) {
							$s_typ = 'Sedan';$s_marka = 'BMW';$s_model = 'Seria 3';$s_generacja = 'F30';$dp_paliwo = 'Diesel';$dp_przebieg = rand(15000,200000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '218'; $dp_moc_kw = '160'; $dp_masa_wlasna = '1585';$car_ds = '2012-01-01'; $car_de = '2019-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 12) {
							$s_typ = 'Sedan';$s_marka = 'BMW';$s_model = 'Seria 3';$s_generacja = 'F30';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(15000,200000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '245'; $dp_moc_kw = '180'; $dp_masa_wlasna = '1585';$car_ds = '2012-01-01'; $car_de = '2019-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 13) {
							$s_typ = 'Sedan';$s_marka = 'BMW';$s_model = 'Seria 3';$s_generacja = 'F30';$dp_paliwo = 'Hybrydowy';$dp_przebieg = rand(15000,200000);  $dp_pojemnosc = '3.0'; $dp_moc_km = '340'; $dp_moc_kw = '250'; $dp_masa_wlasna = '1585';$car_ds = '2012-01-01'; $car_de = '2019-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 14) {
							$s_typ = 'Sedan';$s_marka = 'Opel';$s_model = 'Insignia';$s_generacja = 'A';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(35000,280000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '170'; $dp_moc_kw = '125'; $dp_masa_wlasna = '1525';$car_ds = '2008-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 15) {
							$s_typ = 'Hatchback';$s_marka = 'Opel';$s_model = 'Insignia';$s_generacja = 'A';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(35000,280000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '250'; $dp_moc_kw = '184'; $dp_masa_wlasna = '1525';$car_ds = '2008-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 16) {
							$s_typ = 'Kombi';$s_marka = 'Opel';$s_model = 'Insignia';$s_generacja = 'A';$dp_paliwo = 'Diesel';$dp_przebieg = rand(35000,280000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '170'; $dp_moc_kw = '125'; $dp_masa_wlasna = '1525';$car_ds = '2008-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 17) {
							$s_typ = 'Hatchback';$s_marka = 'Opel';$s_model = 'Astra';$s_generacja = 'H';$dp_paliwo = 'Diesel';$dp_przebieg = rand(125000,380000);  $dp_pojemnosc = '1.7'; $dp_moc_km = '125'; $dp_moc_kw = '92'; $dp_masa_wlasna = '1300';$car_ds = '2004-01-01'; $car_de = '2015-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 18) {
							$s_typ = 'Hatchback';$s_marka = 'Opel';$s_model = 'Astra';$s_generacja = 'H';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(125000,380000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '200'; $dp_moc_kw = '147'; $dp_masa_wlasna = '1300';$car_ds = '2004-01-01'; $car_de = '2015-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 19) {
							$s_typ = 'Miejski';$s_marka = 'Opel';$s_model = 'Corsa';$s_generacja = 'E';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(5000,1500000);  $dp_pojemnosc = '1.0'; $dp_moc_km = '90'; $dp_moc_kw = '66'; $dp_masa_wlasna = '1162';$car_ds = '2014-01-01'; $car_de = '2020-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 20) {
							$s_typ = 'Miejski';$s_marka = 'Opel';$s_model = 'Corsa';$s_generacja = 'E';$dp_paliwo = 'Diesel';$dp_przebieg = rand(5000,1500000);  $dp_pojemnosc = '1.3'; $dp_moc_km = '95'; $dp_moc_kw = '70'; $dp_masa_wlasna = '1162';$car_ds = '2014-01-01'; $car_de = '2020-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 21) {
							$s_typ = 'Hatchback';$s_marka = 'Peugeot';$s_model = '206';$s_generacja = '-';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(100000,300000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '109'; $dp_moc_kw = '80'; $dp_masa_wlasna = '1025';$car_ds = '1998-01-01'; $car_de = '2011-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 22) {
							$s_typ = 'Kombi';$s_marka = 'Peugeot';$s_model = '206 SW';$s_generacja = '-';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(100000,300000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '109'; $dp_moc_kw = '80'; $dp_masa_wlasna = '1025';$car_ds = '1998-01-01'; $car_de = '2011-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 23) {
							$s_typ = 'Hatchback';$s_marka = 'Peugeot';$s_model = '206';$s_generacja = '-';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(100000,300000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '109'; $dp_moc_kw = '80'; $dp_masa_wlasna = '1025';$car_ds = '1998-01-01'; $car_de = '2011-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 24) {
							$s_typ = 'Sedan';$s_marka = 'Peugeot';$s_model = '508';$s_generacja = 'II';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(100,50000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '225'; $dp_moc_kw = '165'; $dp_masa_wlasna = '1420';$car_ds = '2018-01-01'; $car_de = '2022-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 25) {
							$s_typ = 'Kombi';$s_marka = 'Peugeot';$s_model = '508SW';$s_generacja = 'II';$dp_paliwo = 'Diesel';$dp_przebieg = rand(100,50000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '180'; $dp_moc_kw = '132'; $dp_masa_wlasna = '1420';$car_ds = '2018-01-01'; $car_de = '2022-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 26) {
							$s_typ = 'Hatchback';$s_marka = 'Citroen';$s_model = 'C4';$s_generacja = 'II';$dp_paliwo = 'Diesel';$dp_przebieg = rand(40000,250000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '150'; $dp_moc_kw = '110'; $dp_masa_wlasna = '1200';$car_ds = '2010-01-01'; $car_de = '2016-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 27) {
							$s_typ = 'Hatchback';$s_marka = 'Citroen';$s_model = 'C4';$s_generacja = 'II';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(40000,250000);  $dp_pojemnosc = '1.4'; $dp_moc_km = '95'; $dp_moc_kw = '70'; $dp_masa_wlasna = '1200';$car_ds = '2010-01-01'; $car_de = '2016-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 28) {
							$s_typ = 'Hatchback';$s_marka = 'Volkswagen';$s_model = 'Golf';$s_generacja = 'V';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(90000,350000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '150'; $dp_moc_kw = '110'; $dp_masa_wlasna = '1425';$car_ds = '2003-01-01'; $car_de = '2009-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 29) {
							$s_typ = 'Hatchback';$s_marka = 'Volkswagen';$s_model = 'Golf';$s_generacja = 'V';$dp_paliwo = 'Diesel';$dp_przebieg = rand(100000,450000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '170'; $dp_moc_kw = '125'; $dp_masa_wlasna = '1425';$car_ds = '2003-01-01'; $car_de = '2009-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 30) {
							$s_typ = 'Miejski';$s_marka = 'Volkswagen';$s_model = 'Polo';$s_generacja = 'V';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(60000,200000);  $dp_pojemnosc = '1.2'; $dp_moc_km = '60'; $dp_moc_kw = '44'; $dp_masa_wlasna = '925';$car_ds = '1999-01-01'; $car_de = '2010-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 31) {
							$s_typ = 'Miejski';$s_marka = 'Volkswagen';$s_model = 'Polo';$s_generacja = 'V';$dp_paliwo = 'Diesel';$dp_przebieg = rand(60000,200000);  $dp_pojemnosc = '1.4'; $dp_moc_km = '70'; $dp_moc_kw = '51'; $dp_masa_wlasna = '925';$car_ds = '1999-01-01'; $car_de = '2010-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 32) {
							$s_typ = 'Sedan';$s_marka = 'Volkswagen';$s_model = 'Passat';$s_generacja = 'B6';$dp_paliwo = 'Diesel';$dp_przebieg = rand(160000,450000);  $dp_pojemnosc = '1.9'; $dp_moc_km = '105'; $dp_moc_kw = '77'; $dp_masa_wlasna = '1430';$car_ds = '2005-01-01'; $car_de = '2011-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 33) {
							$s_typ = 'Kombi';$s_marka = 'Mazda';$s_model = '6';$s_generacja = 'II';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(80000,350000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '155'; $dp_moc_kw = '114'; $dp_masa_wlasna = '1435';$car_ds = '2007-01-01'; $car_de = '2013-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 34) {
							$s_typ = 'Sedan';$s_marka = 'Mazda';$s_model = '6';$s_generacja = 'II';$dp_paliwo = 'Diesel';$dp_przebieg = rand(80000,350000);  $dp_pojemnosc = '2.2'; $dp_moc_km = '163'; $dp_moc_kw = '120'; $dp_masa_wlasna = '1435';$car_ds = '2007-01-01'; $car_de = '2013-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 34) {
							$s_typ = 'Hatchback';$s_marka = 'Mazda';$s_model = '3';$s_generacja = 'III';$dp_paliwo = 'Diesel';$dp_przebieg = rand(4000,200000);  $dp_pojemnosc = '1.5'; $dp_moc_km = '105'; $dp_moc_kw = '77'; $dp_masa_wlasna = '1280';$car_ds = '2013-01-01'; $car_de = '2017-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 35) {
							$s_typ = 'Hatchback';$s_marka = 'Mazda';$s_model = '3';$s_generacja = 'III';$dp_paliwo = 'Diesel';$dp_przebieg = rand(4000,200000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '165'; $dp_moc_kw = '138'; $dp_masa_wlasna = '1280';$car_ds = '2013-01-01'; $car_de = '2017-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 36) {
							$s_typ = 'Hatchback';$s_marka = 'Fiat';$s_model = 'Bravo';$s_generacja = 'II';$dp_paliwo = 'Diesel';$dp_przebieg = rand(60000,250000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '120'; $dp_moc_kw = '88'; $dp_masa_wlasna = '1320';$car_ds = '2006-01-01'; $car_de = '2016-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 37) {
							$s_typ = 'Hatchback';$s_marka = 'Fiat';$s_model = 'Bravo';$s_generacja = 'II';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(60000,250000);  $dp_pojemnosc = '1.4'; $dp_moc_km = '150'; $dp_moc_kw = '110'; $dp_masa_wlasna = '1320';$car_ds = '2006-01-01'; $car_de = '2016-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 38) {
							$s_typ = 'Hatchback';$s_marka = 'Renualt';$s_model = 'Megane';$s_generacja = 'III';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(70000,280000);  $dp_pojemnosc = '1.6'; $dp_moc_km = '110'; $dp_moc_kw = '81'; $dp_masa_wlasna = '1215';$car_ds = '2008-01-01'; $car_de = '2017-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 39) {
							$s_typ = 'Kombi';$s_marka = 'Renualt';$s_model = 'Megane';$s_generacja = 'III';$dp_paliwo = 'Diesel';$dp_przebieg = rand(70000,280000);  $dp_pojemnosc = '1.9'; $dp_moc_km = '130'; $dp_moc_kw = '96'; $dp_masa_wlasna = '1215';$car_ds = '2008-01-01'; $car_de = '2017-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 40) {
							$s_typ = 'Kombi';$s_marka = 'Alfa Romeo';$s_model = '159';$s_generacja = '-';$dp_paliwo = 'Diesel';$dp_przebieg = rand(120000,320000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '170'; $dp_moc_kw = '125'; $dp_masa_wlasna = '1540';$car_ds = '2005-01-01'; $car_de = '2012-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 41) {
							$s_typ = 'Sedan';$s_marka = 'Alfa Romeo';$s_model = '159';$s_generacja = '-';$dp_paliwo = 'Diesel';$dp_przebieg = rand(120000,320000);  $dp_pojemnosc = '2.4'; $dp_moc_km = '200'; $dp_moc_kw = '147'; $dp_masa_wlasna = '1540';$car_ds = '2005-01-01'; $car_de = '2012-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 42) {
							$s_typ = 'Miejski';$s_marka = 'Toyota';$s_model = 'Yaris';$s_generacja = 'II';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(70000,170000);  $dp_pojemnosc = '1.3'; $dp_moc_km = '86'; $dp_moc_kw = '63'; $dp_masa_wlasna = '1010';$car_ds = '2005-01-01'; $car_de = '2012-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 43) {
							$s_typ = 'Miejski';$s_marka = 'Toyota';$s_model = 'Yaris';$s_generacja = 'II';$dp_paliwo = 'Diesel';$dp_przebieg = rand(70000,170000);  $dp_pojemnosc = '1.4'; $dp_moc_km = '90'; $dp_moc_kw = '66'; $dp_masa_wlasna = '1010';$car_ds = '2005-01-01'; $car_de = '2012-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 44) {
							$s_typ = 'SUV';$s_marka = 'Toyota';$s_model = 'RAV4';$s_generacja = 'IV';$dp_paliwo = 'Diesel';$dp_przebieg = rand(20000,140000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '143'; $dp_moc_kw = '105'; $dp_masa_wlasna = '1550';$car_ds = '2013-01-01'; $car_de = '2019-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 45) {
							$s_typ = 'SUV';$s_marka = 'Toyota';$s_model = 'RAV4';$s_generacja = 'IV';$dp_paliwo = 'Hybrydowy';$dp_przebieg = rand(20000,140000);  $dp_pojemnosc = '2.5'; $dp_moc_km = '197'; $dp_moc_kw = '145'; $dp_masa_wlasna = '1550';$car_ds = '2013-01-01'; $car_de = '2019-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 46) {
							$s_typ = 'SUV';$s_marka = 'Toyota';$s_model = 'RAV4';$s_generacja = 'IV';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(20000,140000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '152'; $dp_moc_kw = '112'; $dp_masa_wlasna = '1550';$car_ds = '2013-01-01'; $car_de = '2019-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 47) {
							$s_typ = 'Sedan';$s_marka = 'Mercedes';$s_model = 'Klasa E';$s_generacja = 'W212';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(70000,300000);  $dp_pojemnosc = '5.0'; $dp_moc_km = '408'; $dp_moc_kw = '300'; $dp_masa_wlasna = '1785';$car_ds = '2009-01-01'; $car_de = '2017-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 48) {
							$s_typ = 'Sedan';$s_marka = 'Mercedes';$s_model = 'Klasa E';$s_generacja = 'W212';$dp_paliwo = 'Hybrydowy';$dp_przebieg = rand(70000,300000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '231'; $dp_moc_kw = '170'; $dp_masa_wlasna = '1785';$car_ds = '2009-01-01'; $car_de = '2017-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 49) {
							$s_typ = 'Hatchback';$s_marka = 'Mercedes';$s_model = 'Klasa A';$s_generacja = 'W176';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(50000,200000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '360'; $dp_moc_kw = '265'; $dp_masa_wlasna = '1555';$car_ds = '2012-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 50) {
							$s_typ = 'Hatchback';$s_marka = 'Mercedes';$s_model = 'Klasa A';$s_generacja = 'W176';$dp_paliwo = 'Diesel';$dp_przebieg = rand(50000,200000);  $dp_pojemnosc = '1.8'; $dp_moc_km = '136'; $dp_moc_kw = '100'; $dp_masa_wlasna = '1555';$car_ds = '2012-01-01'; $car_de = '2018-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 51) {
							$s_typ = 'Sedan';$s_marka = 'Saab';$s_model = '9-3';$s_generacja = 'II';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(100000,400000);  $dp_pojemnosc = '2.0'; $dp_moc_km = '175'; $dp_moc_kw = '129'; $dp_masa_wlasna = '1490';$car_ds = '2002-01-01'; $car_de = '2013-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 52) {
							$s_typ = 'Hatchback';$s_marka = 'Nissan';$s_model = '370Z';$s_generacja = '-';$dp_paliwo = 'Benzyna';$dp_przebieg = rand(160000,250000);  $dp_pojemnosc = '3.7'; $dp_moc_km = '344'; $dp_moc_kw = '253'; $dp_masa_wlasna = '1535';$car_ds = '2009-01-01'; $car_de = '2020-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 53) {
							$s_typ = 'Hatchback';$s_marka = 'Tesla';$s_model = 'Model S';$s_generacja = '-';$dp_paliwo = 'Elektryczny';$dp_przebieg = rand(40000,160000);  $dp_pojemnosc = '85kWh'; $dp_moc_km = '422'; $dp_moc_kw = '310'; $dp_masa_wlasna = '2108';$car_ds = '2014-01-01'; $car_de = '2021-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						} if($car_rand == 54) {
							$s_typ = 'Hatchback';$s_marka = 'Tesla';$s_model = 'Model S';$s_generacja = '-';$dp_paliwo = 'Elektryczny';$dp_przebieg = rand(40000,160000);  $dp_pojemnosc = '60kWh'; $dp_moc_km = '306'; $dp_moc_kw = '225'; $dp_masa_wlasna = '2108';$car_ds = '2014-01-01'; $car_de = '2021-01-01'; $pp_data_produkcji = date("Y-m-d",rand(date_timestamp_get(date_create($car_ds)), date_timestamp_get(date_create($car_de)))); $pp_data_pierwszej_rejestracji = date('y-m-d', strtotime( $pp_data_produkcji .' +7 day')); $pp_data_rejestracji_w_kraju = date("Y-m-d",rand(date_timestamp_get(date_create($pp_data_pierwszej_rejestracji)), date_timestamp_get(date_create($data_now)))); 				
						}


						$k_lpg_rand = rand(1,40); if($k_lpg_rand > 0 && $k_lpg_rand < 10 && $dp_paliwo == 'Benzyna')  { $k_lpg = 'TAK'; } else { $k_lpg = 'NIE'; };
						$k_hak_rand = rand(1,40); if($k_hak_rand > 0 && $k_hak_rand < 10)  { $k_hak = 'TAK'; } else { $k_hak = 'NIE'; };

						$insert_query = $conn->query("INSERT INTO adresy (ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica[$ad_ulica_rand]','$ad_nr_domu','$ad_kod_pocztowy')");
							$ad_id_query = mysqli_fetch_array($conn->query("SELECT MAX(ad_id) FROM adresy"),MYSQLI_NUM);
							$ad_id = $ad_id_query[0];
							if(!$ad_id) { $ad_id = 1; }
						$insert_query = $conn->query("INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES ( '$if_imie[$if_imie_rand]', '$if_nazwisko[$if_nazwisko_rand]', '$if_plec', STR_TO_DATE('$if_data_urodzenia','%Y-%m-%d'), '$if_pesel', '$if_telefon', '$ad_id')");
						$insert_query = $conn->query("INSERT INTO stany_pojazdow ( sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES ( '$sp_silnik', '$sp_hamulce', '$sp_amortyzatory', '$sp_zawieszenie', '$sp_zarowki', '$sp_lampy')");
						$insert_query = $conn->query("INSERT INTO dane_pojazdow ( dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES ('$dp_paliwo','$dp_przebieg','$dp_pojemnosc','$dp_moc_km','$dp_moc_kw','$dp_masa_wlasna','$dp_skrzynia_biegow')");
						$insert_query = $conn->query("INSERT INTO produkcja_pojazdow ( pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES ( '$pp_kraj_produkcji[$pp_kraj_produkcji_rand]', STR_TO_DATE('$pp_data_produkcji','%Y-%m-%d'), STR_TO_DATE('$pp_data_pierwszej_rejestracji','%Y-%m-%d'),STR_TO_DATE('$pp_data_rejestracji_w_kraju','%Y-%m-%d'),'$pp_ilosc_wlascicieli')");
							$if_id_query =mysqli_fetch_array($conn->query("SELECT MAX(if_id) FROM informacje_osobowe"),MYSQLI_NUM);
							$if_id = $if_id_query[0];
							if(!$if_id) { $if_id = 1; }
						$insert_query = $conn->query("INSERT INTO wlasciciele ( w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES ( STR_TO_DATE('$w_data_prawa_jazdy','%Y-%m-%d'), STR_TO_DATE('$w_waznosc_prawa_jazdy','%Y-%m-%d'),'$w_ilosc_samochodow','$w_procent_znizek_oc','$if_id')");
							$w_id_query = mysqli_fetch_array($conn->query("SELECT MAX(w_id) FROM wlasciciele"),MYSQLI_NUM);
							$w_id = $w_id_query[0];
							if(!$w_id) { $w_id = 1; }
							$pp_id_query = mysqli_fetch_array($conn->query("SELECT MAX(pp_id) FROM produkcja_pojazdow"),MYSQLI_NUM);
							$pp_id = $pp_id_query[0];
							if(!$pp_id) { $pp_id = 1; }
							$sp_id_query = mysqli_fetch_array($conn->query("SELECT MAX(sp_id) FROM stany_pojazdow"),MYSQLI_NUM);
							$sp_id = $sp_id_query[0];
							if(!$sp_id) { $sp_id = 1; }
							$dp_id_query = mysqli_fetch_array($conn->query("SELECT MAX(dp_id) FROM dane_pojazdow"),MYSQLI_NUM);
							$dp_id = $dp_id_query[0];
							if(!$dp_id) { $dp_id = 1; }
						$insert_query = $conn->query("INSERT INTO samochody ( s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id , pp_id, dp_id, sp_id ) VALUES ( '$s_typ', '$s_numer_rejestracyjny', '$s_marka', '$s_model', '$s_generacja', '$w_id', '$pp_id', '$dp_id', '$sp_id')");
							$s_id_query = mysqli_fetch_array($conn->query("SELECT MAX(s_id) FROM samochody"),MYSQLI_NUM);
							$s_id = $s_id_query[0];
							if(!$s_id) { $s_id = 1; }
							
							if($k_lpg == 'TAK' && $k_hak == 'TAK') { $k_cena = '170'; }
							elseif($k_lpg == 'TAK' && $k_hak == 'NIE') { $k_cena = '150'; }
							elseif($k_lpg == 'NIE' && $k_hak == 'TAK') { $k_cena = '120'; }
							else { $k_cena = '100'; }
						
							if($sp_silnik == 'SPRAWNE' && $sp_hamulce == 'SPRAWNE' && $sp_amortyzatory == 'SPRAWNE' && $sp_zawieszenie == 'SPRAWNE' && $sp_zarowki == 'SPRAWNE' && $sp_lampy == 'SPRAWNE') {
								$insert_query = $conn->query("INSERT INTO kontrole ( k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES ('TAK','$k_lpg','$k_hak', STR_TO_DATE('$k_data_kontroli','%Y-%m-%d'), DATE_ADD(STR_TO_DATE('$k_data_kontroli','%Y-%m-%d'), INTERVAL 365 DAY),'$k_cena','$p_id','$s_id')");
							} else {
								$insert_query = $conn->query("INSERT INTO kontrole ( k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES ('NIE','$k_lpg','$k_hak', STR_TO_DATE('$k_data_kontroli','%Y-%m-%d'), DATE_ADD(STR_TO_DATE('$k_data_kontroli','%Y-%m-%d'), INTERVAL 7 DAY),'$k_cena','$p_id','$s_id')");
							}
						
					}
					if($insert_query > 0) {
						echo '<div class="text">Kontrola zostanie dodana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, kontrola nie zostanie dodana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				} else { 
					echo '<div class="text">Nie uzupełniłeś wszystkich pozycji!</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
				}
			echo '</div>';
			
		} else if($view_name == 'zmiana') {
		echo '<div class="belka">DODAJ ZMIANĘ PRACOWNICZĄ</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
				if(!empty($_POST['zp_rekordy'])) {
					$zp = 0;
					$lp_query = mysqli_fetch_array($conn->query("SELECT MAX(p_id) FROM pracownicy"),MYSQLI_NUM);
						$lp = $lp_query[0];
						if(!$lp) { $lp = 0; }
					for($j=0; $j<=$lp;$j++) {
						for($i=0; $i<$_POST['zp_rekordy'];$i++) {
							$zp_data = $i;
							$p_id = $j;
							$zp_godzina_rand = rand(0,1);
							if($zp_godzina_rand == '0') {
								$zp_godzina_rozpoczecia = 8;
								$zp_godzina_zakonczenia = 16;
							}
							if($zp_godzina_rand == '1') {
								$zp_godzina_rozpoczecia = 12;
								$zp_godzina_zakonczenia = 20;
							}
							$pg_query = mysqli_fetch_array($conn->query("SELECT p_przepracowane_godziny FROM pracownicy WHERE p_id = '$p_id'"),MYSQLI_NUM);
							$pgwd = $zp_godzina_zakonczenia-$zp_godzina_rozpoczecia;
							$zp_liczba_kontroli = $pgwd + $pg_query[0];
							if(mysqli_num_rows($conn->query("SELECT * FROM pracownicy WHERE p_id = '$p_id'"))) {
								if(!mysqli_num_rows($conn->query("SELECT * FROM zmiany_pracownicze WHERE p_id = '$p_id' AND zp_data = STR_TO_DATE(DATE_SUB(NOW(), INTERVAL '$zp_data' DAY),'%Y-%m-%d')"))) {
									$zp_liczba_kontroli = rand(20,70);
									$zp_przerwa = 'TAK';
									$update_query = $conn->query("UPDATE pracownicy SET p_przepracowane_godziny = '$zp_liczba_kontroli' WHERE p_id = '$p_id'");
									$insert_query = $conn->query("INSERT INTO zmiany_pracownicze ( zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES ( DATE_SUB(NOW(), INTERVAL '$zp_data' DAY),'$zp_godzina_rozpoczecia','$zp_godzina_zakonczenia','$zp_liczba_kontroli','$zp_przerwa','$p_id')");
									$zp = 1;
								}
							}
							
						}
						
					}
					if($zp == 1) {
						if($insert_query > 0 && $update_query > 0) {
							echo '<div class="text">Zmiana zostanie dodana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
						} else {
							echo '<div class="text">Wystąpił błąd lub niektóre zmiany się powtórzyły, poprawne zostały dodane.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
						}
					} else {
						echo '<div class="text">Wszystkie zmiany zostały powtórzone.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
					
				} else {
					echo '<div class="text">Wystąpił błąd, nie uzupełniłeś.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
				}
			echo '</div>';
		} else {
			echo '<div class="belka">DODAJ REKORDY</div>';
			echo '<div style="margin:24px;">';
				echo '<div style="text-align: center; "><div class="text">Wybierz co chcesz dodać do bazy danych.</div><br><br><a href="add.php?view=placowka" class="belka2">PLACÓWKA</a>    
				<a href="add.php?view=pracownik" class="belka2">PRACOWNIK</a>    <a href="add.php?view=kontrola" class="belka2">KONTROLA</a></div>';
			echo '</div>';
		}
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