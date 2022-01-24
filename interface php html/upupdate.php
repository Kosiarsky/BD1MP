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
				if(!empty($_POST['p_proc']) && !empty($_POST['p_id'])) {
					$proc = $conn->real_escape_string($_POST['p_proc']);
					$pid = $conn->real_escape_string($_POST['p_id']);
					$update_query = $conn->query("CALL zmiana_stawki('$proc','$pid')");
					if($update_query > 0) {
						echo '<div class="text">Stawka pracownika zostanie zaaktalizowana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, stawka nie zostanie zaaktalizowana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				}
			echo '</div>';
		} else if($view_name == 'premia') {
			echo '<div class="belka">AKTUALIZUJ - Premia Pracownika</div>';
			echo '<div style="margin:24px; text-align: center;">';
				if(!empty($_POST['p_proc']) && !empty($_POST['p_id'])) {
					$proc = $conn->real_escape_string($_POST['p_proc']);
					$pid = $conn->real_escape_string($_POST['p_id']);
					$update_query = $conn->query("CALL zmiana_premii('$proc','$pid')");
					if($update_query > 0) {
						echo '<div class="text">Premia pracownika zostanie zaaktalizowana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, premia nie zostanie zaaktalizowana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				}
			echo '</div>';
		} else if($view_name == 'stawka_st') {
			echo '<div class="belka">AKTUALIZUJ - Stawka Stanowisk</div>';
			echo '<div style="margin:24px; text-align: center;">';
				if(!empty($_POST['st_proc']) && !empty($_POST['st_nazwa'])) {
					$proc = $conn->real_escape_string($_POST['st_proc']);
					$stnazwa = $conn->real_escape_string($_POST['st_nazwa']);
					$update_query = $conn->query("CALL zmiana_stawki_st('$proc','$stnazwa')");
					if($update_query > 0) {
						echo '<div class="text">Stawka stanowiska zostanie zaaktalizowana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, stawka nie zostanie zaaktalizowana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				}
			echo '</div>';
		} else if($view_name == 'premia_st') {
			echo '<div class="belka">AKTUALIZUJ - Premia Stanowisk</div>';
			echo '<div style="margin:24px; text-align: center;">';
				if(!empty($_POST['st_proc']) && !empty($_POST['st_nazwa'])) {
					$proc = $conn->real_escape_string($_POST['st_proc']);
					$stnazwa = $conn->real_escape_string($_POST['st_nazwa']);
					$update_query = $conn->query("CALL zmiana_premii_st('$proc','$stnazwa')");
					if($update_query > 0) {
						echo '<div class="text">Premia stanowiska zostanie zaaktalizowana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, premia nie zostanie zaaktalizowana.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				}
			echo '</div>';
		} else if($view_name == 'kcena') {
			echo '<div class="belka">AKTUALIZUJ - Ceny Kontroli</div>';
			echo '<div style="margin:24px; text-align: center;">';
				if(!empty($_POST['p_proc']) && !empty($_POST['k_lpg']) && !empty($_POST['k_hak'])) {
					$proc = $conn->real_escape_string($_POST['p_proc']);
					$lpg = $conn->real_escape_string($_POST['k_lpg']);
					$hak = $conn->real_escape_string($_POST['k_hak']);
					$update_query = $conn->query("CALL zmiana_ceny('$proc','$lpg','$hak')");
					if($update_query > 0) {
						echo '<div class="text">Ceny kontroli zostaną zaaktalizowana. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					} else {
						echo '<div class="text">Wystąpił błąd, ceny nie zostaną zaaktalizowane.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					}
				}
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