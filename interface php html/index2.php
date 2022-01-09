<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">LISTA TABEL</div>
	<div style="margin:24px;">
	<?php
	$query = mysql_query ("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin' AND tables_in_".$mysql_dbb." != 'view_pracownicy' AND tables_in_".$mysql_dbb." != 'view_samochody' AND tables_in_".$mysql_dbb." != 'view_wlasciciele' AND tables_in_".$mysql_dbb." != 'view_kontrole' AND tables_in_".$mysql_dbb." != 'view_kontrole_week' AND tables_in_".$mysql_dbb." != 'view_utarg'");
	if(mysql_num_rows($query))
	{
		echo '<table width="100%" cellspacing="0"><tr class="tab" style="font-size: 15px; margin:0;">';
			echo '<td class="tab" width="80%" style="padding-left: 15px;">NAZWA TABELI</td>';
			echo '<td class="tab" width="20%" style="text-align: center;">OPCJE</td>';
		echo '</tr>';
		
		while($table = mysql_fetch_array($query)) {
			echo '<tr style="font-size: 15px;"><td class="tab2" width="80%" style="margin:0px; padding-left: 25px;">'.$table[0].'</td><td class="tab2" width="20%" style="text-align: center;"><a href="dbview.php?table='.$table[0].'" class="belka2" style="padding-top: 4px; padding-bottom: 4px;">POKAZ REKORDY</a></td></tr>';
		}
		echo '</table>';
	} else {
		echo '<span class="belka2">BAZA DANYCH JEST PUSTA</span>';
	}

	?>
	</div>
<?php
include "footer.php";
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>