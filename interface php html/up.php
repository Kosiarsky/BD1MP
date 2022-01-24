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
		if($view_name == 'stawka') {
			echo '<div class="belka">AKTUALIZUJ - Stawka Pracownika</div>';
			echo '<div style="margin:24px; text-align: center;">';
			?>
				<form name="form_stawka" action="upupdate.php?view=stawka" method="post">
					<div class="add_text">WPISZ PROCENT PODWYŻKI STAWKI</div>
						<input class="add_input" type="text" name="p_proc" placeholder="np. 30" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ PRACOWNIKA</div>
					<input class="add_input" list="pracowniczek" name="p_id" placeholder="np. ID: 1 | DANE: Jakub Kowalski" autocomplete="off">
						<datalist id="pracowniczek">
						<?php
						$query = $conn->query("SELECT * FROM placowki, adresy, pracownicy, informacje_osobowe WHERE pracownicy.if_id = informacje_osobowe.if_id AND pracownicy.pl_id = placowki.pl_id AND placowki.ad_id = adresy.ad_id");
						while($query_row = $query->fetch_array(MYSQLI_ASSOC)) {
							echo '<option value="'.$query_row['p_id'].'">ID | '.$query_row['if_imie'].' '.$query_row['if_nazwisko'].' | ADRES PLACÓWKI: '.$query_row['ad_miasto'].' ul. '.$query_row['ad_ulica'].' '.$query_row['ad_nr_domu'].'</option>';
						}
						?>
						</datalist><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="AKTUALIZUJ">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'premia') {
			echo '<div class="belka">AKTUALIZUJ - Premia Pracownika</div>';
			echo '<div style="margin:24px; text-align: center;">';
			?>
				<form name="form_premia" action="upupdate.php?view=premia" method="post">
					<div class="add_text">WPISZ PROCENT PODWYŻKI PREMII</div>
						<input class="add_input" type="text" name="p_proc" placeholder="np. 30" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ PRACOWNIKA</div>
					<input class="add_input" list="pracowniczek" name="p_id" placeholder="np. ID: 1 | DANE: Jakub Kowalski" autocomplete="off">
						<datalist id="pracowniczek">
						<?php
						$query = $conn->query("SELECT * FROM placowki, adresy, pracownicy, informacje_osobowe WHERE pracownicy.if_id = informacje_osobowe.if_id AND pracownicy.pl_id = placowki.pl_id AND placowki.ad_id = adresy.ad_id");
						while($query_row = $query->fetch_array(MYSQLI_ASSOC)) {
							echo '<option value="'.$query_row['p_id'].'">ID | '.$query_row['if_imie'].' '.$query_row['if_nazwisko'].' | ADRES PLACÓWKI: '.$query_row['ad_miasto'].' ul. '.$query_row['ad_ulica'].' '.$query_row['ad_nr_domu'].'</option>';
						}
						?>
						</datalist><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="AKTUALIZUJ">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'stawka_st') {
			echo '<div class="belka">AKTUALIZUJ - Stawka Stanowisk</div>';
			echo '<div style="margin:24px; text-align: center;">';
			?>
				<form name="form_stawka_st" action="upupdate.php?view=stawka_st" method="post">
					<div class="add_text">WPISZ PROCENT PODWYŻKI STAWKI DLA STANOWISKA</div>
						<input class="add_input" type="text" name="st_proc" placeholder="np. 30" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ STANOWISKO</div>
						<input class="add_input" list="stanowisko" name="st_nazwa" placeholder="np. Prezes" autocomplete="off">
						<datalist id="stanowisko">
							<option value="Prezes">
							<option value="Kierownik">
							<option value="Kontroler">
							<option value="Konserwator">
						</datalist><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="AKTUALIZUJ">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'premia_st') {
			echo '<div class="belka">AKTUALIZUJ - Premia Stanowisk</div>';
			echo '<div style="margin:24px; text-align: center;">';
			?>
				<form name="form_premia_st" action="upupdate.php?view=premia_st" method="post">
					<div class="add_text">WPISZ PROCENT PODWYŻKI PREMII DLA STANOWISKA</div>
						<input class="add_input" type="text" name="st_proc" placeholder="np. 30" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
					<div class="add_text">WYBIERZ STANOWISKO</div>
						<input class="add_input" list="stanowisko" name="st_nazwa" placeholder="np. Prezes" autocomplete="off">
						<datalist id="stanowisko">
							<option value="Prezes">
							<option value="Kierownik">
							<option value="Kontroler">
							<option value="Konserwator">
						</datalist><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="AKTUALIZUJ">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'kcena') {
			echo '<div class="belka">AKTUALIZUJ - Ceny Kontroli</div>';
			echo '<div style="margin:24px; text-align: center;">';
			?>
				<form name="form_premia" action="upupdate.php?view=kcena" method="post">
					<div class="add_text">WPISZ PROCENT PODWYŻKI CENY</div>
						<input class="add_input" type="text" name="p_proc" placeholder="np. 30" onkeypress="return onlydec(event,'cos');" autocomplete="off"><br><br>
						
					<div class="add_text">ZAZNACZ WARUNEK DO AKTUALIZACJI CENY</br> Jeśli nie zaznaczysz nic, zaktualizowane zostaną ceny bez LPG oraz HAK'a!</div></br>	
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
					<input class="add_submit" type="submit" name="dodaj" value="AKTUALIZUJ">
				</form>
			<?php
			echo '</div>';
		} else {
			echo '<div class="belka">AKTUALIZUJ REKORDY</div>';
			echo '<div style="margin:24px; text-align: center;">';
				echo '<div style="text-align: center;"><div class="text">Wybierz co chcesz zaaktualizować.</div><br><br><a href="up.php?view=stawka" class="belka2">STAWKA PRACOWNIKA</a>    <a href="up.php?view=premia" class="belka2">PREMIA PRACOWNIKA</a></br></br></br>    <a href="up.php?view=stawka_st" class="belka2">STAWKA STANOWISK</a>    <a href="up.php?view=premia_st" class="belka2">PREMIA STANOWISK</a></br></br></div>';
				echo '<div style="text-align: center; margin-top: 23px;"><a href="up.php?view=kcena" class="belka2">CENY KONTROLI</a></div>';
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