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
		if($view_name == 'wlasciciele') {
			echo '<div class="belka">WIDOKI - Wlasciciele</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_wlasciciele");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_wlasciciele");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else if($view_name == 'placowki') {
			echo '<div class="belka">WIDOKI - Placówki</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_placowki");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_placowki");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else if($view_name == 'pracownicy') {
			echo '<div class="belka">WIDOKI - Pracownicy</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_pracownicy");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_pracownicy");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else if($view_name == 'samochody') {
			echo '<div class="belka">WIDOKI - Samochody</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_samochody");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_samochody");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else if($view_name == 'kontrole') {
			echo '<div class="belka">WIDOKI - Kontrole</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_kontrole");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_kontrole");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else if($view_name == 'kontroleweek') {
			echo '<div class="belka">WIDOKI - Kontrole z ostatniego tygodnia</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_kontrole_week");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_kontrole_week");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else if($view_name == 'utarg') {
			echo '<div class="belka">WIDOKI - Utarg z poszczególnych dni</div>';
			echo '<div style="margin:24px; overflow-x: auto; overflow-y: auto;">';
			$query = $conn->query ("SHOW COLUMNS FROM view_utarg");
			if($query) {
				if(mysqli_num_rows($query))
				{
					$query2 = $conn->query ("SELECT * FROM view_utarg");
					if(mysqli_num_rows($query2))
					{
						echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
						echo '<td class="tab"><b>opcje</b></td>';
						while($show_col = $query->fetch_array(MYSQLI_NUM)) {
							echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
						}
						echo '</tr>';
						$query2_num = mysqli_num_rows($query);
						while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
							echo '<tr>';
							echo '<td class="tab2"><a href="vwdelete.php?view='.$view_name.'&id='.$show_tab[5].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">USUŃ</a></td>';
							for($i = 0; $i < $query2_num; $i++) {
								echo '<td class="tab2">'.$show_tab[$i].'</td>';
							}
							echo '</tr>';
						}
						
						echo '</table>';
					} else {
						echo '</tr>';
						echo '</table>';
						echo '<div style="text-align: center; min-height: 130px;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					}
				} else {
					echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
					echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Baza danych pusta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
			}
			echo '</div>';
		} else {
			echo '<div class="belka">WIDOKI</div>';
			echo '<div style="margin:24px;">';
				echo '<div style="text-align: center;"><div class="text">Wybierz widok, który chcesz zobaczyć.</div><br><br><a href="vwviews.php?view=placowki" class="belka2">PLACÓWKI</a>    <a href="vwviews.php?view=pracownicy" class="belka2">PRACOWNICY</a></br></br></br>    <a href="vwviews.php?view=wlasciciele" class="belka2">WŁAŚCICIELE</a>    <a href="vwviews.php?view=samochody" class="belka2">SAMOCHODY</a></div>';
				echo '<div style="text-align: center; margin-top: 23px;"></br><a href="vwviews.php?view=kontrole" class="belka2">KONTROLE</a>    <a href="vwviews.php?view=kontroleweek" class="belka2">KONTROLE OSTATNI TYDZIEŃ</a></br></br></br>    <a href="vwviews.php?view=utarg" class="belka2">UTARG</a></div>';
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