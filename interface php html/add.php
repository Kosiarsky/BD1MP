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
			?>
				<form name="form_placowka" action="addinsert.php?view=placowka" method="post">
					<div class="add_text">WYBIERZ KRAJ</div>
						<input class="add_input" list="kraj" name="ad_kraj" placeholder="np. Polska" autocomplete="off">
						<datalist id="kraj">
							<option value="Polska">
						</datalist><br><br>
					<div class="add_text">WYBIERZ WOJEWÓDZTWO</div>
						<input class="add_input" list="woj" name="ad_wojewodztwo" placeholder="np. Świętokrzyskie" autocomplete="off">
						<datalist id="woj">
							<option value="Dolnośląskie">
							<option value="Kujawsko-pomorskie">
							<option value="Lubelskie">
							<option value="Lubuskie">
							<option value="Łódzkie">
							<option value="Małopolskie">
							<option value="Mazowieckie">
							<option value="Opolskie">
							<option value="Podkarpackie">
							<option value="Podlaskie">
							<option value="Pomorskie">
							<option value="Śląskie">
							<option value="Świętokrzyskie">
							<option value="Warmińsko-mazurskie">
							<option value="Wielkopolskie">
							<option value="Zachodniopomorskie">
						</datalist><br><br>
					<div class="add_text">WPISZ MIASTO</div>
						<input class="add_input" type="text" name="ad_miasto" placeholder="np. Kielce" autocomplete="off"><br><br>
					<div class="add_text">WPISZ ULICĘ</div>
						<input class="add_input" type="text" name="ad_ulica" placeholder="np. Sandomierska" autocomplete="off"><br><br>
					<div class="add_text">WPISZ NUMER DOMU</div>
						<input class="add_input" type="text" name="ad_nr_domu" placeholder="np. 350" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WPISZ KOD POCZTOWY</div>
						<input class="add_input" type="text" name="ad_kod_pocztowy" placeholder="np. 25-351" autocomplete="off"><br><br>
					<div class="add_text">WPISZ TELEFON</div>
						<input class="add_input" type="text" name="pl_telefon" placeholder="np. 123123123" maxlength="9" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WPISZ FAX</div>
						<input class="add_input" type="text" name="pl_fax" placeholder="np. 426362172314" maxlength="12" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ GODZINĘ OTWARCIA</div>
						<input class="add_input" list="godz_otw" name="pl_godzina_otwarcia" placeholder="np. 8:00" autocomplete="off">
						<datalist id="godz_otw">
							<option value="6">6:00</option>
							<option value="7">7:00</option>
							<option value="8">8:00</option>
							<option value="10">10:00</option>
							<option value="11">11:00</option>
						</datalist><br><br>
					<div class="add_text">WYBIERZ GODZINĘ ZAMKNIĘCIA</div>
						<input class="add_input" list="godz_zmk" name="pl_godzina_zamkniecia" placeholder="np. 20:00" autocomplete="off">
						<datalist id="godz_zmk">
							<option value="16">16:00</option>
							<option value="17">17:00</option>
							<option value="18">18:00</option>
							<option value="19">19:00</option>
							<option value="20">20:00</option>
							<option value="21">21:00</option>
						</datalist><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'pracownik') {
			echo '<div class="belka">DODAJ PRACOWNIKA</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
				?>
				<form name="form_pracownik" action="addinsert.php?view=pracownik" method="post">
					<div class="add_text">WPISZ IMIĘ</div>
						<input class="add_input" type="text" name="if_imie" placeholder="np. Jakub" autocomplete="off"><br><br>
					<div class="add_text">WPISZ NAZWISKO</div>
						<input class="add_input" type="text" name="if_nazwisko" placeholder="np. Kowalski" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ PŁEĆ</div>
						<input class="add_input" list="plec" name="if_plec" placeholder="np. Mezczyzna" autocomplete="off">
						<datalist id="plec">
							<option value="Mezczyzna">
							<option value="Kobieta">
						</datalist><br><br>
					<div class="add_text">WYBIERZ DATĘ URODZENIA</div>
						<input class="add_input" type="date" name="if_data_urodzenia" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
					<div class="add_text">WPISZ PESEL</div>
						<input class="add_input" type="text" name="if_pesel" placeholder="np. 42636217231" maxlength="11" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WPISZ TELEFON</div>
						<input class="add_input" type="text" name="if_telefon" placeholder="np. 123123123" maxlength="9" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ KRAJ</div>
						<input class="add_input" list="kraj" name="ad_kraj" placeholder="np. Polska" autocomplete="off">
						<datalist id="kraj">
							<option value="Polska">
						</datalist><br><br>
					<div class="add_text">WYBIERZ WOJEWÓDZTWO</div>
						<input class="add_input" list="woj" name="ad_wojewodztwo" placeholder="np. Świętokrzyskie" autocomplete="off">
						<datalist id="woj">
							<option value="Dolnośląskie">
							<option value="Kujawsko-pomorskie">
							<option value="Lubelskie">
							<option value="Lubuskie">
							<option value="Łódzkie">
							<option value="Małopolskie">
							<option value="Mazowieckie">
							<option value="Opolskie">
							<option value="Podkarpackie">
							<option value="Podlaskie">
							<option value="Pomorskie">
							<option value="Śląskie">
							<option value="Świętokrzyskie">
							<option value="Warmińsko-mazurskie">
							<option value="Wielkopolskie">
							<option value="Zachodniopomorskie">
						</datalist><br><br>
					<div class="add_text">WPISZ MIASTO</div>
						<input class="add_input" type="text" name="ad_miasto" placeholder="np. Kielce" autocomplete="off"><br><br>
					<div class="add_text">WPISZ ULICĘ</div>
						<input class="add_input" type="text" name="ad_ulica" placeholder="np. Sandomierska" autocomplete="off"><br><br>
					<div class="add_text">WPISZ NUMER DOMU</div>
						<input class="add_input" type="text" name="ad_nr_domu" placeholder="np. 350" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WPISZ KOD POCZTOWY</div>
						<input class="add_input" type="text" name="ad_kod_pocztowy" placeholder="np. 25-351" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ STANOWISKO</div>
						<input class="add_input" list="stanowisko" name="st_nazwa" placeholder="np. Prezes" autocomplete="off">
						<datalist id="stanowisko">
							<option value="Prezes">
							<option value="Kierownik">
							<option value="Kontroler">
							<option value="Konserwator">
						</datalist><br><br>
					<div class="add_text">WYBIERZ DATĘ PRZYJĘCIA STANOWISKA</div>
						<input class="add_input" type="date" name="st_data_uzyskania" placeholder="np. 2001/12/15" value="2018-07-22"  autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ MIEJSCE PRACY</div>
						<input class="add_input" list="placowka" name="pl_id" placeholder="np. ID: 1 | ADRES: Kielce ul. Sandomierska 350" autocomplete="off">
						<datalist id="placowka">
						<?php
						$query = $conn->query("SELECT * FROM placowki, adresy WHERE adresy.ad_id = placowki.ad_id");
						while($query_row = $query->fetch_array(MYSQLI_ASSOC)) {
							echo '<option value="'.$query_row['pl_id'].'">ID | ADRES: '.$query_row['ad_miasto'].' ul. '.$query_row['ad_ulica'].' '.$query_row['ad_nr_domu'].'</option>';
						}
						?>
						</datalist><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
				<?php
			echo '</div>';
		} else if($view_name == 'kontrola') {
			echo '<div class="belka">DODAJ KONTROLĘ</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
				?>
				<form name="form_kontrola" action="addinsert.php?view=kontrola" method="post">
					<table align="center" width="100%"><tr>
					<td width="50%"><div class="add_text" style="font-size: 18px; width:400px;">WLASCICIEL</div></br></td><td width="50%"><div class="add_text" style="font-size: 18px; width:400px;">POJAZD</div></br></td>
					</tr><tr><td valign="top">
					
					
					
						<div class="add_text">WPISZ IMIĘ</div>
							<input class="add_input" type="text" name="if_imie" placeholder="np. Jakub" autocomplete="off"><br><br>
						<div class="add_text">WPISZ NAZWISKO</div>
							<input class="add_input" type="text" name="if_nazwisko" placeholder="np. Kowalski" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ PŁEĆ</div>
							<input class="add_input" list="plec" name="if_plec" placeholder="np. Mezczyzna" autocomplete="off">
							<datalist id="plec">
								<option value="Mezczyzna">
								<option value="Kobieta">
							</datalist><br><br>
						<div class="add_text">WYBIERZ DATĘ URODZENIA</div>
							<input class="add_input" type="date" name="if_data_urodzenia" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
						<div class="add_text">WPISZ PESEL</div>
							<input class="add_input" type="text" name="if_pesel" placeholder="np. 42636217231" maxlength="11" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WPISZ TELEFON</div>
							<input class="add_input" type="text" name="if_telefon" placeholder="np. 123123123" maxlength="9" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ KRAJ</div>
							<input class="add_input" list="kraj" name="ad_kraj" placeholder="np. Polska" autocomplete="off">
							<datalist id="kraj">
								<option value="Polska">
							</datalist><br><br>
						<div class="add_text">WYBIERZ WOJEWÓDZTWO</div>
							<input class="add_input" list="woj" name="ad_wojewodztwo" placeholder="np. Świętokrzyskie" autocomplete="off">
							<datalist id="woj">
								<option value="Dolnośląskie">
								<option value="Kujawsko-pomorskie">
								<option value="Lubelskie">
								<option value="Lubuskie">
								<option value="Łódzkie">
								<option value="Małopolskie">
								<option value="Mazowieckie">
								<option value="Opolskie">
								<option value="Podkarpackie">
								<option value="Podlaskie">
								<option value="Pomorskie">
								<option value="Śląskie">
								<option value="Świętokrzyskie">
								<option value="Warmińsko-mazurskie">
								<option value="Wielkopolskie">
								<option value="Zachodniopomorskie">
							</datalist><br><br>
						<div class="add_text">WPISZ MIASTO</div>
							<input class="add_input" type="text" name="ad_miasto" placeholder="np. Kielce" autocomplete="off"><br><br>
						<div class="add_text">WPISZ ULICĘ</div>
							<input class="add_input" type="text" name="ad_ulica" placeholder="np. Sandomierska" autocomplete="off"><br><br>
						<div class="add_text">WPISZ NUMER DOMU</div>
							<input class="add_input" type="text" name="ad_nr_domu" placeholder="np. 350" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WPISZ KOD POCZTOWY</div>
							<input class="add_input" type="text" name="ad_kod_pocztowy" placeholder="np. 25-351" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ DATĘ UZYSKANIA PRAWA JAZDY</div>
							<input class="add_input" type="date" name="w_data_prawa_jazdy" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ DATĘ WAŻNOŚCI PRAWA JAZDY</div>
							<input class="add_input" type="date" name="w_waznosc_prawa_jazdy" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
						<div class="add_text">WPISZ ILOŚĆ SAMOCHODÓW</div>
							<input class="add_input" type="text" name="w_ilosc_samochodow" placeholder="np. 1" maxlength="2" autocomplete="off" value="1"><br><br>
						<div class="add_text">WPISZ PROCENT ZNIŻEK OC</div>
							<input class="add_input" type="text" name="w_procent_znizek_oc" placeholder="np. 10" maxlength="4" onkeypress="return onlydec(event,'cos');" autocomplete="off" value="10"><br><br>
							
							
							
					</td><td valign="top" align="center">
					
					
					
						<div class="add_text">WYBIERZ TYP</div>
							<input class="add_input" list="typ" name="s_typ" placeholder="np. Sedan" autocomplete="off">
							<datalist id="typ">
								<option value="Sedan">
								<option value="Kombi">
								<option value="Hatchback">
								<option value="VAN">
								<option value="Miejski">
							</datalist><br><br>
						<div class="add_text">WPISZ NUMER REJESTRACYJNY</div>
							<input class="add_input" type="text" name="s_numer_rejestracyjny" placeholder="np. TKI84392" autocomplete="off"><br><br>
						<div class="add_text">WPISZ MARKĘ</div>
							<input class="add_input" type="text" name="s_marka" placeholder="np. AUDI" autocomplete="off"><br><br>
						<div class="add_text">WPISZ MODEL</div>
							<input class="add_input" type="text" name="s_model" placeholder="np. A6" autocomplete="off"><br><br>
						<div class="add_text">WPISZ GENERACJĘ</div>
							<input class="add_input" type="text" name="s_generacja" placeholder="np. C6" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ PALIWO</div>
							<input class="add_input" list="paliwo" name="dp_paliwo" placeholder="np. Benzyna" autocomplete="off">
							<datalist id="paliwo">
								<option value="Benzyna">
								<option value="Diesel">
								<option value="Elektryczny">
								<option value="Hybrydowy">
							</datalist><br><br>
						<div class="add_text">WPISZ PRZEBIEG</div>
							<input class="add_input" type="text" name="dp_przebieg" placeholder="np. 120400" maxlength="6" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WPISZ POJEMNOŚĆ</div>
							<input class="add_input" type="text" name="dp_pojemnosc" placeholder="np. 2.0" autocomplete="off"><br><br>
						<div class="add_text">WPISZ MOC W JEDNOSTCE KM</div>
							<input class="add_input" type="text" name="dp_moc_km" placeholder="np. 130" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WPISZ MOC W JEDNOSTCE KW</div>
							<input class="add_input" type="text" name="dp_moc_kw" placeholder="np. 100" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WPISZ MASĘ WŁASNĄ</div>
							<input class="add_input" type="text" name="dp_masa_wlasna" placeholder="np. 1400" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ SKRZYNIĘ BIEGÓW</div>
							<input class="add_input" list="skrzynia" name="dp_skrzynia_biegow" placeholder="np. Manualna" autocomplete="off">
							<datalist id="skrzynia">
								<option value="manualna">
								<option value="automatyczna">
							</datalist><br><br>
						<div class="add_text">WPISZ KRAJ PRODUKCJI</div>
							<input class="add_input" type="text" name="pp_kraj_produkcji" placeholder="np. Niemcy" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ DATĘ PRODUKCJI AUTA</div>
							<input class="add_input" type="date" name="pp_data_produkcji" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ DATĘ PIERWSZEJ REJESTRACJI AUTA</div>
							<input class="add_input" type="date" name="pp_data_pierwszej_rejestracji" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
						<div class="add_text">WYBIERZ DATĘ PIERWSZEJ REJESTRACJI W KRAJU</div>
							<input class="add_input" type="date" name="pp_data_rejestracji_w_kraju" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
						<div class="add_text">WPISZ ILOŚĆ WŁAŚCICIELI</div>
							<input class="add_input" type="text" name="pp_ilosc_wlascicieli" placeholder="np. 1" onkeypress="return onlydec(event,'cos');" autocomplete="off" value="1"><br><br>
							
							
							
					</td></tr></table>
					
					
					<div class="add_text">ZAMONTOWANA INSTALACJA LPG</div>
						<input type="radio" id="k_lpg_s" class="radio-button" name="k_lpg" value="TAK">
						<input type="radio" id="k_lpg_n" class="radio-button" name="k_lpg" checked="checked" value="NIE">
						<header id="filter">
						  <label for="k_lpg_s" class="filter-label k_lpg_s" id="k_lpg_s">TAK</label>
						  <label for="k_lpg_n" class="filter-label k_lpg_n" id="k_lpg_n">NIE</label>
						</header></br>
					<div class="add_text">ZAMONTOWANY HAK</div>
						<input type="radio" id="k_hak_s" class="radio-button" name="k_hak" value="TAK">
						<input type="radio" id="k_hak_n" class="radio-button" name="k_hak" checked="checked" value="NIE">
						<header id="filter">
						  <label for="k_hak_s" class="filter-label k_hak_s" id="k_hak_s">TAK</label>
						  <label for="k_hak_n" class="filter-label k_hak_n" id="k_hak_n">NIE</label>
						</header></br>
					<div class="add_text">WYBIERZ DATĘ KONTROLI</div>
						<input class="add_input" type="date" name="k_data_kontroli" placeholder="np. 2001/12/15" value="2018-07-22" autocomplete="off"><br><br>
					
					<div class="add_text" style="font-size: 16px; width:400px;">ZAZNACZ JEŚLI KOMPONENT JEST SPRAWNY</div>
						<div class="add_text">SILNIK</div>
							<input type="radio" id="sp_silnik_s" class="radio-button" name="sp_silnik" checked="checked" value="SPRAWNE">
							<input type="radio" id="sp_silnik_n" class="radio-button" name="sp_silnik" value="NIESPRAWNE">
							<header id="filter">
							  <label for="sp_silnik_s" class="filter-label sp_silnik_s" id="sp_silnik_s">SPRAWNE</label>
							  <label for="sp_silnik_n" class="filter-label sp_silnik_n" id="sp_silnik_n">NIESPRAWNE</label>
							</header>
						<div class="add_text">HAMULCE</div>
							<input type="radio" id="sp_hamulce_s" class="radio-button" name="sp_hamulce" checked="checked" value="SPRAWNE">
							<input type="radio" id="sp_hamulce_n" class="radio-button" name="sp_hamulce" value="NIESPRAWNE">
							<header id="filter">
							  <label for="sp_hamulce_s" class="filter-label sp_hamulce_s" id="sp_hamulce_s">SPRAWNE</label>
							  <label for="sp_hamulce_n" class="filter-label sp_hamulce_n" id="sp_hamulce_n">NIESPRAWNE</label>
							</header>
						<div class="add_text">AMORTYZATORY</div>
							<input type="radio" id="sp_amortyzatory_s" class="radio-button" name="sp_amortyzatory" checked="checked" value="SPRAWNE">
							<input type="radio" id="sp_amortyzatory_n" class="radio-button" name="sp_amortyzatory" value="NIESPRAWNE">
							<header id="filter">
							  <label for="sp_amortyzatory_s" class="filter-label sp_amortyzatory_s" id="sp_amortyzatory_s">SPRAWNE</label>
							  <label for="sp_amortyzatory_n" class="filter-label sp_amortyzatory_n" id="sp_amortyzatory_n">NIESPRAWNE</label>
							</header>
						<div class="add_text">ZAWIESZENIE</div>
							<input type="radio" id="sp_zawieszenie_s" class="radio-button" name="sp_zawieszenie" checked="checked" value="SPRAWNE">
							<input type="radio" id="sp_zawieszenie_n" class="radio-button" name="sp_zawieszenie" value="NIESPRAWNE">
							<header id="filter">
							  <label for="sp_zawieszenie_s" class="filter-label sp_zawieszenie_s" id="sp_zawieszenie_s">SPRAWNE</label>
							  <label for="sp_zawieszenie_n" class="filter-label sp_zawieszenie_n" id="sp_zawieszenie_n">NIESPRAWNE</label>
							</header>
						<div class="add_text">ŻARÓWKI</div>
							<input type="radio" id="sp_zarowki_s" class="radio-button" name="sp_zarowki" checked="checked" value="SPRAWNE">
							<input type="radio" id="sp_zarowki_n" class="radio-button" name="sp_zarowki" value="NIESPRAWNE">
							<header id="filter">
							  <label for="sp_zarowki_s" class="filter-label sp_zarowki_s" id="sp_zarowki_s">SPRAWNE</label>
							  <label for="sp_zarowki_n" class="filter-label sp_zarowki_n" id="sp_zarowki_n">NIESPRAWNE</label>
							</header>
						<div class="add_text">LAMPY</div>
							<input type="radio" id="sp_lampy_s" class="radio-button" name="sp_lampy" checked="checked" value="SPRAWNE">
							<input type="radio" id="sp_lampy_n" class="radio-button" name="sp_lampy" value="NIESPRAWNE">
							<header id="filter">
							  <label for="sp_lampy_s" class="filter-label sp_lampy_s" id="sp_lampy_s">SPRAWNE</label>
							  <label for="sp_lampy_n" class="filter-label sp_lampy_n" id="sp_lampy_n">NIESPRAWNE</label>
							</header>
						</br></br></br></br>
						<div class="add_text" style="font-size: 16px; width:400px;">WYBIERZ PRACOWNIKA</div>
							<input class="add_input" list="pracowniczek" name="p_id" placeholder="np. ID: 1 | DANE: Jakub Kowalski" autocomplete="off">
							<datalist id="pracowniczek">
							<?php
							$query = $conn->query("SELECT * FROM placowki, adresy, pracownicy, informacje_osobowe WHERE pracownicy.if_id = informacje_osobowe.if_id AND pracownicy.pl_id = placowki.pl_id AND placowki.ad_id = adresy.ad_id");
							while($query_row = $query->fetch_array(MYSQLI_ASSOC)) {
								echo '<option value="'.$query_row['p_id'].'">ID | '.$query_row['if_imie'].' '.$query_row['if_nazwisko'].' | ADRES PLACÓWKI: '.$query_row['ad_miasto'].' ul. '.$query_row['ad_ulica'].' '.$query_row['ad_nr_domu'].'</option>';
							}
							?>
							</datalist><br><br>
						
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>		
				<?php
			echo '</div>';
		} else if($view_name == 'zmiana') {
			echo '<div class="belka">DODAJ ZMIANĘ PRACOWNIKA</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;" align="center">';
				?>
				<form name="form_pracownik" action="addinsert.php?view=zmiana" method="post">
					<div class="add_text" style="font-size: 16px; width:400px;">WYBIERZ PRACOWNIKA</div>
							<input class="add_input" list="pracowniczek2" name="p_id" placeholder="np. ID: 1 | DANE: Jakub Kowalski" autocomplete="off">
							<datalist id="pracowniczek2">
							<?php
							$query = $conn->query("SELECT * FROM placowki, adresy, pracownicy, informacje_osobowe WHERE pracownicy.if_id = informacje_osobowe.if_id AND pracownicy.pl_id = placowki.pl_id AND placowki.ad_id = adresy.ad_id");
							while($query_row = $query->fetch_array(MYSQLI_ASSOC)) {
								echo '<option value="'.$query_row['p_id'].'">ID | '.$query_row['if_imie'].' '.$query_row['if_nazwisko'].' | ADRES PLACÓWKI: '.$query_row['ad_miasto'].' ul. '.$query_row['ad_ulica'].' '.$query_row['ad_nr_domu'].'</option>';
							}
							?>
							</datalist><br><br>
					<div class="add_text">WYBIERZ DATĘ ZMIANY PRACOWNIKA</div>
						<input class="add_input" type="date" name="zp_data" placeholder="np. 2001/12/15" value="2022-01-02" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ GODZINĘ ROZPOCZĘCIA ZMIANY</div>
						<input class="add_input" list="godz_st" name="zp_godzina_rozpoczecia" placeholder="np. 8:00" autocomplete="off">
						<datalist id="godz_st">
							<option value="6">6:00</option>
							<option value="7">7:00</option>
							<option value="8">8:00</option>
							<option value="10">10:00</option>
							<option value="11">11:00</option>
							<option value="12">12:00</option>
						</datalist><br><br>
					<div class="add_text">WYBIERZ GODZINĘ ZAKOŃCZENIA ZMIANY</div>
						<input class="add_input" list="godz_k" name="zp_godzina_zakonczenia" placeholder="np. 20:00" autocomplete="off">
						<datalist id="godz_k">
							<option value="16">16:00</option>
							<option value="17">17:00</option>
							<option value="18">18:00</option>
							<option value="19">19:00</option>
							<option value="20">20:00</option>
							<option value="21">21:00</option>
						</datalist><br><br>
					<div class="add_text">WPISZ LICZBĘ PRZEPROWADZONYCH KONTROLI</div>
						<input class="add_input" type="text" name="zp_liczba_kontroli" placeholder="np. 10" autocomplete="off"><br><br>
					<div class="add_text">ODBYTA PRZERWA</div>
						<input type="radio" id="zp_przerwa_s" class="radio-button" name="zp_przerwa" checked="checked" value="TAK">
						<input type="radio" id="zp_przerwa_n" class="radio-button" name="zp_przerwa" value="NIE">
						<header id="filter">
						  <label for="zp_przerwa_s" class="filter-label zp_przerwa_s" id="zp_przerwa_s">TAK</label>
						  <label for="zp_przerwa_n" class="filter-label zp_przerwa_n" id="zp_przerwa_n">NIE</label>
						</header><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
				<?php
			echo '</div>';
		} else {
			echo '<div class="belka">DODAJ REKORDY</div>';
			echo '<div style="margin:24px;">';
				echo '<div style="text-align: center;"><div class="text">Wybierz co chcesz dodać do bazy danych.</div><br><br><a href="add.php?view=placowka" class="belka2">PLACÓWKA</a>    
				<a href="add.php?view=pracownik" class="belka2">PRACOWNIK</a></br></br></br>    <a href="add.php?view=kontrola" class="belka2">KONTROLA</a>    <a href="add.php?view=zmiana" class="belka2">ZMIANA PRACOWNIKA</a></div>';
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