<?php 
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">TABELA - <?php echo $_GET["table"]; ?></div>
	<div style="margin:24px; overflow-x: auto; overflow-y: auto;">
	<?php
	$table_name = isset($_GET["table"]) ? $_GET["table"] : '';
	if($table_name == 'adresy' || $table_name == 'dane_pojazdow' || $table_name == 'informacje_osobowe' || $table_name == 'kontrole' || $table_name == 'placowki' || $table_name == 'pracownicy' || 
	$table_name == 'produkcja_pojazdow' || $table_name == 'samochody' || $table_name == 'stanowiska' || $table_name == 'stany_pojazdow' || $table_name == 'wlasciciele' || $table_name == 'zmiany_pracownicze') 
	{
		if($table_name == 'adresy') $query = $conn->query("SHOW COLUMNS FROM adresy");
		if($table_name == 'dane_pojazdow') $query = $conn->query("SHOW COLUMNS FROM dane_pojazdow");
		if($table_name == 'informacje_osobowe') $query = $conn->query("SHOW COLUMNS FROM informacje_osobowe");
		if($table_name == 'kontrole') $query = $conn->query("SHOW COLUMNS FROM kontrole");
		if($table_name == 'placowki') $query = $conn->query("SHOW COLUMNS FROM placowki");
		if($table_name == 'pracownicy') $query = $conn->query("SHOW COLUMNS FROM pracownicy");
		if($table_name == 'produkcja_pojazdow') $query = $conn->query("SHOW COLUMNS FROM produkcja_pojazdow");
		if($table_name == 'samochody') $query = $conn->query("SHOW COLUMNS FROM samochody");
		if($table_name == 'stanowiska') $query = $conn->query("SHOW COLUMNS FROM stanowiska");
		if($table_name == 'stany_pojazdow') $query = $conn->query("SHOW COLUMNS FROM stany_pojazdow");
		if($table_name == 'wlasciciele') $query = $conn->query("SHOW COLUMNS FROM wlasciciele");
		if($table_name == 'zmiany_pracownicze') $query = $conn->query("SHOW COLUMNS FROM zmiany_pracownicze");
		
		if(mysqli_num_rows($query))
		{
			echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
			while($show_col = $query->fetch_array(MYSQLI_NUM)) {
				echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
			}
			echo '</tr>';
			$query2 = $conn->query("SELECT * FROM ".$table_name."");
			if(mysqli_num_rows($query2))
			{
				$query2_num = mysqli_num_rows($query);
				while($show_tab = $query2->fetch_array(MYSQLI_NUM)) {
					echo '<tr>';
					for($i = 0; $i < $query2_num; $i++) {
						echo '<td class="tab2">'.$show_tab[$i].'</td>';
					}
					echo '</tr>';
				}
				
				echo '</table>';
			} else {
				echo '</tr>';
				echo '</table>';
				echo '<div style="text-align: center;"><div class="text">Brak rekordów w tabeli.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
			}
		} else {
			echo '<div style="text-align: center;"><div class="text">Nieznany błąd.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
			//echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
		}
	} else {
		echo '<div style="text-align: center;"><div class="text">Probowałeś znaleźć tabelę <b>'.$table_name.'</b>. Niestety podana tabela nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
		echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
	}
	?>
	</div>
<?php
include "footer.php";
CloseCon($conn);
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>