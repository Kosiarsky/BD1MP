<?php session_start(); ?>
<?php require_once("connection.php"); connection(); include "header2.php"; ?>

	<?php
    if (!isset($_POST['login']) && !isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
	?>
	<div style="width: 70%; margin: 0 auto;">
	<div id="srodek2" align="center">
      <form name="form-logowanie" action="index.php" method="post">
          <input class="textlogin" type="text" name="login" placeholder="Login" autocomplete="off"><br>
          <input class="textlogin" type="password" name="password" placeholder="Hasło" autocomplete="off"><br>
          <input class="submitlogin" type="submit" name="zaloguj" value="Zaloguj">
      </form>
  
	</div>
	</div>
	<?php
	}
    elseif (isset($_POST['login']) && isset($_POST['password']) && $_SESSION['auth'] == FALSE) {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
		$sol = 'y21sa7b';
        $login = mysql_real_escape_string($_POST['login']);
        $password = mysql_real_escape_string($_POST['password']);
		
        $password = md5($password.$sol);
		
        $sql = mysql_num_rows(mysql_query("SELECT * FROM `php_admin` WHERE `login` = '$login' AND `password` = '$password'"));
            if ($sql == 1) {
                $_SESSION['user'] = $login;
                $_SESSION['auth'] = TRUE;
				?>
				<div style="width: 70%; margin: auto auto;">
					<div id="srodek2" align="center">
						<meta http-equiv="refresh" content="1; URL=index2.php">
						<p style="padding-top:10px;"><strong>Proszę czekać...</strong><br>Trwa logowanie i wczytywanie danych...<p></p>
						<a href="index2.php" style="">Kliknij tutaj, aby nie czekać.</a>
					</div>
				</div>
				<?php
            }
            else {
				
				?>
				<div style="width: 70%; margin: auto auto;">
					<div id="srodek2" align="center">
						<meta http-equiv="refresh" content="2; URL=index.php">
						<p style="padding-top:10px;">Błąd podczas logowania do systemu. Zaraz nastąpi przekierowanie.</p><br><br>
						<a href="index.php" style="">Kliknij tutaj, aby nie czekać.</a>
					</div>
				</div>
				<?php
            }
        }
        else {
				?>
				<div style="width: 70%; margin: auto auto;">
					<div id="srodek2" align="center">
						<meta http-equiv="refresh" content="2; URL=index.php">
						<p style="padding-top:10px;">Błąd podczas logowania do systemu. Zaraz nastąpi przekierowanie.</p><br><br>
						<a href="index.php" style="">Kliknij tutaj, aby nie czekać.</a>
					</div>
				</div>
				<?php
        }
    }
	elseif ($_SESSION['auth'] == TRUE) {
        echo '<meta http-equiv="refresh" content="0; URL=index2.php">';
    }
	
 include "footer2.php";
 ?>