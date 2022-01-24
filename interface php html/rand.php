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
			echo '<div class="belka">WYLOSUJ REKORDY PLACÓWEK</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
			?>
				<form name="form_placowka" action="randinsert.php?view=placowka" method="post">
					<div class="add_text">WPISZ ILOŚĆ REKORDÓW, KTÓRE CHCESZ WYLOSOWAĆ</div>
						<input class="add_input" type="text" name="pl_rekordy" placeholder="np. 10" onkeypress="return onlydec(event,'cos');" onpaste="return false;" autocomplete="off"><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'pracownik') {
			echo '<div class="belka">WYLOSUJ REKORDY PRACOWNIKÓW</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
			?>
				<form name="form_pracownik" action="randinsert.php?view=pracownik" method="post">
					<div class="add_text">WPISZ ILOŚĆ REKORDÓW, KTÓRE CHCESZ WYLOSOWAĆ</div>
						<input class="add_input" type="text" name="p_rekordy" placeholder="np. 10" onkeypress="return onlydec(event,'cos');" onpaste="return false;"  autocomplete="off"><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'kontrola') {
			echo '<div class="belka">WYLOSUJ REKORDY KONTROL</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
			?>
				<form name="form_kontrola" action="randinsert.php?view=kontrola" method="post">
					<div class="add_text">WPISZ ILOŚĆ REKORDÓW, KTÓRE CHCESZ WYLOSOWAĆ</div>
						<input class="add_input" type="text" name="k_rekordy" placeholder="np. 10" onkeypress="return onlydec(event,'cos');" onpaste="return false;"  autocomplete="off"><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
			<?php
			echo '</div>';
		} else if($view_name == 'zmiana') {
				echo '<div class="belka">WYLOSUJ REKORDY ZMIAN PRACOWNICZYCH</div>';
			echo '<div style="margin:24px; font-size: 14px; text-align: center;">';
			?>
				<form name="form_kontrola" action="randinsert.php?view=zmiana" method="post">
					<div class="add_text">WPISZ ILOŚĆ REKORDÓW, KTÓRE CHCESZ WYLOSOWAĆ</div>
						<input class="add_input" type="text" name="zp_rekordy" placeholder="np. 10" onkeypress="return onlydec(event,'cos');" onpaste="return false;"  autocomplete="off"><br><br>
					<input class="add_submit" type="submit" name="dodaj" value="Dodaj">
				</form>
			<?php
			echo '</div>';
		} else {
			echo '<div class="belka">WYLOSUJ REKORDY</div>';
			echo '<div style="margin:24px;">';
				echo '<div style="text-align: center;"><div class="text">Wybierz jakie rekordy chcesz wylosować do bazy danych.</div><br><br><a href="rand.php?view=placowka" class="belka2">PLACÓWKA</a>    
				<a href="rand.php?view=pracownik" class="belka2">PRACOWNIK</a></br></br></br>   <a href="rand.php?view=kontrola" class="belka2">KONTROLA</a>    <a href="rand.php?view=zmiana" class="belka2">ZMIANA PRACOWNIKA</a></div>';
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