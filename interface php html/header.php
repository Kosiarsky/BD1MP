<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3c.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title>PSK Bazy Danych Projekt</title>			
<link rel="stylesheet" type="text/css" href="style.css">
<meta content="Wiesiek" name="Author"></meta>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"></meta>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>	
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="content" align="center">
	<div id="menuboczne">
	    <br><br>
		<a href="index2.php"><div class="menuboczne">WYŚWIETL LISTĘ TABEL</div></a>
		<a href="dbdelete.php"><div class="menuboczne">USUŃ BAZĘ DANYCH</div></a>
		<a href="dbcreate.php"><div class="menuboczne">DODAJ BAZĘ DANYCH</div></a>
		<a href="dbclear.php"><div class="menuboczne">WYCZYŚĆ WSZYSTKIE TABELE</div></a>
		<a href="dbinsert.php"><div class="menuboczne">UZUPEŁNIJ WSZYSTKIE TABELE</div></a>
		<a href="vwviews.php"><div class="menuboczne">WIDOKI</div></a>
		<div class="autor" align="center"></br></br></br>Created by PSKGENG</div>
	</div>
	<div id="srodek" align="center">
		<div style="margin:24px;">
			<?php echo '<table width="100%"><tr><td width="50%" align="left">Witaj, '.$_SESSION['user'].'!</td><td align="right" width="50%"><a href="logout.php" class="belka2">Wyloguj się</a></td></tr></table>'; ?>
		</div>
	</div>
	<div id="srodek" align="center" style="margin-top: 90px;">