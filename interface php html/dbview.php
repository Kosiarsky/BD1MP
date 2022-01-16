<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">TABELA - <?php echo $_GET["table"]; ?></div>
	<div style="margin:24px;">
	<?php
	$table_name = $_GET["table"];
	if($table_name == 'adresy' || $table_name == 'dane_pojazdow' || $table_name == 'informacje_osobowe' || $table_name == 'kontrole' || $table_name == 'placowki' || $table_name == 'pracownicy' || 
	$table_name == 'produkcja_pojazdow' || $table_name == 'samochody' || $table_name == 'stanowiska' || $table_name == 'stany_pojazdow' || $table_name == 'wlasciciele' || $table_name == 'zmiany_pracownicze') 
	{
		$query = mysql_query ("SHOW COLUMNS FROM ".$table_name."");
		if(mysql_num_rows($query))
		{
			echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
			while($show_col = mysql_fetch_array($query)) {
				echo '<td class="tab"><b>'.$show_col[0].'</b></td>';
			}
			echo '</tr>';
			$query2 = mysql_query ("SELECT * FROM ".$table_name."");
			if(mysql_num_rows($query2))
			{
				$query2_num = mysql_num_rows($query);
				while($show_tab = mysql_fetch_array($query2)) {
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
			echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
		}
	} else {
		echo '<div style="text-align: center;"><div class="text">Probowałeś znaleźć tabelę <b>'.$table_name.'</b>. Niestety podana tabela nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
		echo '<meta http-equiv="refresh" content="3; URL=index2.php">';
	}
	?>
	</div>
<?php
include "footer.php";
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>