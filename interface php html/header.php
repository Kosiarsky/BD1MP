<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3c.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>PSK Bazy Danych Projekt</title>			
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"></meta>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
	<script language="javascript">
	function onlydec(event,f) {
		if (event.srcElement) {kc =  event.keyCode;} else {kc =  event.which;}
		if ((kc < 47 || kc > 57) && kc != 8 && kc != 0) return false;
		return true;
	}
	(function () {
		var onload = window.onload;

		window.onload = function () {
			if (typeof onload == "function") {
				onload.apply(this, arguments);
			}

			var fields = [];
			var inputs = document.getElementsByTagName("input");
			var textareas = document.getElementsByTagName("textarea");

			for (var i = 0; i < inputs.length; i++) {
				fields.push(inputs[i]);
			}

			for (var i = 0; i < textareas.length; i++) {
				fields.push(textareas[i]);
			}

			for (var i = 0; i < fields.length; i++) {
				var field = fields[i];

				if (typeof field.onpaste != "function" && !!field.getAttribute("onpaste")) {
					field.onpaste = eval("(function () { " + field.getAttribute("onpaste") + " })");
				}

				if (typeof field.onpaste == "function") {
					var oninput = field.oninput;

					field.oninput = function () {
						if (typeof oninput == "function") {
							oninput.apply(this, arguments);
						}

						if (typeof this.previousValue == "undefined") {
							this.previousValue = this.value;
						}

						var pasted = (Math.abs(this.previousValue.length - this.value.length) > 1 && this.value != "");

						if (pasted && !this.onpaste.apply(this, arguments)) {
							this.value = this.previousValue;
						}

						this.previousValue = this.value;
					};

					if (field.addEventListener) {
						field.addEventListener("input", field.oninput, false);
					} else if (field.attachEvent) {
						field.attachEvent("oninput", field.oninput);
					}
				}
			}
		}
	})();
	</script>
</head>
<body style="padding-top:50px; padding-bottom:50px;">
<div id="content" align="center">
	<div id="menuboczne">
	    <br><br>
		<a href="index2.php"><div class="menuboczne">WYŚWIETL LISTĘ TABEL</div></a>
		<a href="dbdelete.php"><div class="menuboczne">USUŃ WSZYSTKIE TABELE</div></a>
		<a href="dbcreate.php"><div class="menuboczne">DODAJ TABELE</div></a>
		<a href="dbclear.php"><div class="menuboczne">WYCZYŚĆ TABELE</div></a>
		<a href="dbinsert.php"><div class="menuboczne">UZUPEŁNIJ TABELE</div></a>
		<a href="vwviews.php"><div class="menuboczne">WIDOKI</div></a>
		<a href="add.php"><div class="menuboczne">DODAJ REKORDY</div></a>
		<a href="up.php"><div class="menuboczne">AKTUALIZUJ REKORDY</div></a>
		<a href="rand.php"><div class="menuboczne">WYLOSUJ REKORDY</div></a>
		<div class="autor" align="center"></br></br></br>Created by</br>Jakub Osełka</br>Dawid Nowotny</br>Olaf Prząda</br>Radosław Medalion</div>
	</div>
	<div id="srodek" align="center">
		<div style="margin:24px;">
			<?php echo '<table width="100%"><tr><td width="50%" align="left">Witaj, '.$_SESSION['user'].'!</td><td align="right" width="50%"><a href="logout.php" class="belka2">Wyloguj się</a></td></tr></table>'; ?>
		</div>
	</div>
	<div id="srodek" align="center" style="margin-top: 90px;">