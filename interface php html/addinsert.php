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
				if(!empty($_POST['ad_kraj']) && !empty($_POST['ad_wojewodztwo']) && !empty($_POST['ad_miasto']) && !empty($_POST['ad_ulica']) 
				&& !empty($_POST['ad_nr_domu']) && !empty($_POST['ad_kod_pocztowy']) && !empty($_POST['pl_telefon'])
				&& !empty($_POST['pl_fax']) && !empty($_POST['pl_godzina_otwarcia']) && !empty($_POST['pl_godzina_zamkniecia'])) {
					$ad_kraj = $conn->real_escape_string($_POST['ad_kraj']);
					$ad_wojewodztwo = $conn->real_escape_string($_POST['ad_wojewodztwo']);
					$ad_miasto = $conn->real_escape_string($_POST['ad_miasto']);
					$ad_ulica = $conn->real_escape_string($_POST['ad_ulica']);
					$ad_nr_domu = $conn->real_escape_string($_POST['ad_nr_domu']);
					$ad_kod_pocztowy = $conn->real_escape_string($_POST['ad_kod_pocztowy']);
					$pl_telefon = $conn->real_escape_string($_POST['pl_telefon']);
					$pl_fax = $conn->real_escape_string($_POST['pl_fax']);
					$pl_godzina_otwarcia = $conn->real_escape_string($_POST['pl_godzina_otwarcia']);
					$pl_godzina_zamkniecia = $conn->real_escape_string($_POST['pl_godzina_zamkniecia']);
					
					$insert_query = $conn->query("INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica', '$ad_nr_domu', '$ad_kod_pocztowy' )");
						$ad_id_query = mysqli_fetch_array($conn->query("SELECT MAX(ad_id) FROM adresy"),MYSQLI_NUM);
						$ad_id = $ad_id_query[0];
						if(!$ad_id) {
							$ad_id = 1;
						}
					$insert_query = $conn->query("INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id ) VALUES ( '$pl_telefon', '$pl_fax', '$pl_godzina_otwarcia', '$pl_godzina_zamkniecia', '$ad_id' )");
					
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
					$ad_kraj = $conn->real_escape_string($_POST['ad_kraj']);
					$ad_wojewodztwo = $conn->real_escape_string($_POST['ad_wojewodztwo']);
					$ad_miasto = $conn->real_escape_string($_POST['ad_miasto']);
					$ad_ulica = $conn->real_escape_string($_POST['ad_ulica']);
					$ad_nr_domu = $conn->real_escape_string($_POST['ad_nr_domu']);
					$ad_kod_pocztowy = $conn->real_escape_string($_POST['ad_kod_pocztowy']);
					$if_imie = $conn->real_escape_string($_POST['if_imie']);
					$if_nazwisko = $conn->real_escape_string($_POST['if_nazwisko']);
					$if_plec = $conn->real_escape_string($_POST['if_plec']);
					$if_data_urodzenia = $conn->real_escape_string($_POST['if_data_urodzenia']);	
					$if_pesel = $conn->real_escape_string($_POST['if_pesel']);
					$if_telefon = $conn->real_escape_string($_POST['if_telefon']);	
					$st_nazwa = $conn->real_escape_string($_POST['st_nazwa']);
					$st_data_uzyskania = $conn->real_escape_string($_POST['st_data_uzyskania']);	
					$pl_id = $conn->real_escape_string($_POST['pl_id']);
					
				
					$insert_query = $conn->query("INSERT INTO adresy (ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica','$ad_nr_domu','$ad_kod_pocztowy')");
						$ad_id_query = mysqli_fetch_array($conn->query("SELECT MAX(ad_id) FROM adresy"),MYSQLI_NUM);
						$ad_id = $ad_id_query[0];
						if(!$ad_id) {
							$ad_id = 1;
						}
					$insert_query = $conn->query("INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES ( '$if_imie', '$if_nazwisko', '$if_plec', STR_TO_DATE('$if_data_urodzenia','%Y-%m-%d'), '$if_pesel', '$if_telefon', '$ad_id')");
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
						$if_id_query = mysqli_fetch_array($conn->query("SELECT MAX(if_id) FROM informacje_osobowe"),MYSQLI_NUM);
						$if_id = $if_id_query[0];
						if(!$if_id) {
							$if_id = 1;
						}
					$insert_query = $conn->query("INSERT INTO pracownicy ( p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id ) VALUES ( '0' , '$p_stawka', '$pl_id', '$if_id', '$st_id' )");
					
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
				if(!empty($_POST['ad_kraj']) && !empty($_POST['ad_wojewodztwo']) && !empty($_POST['ad_miasto']) && !empty($_POST['ad_ulica']) && !empty($_POST['ad_nr_domu']) && !empty($_POST['ad_kod_pocztowy']) 
				&& !empty($_POST['if_telefon']) && !empty($_POST['if_pesel']) && !empty($_POST['if_data_urodzenia']) && !empty($_POST['if_plec']) && !empty($_POST['if_nazwisko']) && !empty($_POST['if_imie']) 
				&& !empty($_POST['sp_silnik']) && !empty($_POST['sp_hamulce']) && !empty($_POST['sp_amortyzatory']) && !empty($_POST['sp_zawieszenie']) && !empty($_POST['sp_zarowki']) && !empty($_POST['sp_lampy'])
				&& !empty($_POST['dp_paliwo']) && !empty($_POST['dp_przebieg']) && !empty($_POST['dp_pojemnosc']) && !empty($_POST['dp_moc_km']) && !empty($_POST['dp_moc_kw']) && !empty($_POST['dp_masa_wlasna']) && !empty($_POST['dp_skrzynia_biegow'])
				&& !empty($_POST['pp_kraj_produkcji']) && !empty($_POST['pp_data_produkcji']) && !empty($_POST['pp_data_pierwszej_rejestracji']) && !empty($_POST['pp_data_rejestracji_w_kraju']) && !empty($_POST['pp_ilosc_wlascicieli']) 
				&& !empty($_POST['w_data_prawa_jazdy']) && !empty($_POST['w_waznosc_prawa_jazdy']) && !empty($_POST['w_ilosc_samochodow']) && !empty($_POST['w_procent_znizek_oc']) 
				&& !empty($_POST['s_typ']) && !empty($_POST['s_numer_rejestracyjny']) && !empty($_POST['s_marka']) && !empty($_POST['s_model']) && !empty($_POST['s_generacja']) 
				&& !empty($_POST['k_lpg']) && !empty($_POST['k_hak']) && !empty($_POST['k_data_kontroli']) && !empty($_POST['p_id']) 
				) {
					$ad_kraj = $conn->real_escape_string($_POST['ad_kraj']);
					$ad_wojewodztwo = $conn->real_escape_string($_POST['ad_wojewodztwo']);
					$ad_miasto = $conn->real_escape_string($_POST['ad_miasto']);
					$ad_ulica = $conn->real_escape_string($_POST['ad_ulica']);
					$ad_nr_domu = $conn->real_escape_string($_POST['ad_nr_domu']);
					$ad_kod_pocztowy = $conn->real_escape_string($_POST['ad_kod_pocztowy']);
					$if_imie = $conn->real_escape_string($_POST['if_imie']);
					$if_nazwisko = $conn->real_escape_string($_POST['if_nazwisko']);
					$if_plec = $conn->real_escape_string($_POST['if_plec']);
					$if_data_urodzenia = $conn->real_escape_string($_POST['if_data_urodzenia']);	
					$if_pesel = $conn->real_escape_string($_POST['if_pesel']);
					$if_telefon = $conn->real_escape_string($_POST['if_telefon']);	
					$sp_silnik = $conn->real_escape_string($_POST['sp_silnik']);
					$sp_hamulce = $conn->real_escape_string($_POST['sp_hamulce']);
					$sp_amortyzatory = $conn->real_escape_string($_POST['sp_amortyzatory']);
					$sp_zawieszenie = $conn->real_escape_string($_POST['sp_zawieszenie']);	
					$sp_zarowki = $conn->real_escape_string($_POST['sp_zarowki']);
					$sp_lampy = $conn->real_escape_string($_POST['sp_lampy']);	
					$dp_paliwo = $conn->real_escape_string($_POST['dp_paliwo']);
					$dp_przebieg = $conn->real_escape_string($_POST['dp_przebieg']);
					$dp_pojemnosc = $conn->real_escape_string($_POST['dp_pojemnosc']);
					$dp_moc_km = $conn->real_escape_string($_POST['dp_moc_km']);	
					$dp_moc_kw = $conn->real_escape_string($_POST['dp_moc_kw']);
					$dp_masa_wlasna = $conn->real_escape_string($_POST['dp_masa_wlasna']);	
					$dp_skrzynia_biegow = $conn->real_escape_string($_POST['dp_skrzynia_biegow']);
					$pp_kraj_produkcji = $conn->real_escape_string($_POST['pp_kraj_produkcji']);
					$pp_data_produkcji = $conn->real_escape_string($_POST['pp_data_produkcji']);
					$pp_data_pierwszej_rejestracji = $conn->real_escape_string($_POST['pp_data_pierwszej_rejestracji']);
					$pp_data_rejestracji_w_kraju = $conn->real_escape_string($_POST['pp_data_rejestracji_w_kraju']);	
					$pp_ilosc_wlascicieli = $conn->real_escape_string($_POST['pp_ilosc_wlascicieli']);
					$w_data_prawa_jazdy = $conn->real_escape_string($_POST['w_data_prawa_jazdy']);
					$w_waznosc_prawa_jazdy = $conn->real_escape_string($_POST['w_waznosc_prawa_jazdy']);
					$w_ilosc_samochodow = $conn->real_escape_string($_POST['w_ilosc_samochodow']);
					$w_procent_znizek_oc = $conn->real_escape_string($_POST['w_procent_znizek_oc']);	
					$s_typ = $conn->real_escape_string($_POST['s_typ']);
					$s_numer_rejestracyjny = $conn->real_escape_string($_POST['s_numer_rejestracyjny']);
					$s_marka = $conn->real_escape_string($_POST['s_marka']);
					$s_model = $conn->real_escape_string($_POST['s_model']);	
					$s_generacja = $conn->real_escape_string($_POST['s_generacja']);	
					$k_lpg = $conn->real_escape_string($_POST['k_lpg']);
					$k_hak = $conn->real_escape_string($_POST['k_hak']);
					$k_data_kontroli = $conn->real_escape_string($_POST['k_data_kontroli']);
					$p_id = $conn->real_escape_string($_POST['p_id']);	
					
				
					$insert_query = $conn->query("INSERT INTO adresy (ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( '$ad_kraj', '$ad_wojewodztwo', '$ad_miasto', '$ad_ulica','$ad_nr_domu','$ad_kod_pocztowy')");
						$ad_id_query = mysqli_fetch_array($conn->query("SELECT MAX(ad_id) FROM adresy"),MYSQLI_NUM);
						$ad_id = $ad_id_query[0];
						if(!$ad_id) { $ad_id = 1; }
					$insert_query = $conn->query("INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES ( '$if_imie', '$if_nazwisko', '$if_plec', STR_TO_DATE('$if_data_urodzenia','%Y-%m-%d'), '$if_pesel', '$if_telefon', '$ad_id')");
					$insert_query = $conn->query("INSERT INTO stany_pojazdow ( sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES ( '$sp_silnik', '$sp_hamulce', '$sp_amortyzatory', '$sp_zawieszenie', '$sp_zarowki', '$sp_lampy')");
					$insert_query = $conn->query("INSERT INTO dane_pojazdow ( dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES ('$dp_paliwo','$dp_przebieg','$dp_pojemnosc','$dp_moc_km','$dp_moc_kw','$dp_masa_wlasna','$dp_skrzynia_biegow')");
					$insert_query = $conn->query("INSERT INTO produkcja_pojazdow ( pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES ( '$pp_kraj_produkcji', STR_TO_DATE('$pp_data_produkcji','%Y-%m-%d'), STR_TO_DATE('$pp_data_pierwszej_rejestracji','%Y-%m-%d'),STR_TO_DATE('$pp_data_rejestracji_w_kraju','%Y-%m-%d'),'$pp_ilosc_wlascicieli')");
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
				$zp_data = $conn->real_escape_string($_POST['zp_data']);
				$zp_godzina_rozpoczecia = $conn->real_escape_string($_POST['zp_godzina_rozpoczecia']);
				$zp_godzina_zakonczenia = $conn->real_escape_string($_POST['zp_godzina_zakonczenia']);
				$zp_liczba_kontroli = $conn->real_escape_string($_POST['zp_liczba_kontroli']);
				$zp_przerwa = $conn->real_escape_string($_POST['zp_przerwa']);	
				$p_id = $conn->real_escape_string($_POST['p_id']);
				
				$pg_query = mysqli_fetch_array($conn->query("SELECT p_przepracowane_godziny FROM pracownicy WHERE p_id = '$p_id'"),MYSQLI_NUM);
				$pgwd = $zp_godzina_zakonczenia-$zp_godzina_rozpoczecia;
				$zp_liczba_kontroli = $pgwd + $pg_query[0];
				
				$update_query = $conn->query("UPDATE pracownicy SET p_przepracowane_godziny = '$zp_liczba_kontroli' WHERE p_id = '$p_id'");
				
				$insert_query = $conn->query("INSERT INTO zmiany_pracownicze ( zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES ( STR_TO_DATE('$zp_data','%Y-%m-%d'),'$zp_godzina_rozpoczecia','$zp_godzina_zakonczenia','$zp_liczba_kontroli','$zp_przerwa','$p_id')");
				
				if($insert_query > 0 && $update_query > 0) {
					echo '<div class="text">Zmiana zostanie dodana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
				} else {
					echo '<div class="text">Wystąpił błąd, zmiana nie zostanie dodana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
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