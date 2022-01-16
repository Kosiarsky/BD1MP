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
				<input class="add_input" type="text" name="ad_nr_domu" placeholder="np. 350" autocomplete="off"><br><br>
			<div class="add_text">WPISZ KOD POCZTOWY</div>
				<input class="add_input" type="text" name="ad_kod_pocztowy" placeholder="np. 25-351" autocomplete="off"><br><br>
			<div class="add_text">WPISZ TELEFON</div>
				<input class="add_input" type="text" name="pl_telefon" placeholder="np. 123123123" autocomplete="off"><br><br>
			<div class="add_text">WPISZ FAX</div>
				<input class="add_input" type="text" name="pl_fax" placeholder="np. 426362172314" autocomplete="off"><br><br>
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
			<div class="add_text">WPISZ DATĘ URODZENIA</div>
				<input class="add_input" type="text" name="if_data_urodzenia" placeholder="np. 2001/12/15" autocomplete="off"><br><br>
			<div class="add_text">WPISZ PESEL</div>
				<input class="add_input" type="text" name="if_pesel" placeholder="np. 42636217231" autocomplete="off"><br><br>
			<div class="add_text">WPISZ TELEFON</div>
				<input class="add_input" type="text" name="if_telefon" placeholder="np. 123123123" autocomplete="off"><br><br>
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
				<input class="add_input" type="text" name="ad_nr_domu" placeholder="np. 350" autocomplete="off"><br><br>
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
			<div class="add_text">WPISZ DATĘ PRZYJĘCIA STANOWISKA</div>
				<input class="add_input" type="text" name="st_data_uzyskania" placeholder="np. 2001/12/15" autocomplete="off"><br><br>
			<div class="add_text">WYBIERZ MIEJSCE PRACY</div>
				<input class="add_input" list="placowka" name="pl_id" placeholder="np. ID: 1 | ADRES: Kielce ul. Sandomierska 350" autocomplete="off">
				<datalist id="placowka">
				<?php
				$query = mysql_query("SELECT * FROM placowki, adresy WHERE adresy.ad_id = placowki.ad_id");
				while($query_row = mysql_fetch_array($query)) {
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
		
		
		
	echo '</div>';
} else {
	echo '<div class="belka">DODAJ REKORDY</div>';
	echo '<div style="margin:24px;">';
		echo '<div style="text-align: center;"><div class="text">Wybierz co chcesz dodać do bazy danych.</div><br><br><a href="add.php?view=placowka" class="belka2">PLACÓWKA</a>    
		<a href="add.php?view=pracownik" class="belka2">PRACOWNIK</a>    <a href="add.php?view=kontrola" class="belka2">KONTROLA</a></div>';
	echo '</div>';
}

include "footer.php";
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>