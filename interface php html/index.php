<?php 
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
include "header2.php";
if (!isset($_SESSION['auth'])) $_SESSION['auth'] = FALSE; 
    $_SESSION['auth'] = 0; 
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
        $login = $conn->real_escape_string($_POST['login']);
        $password = $conn->real_escape_string($_POST['password']);
		
        $password = md5($password.$sol);
		
        $sql = mysqli_num_rows($conn->query("SELECT * FROM `php_admin` WHERE `login` = '$login' AND `password` = '$password'"));
            if ($sql == 1) {
                $_SESSION['user'] = $login;
                $_SESSION['auth'] = TRUE;
				?>
				<div style="width: 70%; margin: auto auto;">
					<div id="srodek2" align="center">
						<meta http-equiv="refresh" content="1; URL=index2.php">
						<p style="padding-top:10px;"><div class="text"><strong>Proszę czekać...</strong><br>Trwa logowanie i wczytywanie danych...</div></p><br><br>
						<a href="index2.php" class="belka2" style="margin: 20px;">Kliknij tutaj, aby nie czekać.</a>
					</div>
				</div>
				<?php
            }
            else {
				
				?>
				<div style="width: 70%; margin: auto auto;">
					<div id="srodek2" align="center">
						<meta http-equiv="refresh" content="2; URL=index.php">
						<p style="padding-top:10px;"><div class="text">Błąd podczas logowania do systemu. Zaraz nastąpi przekierowanie.</div></p><br><br>
						<a href="index.php" class="belka2" style="margin: 20px;">Kliknij tutaj, aby nie czekać.</a>
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
						<p style="padding-top:10px;"><div class="text">Błąd podczas logowania do systemu. Zaraz nastąpi przekierowanie.</div></p><br><br>
						<a href="index.php" class="belka2" style="margin: 20px;">Kliknij tutaj, aby nie czekać.</a>
					</div>
				</div>
				<?php
        }
    }
	elseif ($_SESSION['auth'] == TRUE) {
        echo '<meta http-equiv="refresh" content="0; URL=index2.php">';
    }
	
 include "footer2.php";
 CloseCon($conn);
 ?>