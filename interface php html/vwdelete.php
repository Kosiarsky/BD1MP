<?php 
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">USUŃ REKORD</div>
	<div style="margin:24px; text-align: center;">
		<?php	
		$view = isset($_GET["view"]) ? $_GET["view"] : '';
		$id = isset($_GET["id"]) ? $_GET["id"] : '';
		if($view == 'pracownicy') {
			$query = $conn->query("SELECT * FROM view_pracownicy WHERE id = ".$id."");
			if(mysqli_num_rows($query)) {
				$query_row = $query->fetch_array(MYSQLI_ASSOC);
				$st_id = $query_row['st_id'];
				$if_id = $query_row['if_id'];
				$ad_id = $query_row['ad_id'];
				$delete_query = $conn->query("UPDATE kontrole SET p_id = null WHERE p_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM zmiany_pracownicze WHERE p_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM pracownicy WHERE p_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
				$delete_query = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
				$delete_query = $conn->query("DELETE FROM stanowiska WHERE st_id = ".$st_id."");
	
				if($delete_query > 0) {
					echo '<div class="text">Pracownik zostanie usunięty. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Pracownik nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć pracownika o ID <b>'.$id.'</b>. Niestety podane ID nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else if ($view == 'placowki') {
			$query = $conn->query("SELECT * FROM view_placowki WHERE id = ".$id."");
			if(mysqli_num_rows($query)) {
				$query_row = $query->fetch_array(MYSQLI_ASSOC);
				$query2 = $conn->query("SELECT * FROM placowki, pracownicy, informacje_osobowe WHERE pracownicy.pl_id = placowki.pl_id AND pracownicy.if_id = informacje_osobowe.if_id");
				$query2_row = $query2->fetch_array(MYSQLI_ASSOC);
				$pl_ad_id = $query_row["ad_id"];
				$p_id = $query2_row["p_id"];
				$st_id = $query2_row["st_id"];
				$ad_id = $query2_row["ad_id"];
				$if_id = $query2_row["if_id"];
				$delete_query = $conn->query("UPDATE kontrole SET p_id = null WHERE p_id = ".$p_id."");
				$delete_query1 = $conn->query("DELETE FROM zmiany_pracownicze WHERE p_id = ".$p_id."");
				$delete_query2 = $conn->query("DELETE FROM pracownicy WHERE p_id = ".$p_id."");
				$delete_query3 = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
				$delete_query4 = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
				$delete_query5 = $conn->query("DELETE FROM stanowiska WHERE st_id = ".$st_id."");
				$delete_query6 = $conn->query("DELETE FROM placowki WHERE pl_id = ".$id."");
				$delete_query7 = $conn->query("DELETE FROM adresy WHERE ad_id = ".$pl_ad_id."");
	
				if($delete_query > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Placówka nie zostanie usunięta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				if($delete_query1 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">1Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				if($delete_query2 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">2Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				if($delete_query3 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">3Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				if($delete_query4 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">4Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				if($delete_query5 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">5Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				if($delete_query6 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">6Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}if($delete_query7 > 0) {
					echo '<div class="text">Placowka zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">7Wystąpił błąd. Placówka nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć pracownika o ID <b>'.$id.'</b>. Niestety podane ID nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else if ($view == 'wlasciciele') {
			$query = $conn->query("SELECT * FROM view_wlasciciele WHERE id = ".$id."");
			if(mysqli_num_rows($query)) {
				$query_row = $query->fetch_array(MYSQLI_ASSOC);
				$if_id = $query_row['if_id'];
				$ad_id = $query_row['ad_id'];
				$delete_query = $conn->query("UPDATE samochody SET w_id = null WHERE w_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM wlasciciele WHERE w_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
				$delete_query = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
	
				if($delete_query > 0) {
					echo '<div class="text">Wlasciciel zostanie usunięty. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Wlasciciel nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć wlasciciela o ID <b>'.$id.'</b>. Niestety podane ID nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else if ($view == 'samochody') {
			$query = $conn->query("SELECT * FROM view_samochody WHERE id = ".$id."");
			if(mysqli_num_rows($query)) {
				$query2 = $conn->query("SELECT * FROM samochody, wlasciciele, informacje_osobowe WHERE samochody.s_id = ".$id." AND samochody.w_id = wlasciciele.w_id AND wlasciciele.if_id = informacje_osobowe.if_id");
				$query2_row = $query2->fetch_array(MYSQLI_ASSOC);
				$sp_id = $query2_row['sp_id'];
				$dp_id = $query2_row['dp_id'];
				$pp_id = $query2_row['pp_id'];
				$w_id = $query2_row['w_id'];
				$if_id = $query2_row['if_id'];
				$ad_id = $query2_row['ad_id'];
				
				$delete_query = $conn->query("DELETE FROM kontrole WHERE s_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM samochody WHERE s_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM stany_pojazdow WHERE sp_id = ".$sp_id."");
				$delete_query = $conn->query("DELETE FROM dane_pojazdow WHERE dp_id = ".$dp_id."");
				$delete_query = $conn->query("DELETE FROM produkcja_pojazdow WHERE pp_id = ".$pp_id."");
				$delete_query = $conn->query("DELETE FROM wlasciciele WHERE w_id = ".$w_id."");
				$delete_query = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
				$delete_query = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
	
				if($delete_query > 0) {
					echo '<div class="text">Samochod zostanie usunięty. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Samochod nie zostanie usunięty.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
				
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć samochod o ID <b>'.$id.'</b>. Niestety podane ID nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else if ($view == 'kontrole') {
			$query = $conn->query("SELECT * FROM view_kontrole WHERE id = ".$id."");
			if(mysqli_num_rows($query)) {
				$query2 = $conn->query("SELECT * FROM kontrole, samochody, wlasciciele, informacje_osobowe 
				WHERE kontrole.k_id = ".$id." AND kontrole.s_id = samochody.s_id AND samochody.w_id = wlasciciele.w_id AND wlasciciele.if_id = informacje_osobowe.if_id");
				$query2_row = $query2->fetch_array(MYSQLI_ASSOC);
				$s_id = $query2_row['s_id'];
				$sp_id = $query2_row['sp_id'];
				$dp_id = $query2_row['dp_id'];
				$pp_id = $query2_row['pp_id'];
				$w_id = $query2_row['w_id'];
				$if_id = $query2_row['if_id'];
				$ad_id = $query2_row['ad_id'];
				
				$delete_query = $conn->query("DELETE FROM kontrole WHERE s_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM samochody WHERE s_id = ".$s_id."");
				$delete_query = $conn->query("DELETE FROM stany_pojazdow WHERE sp_id = ".$sp_id."");
				$delete_query = $conn->query("DELETE FROM dane_pojazdow WHERE dp_id = ".$dp_id."");
				$delete_query = $conn->query("DELETE FROM produkcja_pojazdow WHERE pp_id = ".$pp_id."");
				$delete_query = $conn->query("DELETE FROM wlasciciele WHERE w_id = ".$w_id."");
				$delete_query = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
				$delete_query = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
	
				if($delete_query > 0) {
					echo '<div class="text">Kontrola zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Kontrola nie zostanie usunięta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć kontrole o ID <b>'.$id.'</b>. Niestety podane ID nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else if ($view == 'kontroleweek') {
			$query = $conn->query("SELECT * FROM view_kontrole_week WHERE id = ".$id."");
			if(mysqli_num_rows($query)) {
				$query2 = $conn->query("SELECT * FROM kontrole, samochody, wlasciciele, informacje_osobowe 
				WHERE kontrole.k_id = ".$id." AND kontrole.s_id = samochody.s_id AND samochody.w_id = wlasciciele.w_id AND wlasciciele.if_id = informacje_osobowe.if_id");
				$query2_row = $query2->fetch_array(MYSQLI_ASSOC);
				$s_id = $query2_row['s_id'];
				$sp_id = $query2_row['sp_id'];
				$dp_id = $query2_row['dp_id'];
				$pp_id = $query2_row['pp_id'];
				$w_id = $query2_row['w_id'];
				$if_id = $query2_row['if_id'];
				$ad_id = $query2_row['ad_id'];
				
				$delete_query = $conn->query("DELETE FROM kontrole WHERE s_id = ".$id."");
				$delete_query = $conn->query("DELETE FROM samochody WHERE s_id = ".$s_id."");
				$delete_query = $conn->query("DELETE FROM stany_pojazdow WHERE sp_id = ".$sp_id."");
				$delete_query = $conn->query("DELETE FROM dane_pojazdow WHERE dp_id = ".$dp_id."");
				$delete_query = $conn->query("DELETE FROM produkcja_pojazdow WHERE pp_id = ".$pp_id."");
				$delete_query = $conn->query("DELETE FROM wlasciciele WHERE w_id = ".$w_id."");
				$delete_query = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
				$delete_query = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
	
				if($delete_query > 0) {
					echo '<div class="text">Kontrola zostanie usunięta. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Kontrola nie zostanie usunięta.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć kontrole o ID <b>'.$id.'</b>. Niestety podane ID nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else if ($view == 'utarg') {
			$query = $conn->query("SELECT * FROM view_utarg WHERE data = DATE_FORMAT('".$id."', '%Y-%m-%d')");
			if(mysqli_num_rows($query)) {
				$query2 = $conn->query("SELECT * FROM kontrole, samochody, wlasciciele, informacje_osobowe 
				WHERE kontrole.k_data_kontroli = DATE_FORMAT('".$id."', '%Y-%m-%d') AND kontrole.s_id = samochody.s_id AND samochody.w_id = wlasciciele.w_id AND wlasciciele.if_id = informacje_osobowe.if_id");
				while($query2_row = $query2->fetch_array(MYSQLI_ASSOC)) {
					$k_id = $query2_row['k_id'];
					$s_id = $query2_row['s_id'];
					$sp_id = $query2_row['sp_id'];
					$dp_id = $query2_row['dp_id'];
					$pp_id = $query2_row['pp_id'];
					$w_id = $query2_row['w_id'];
					$if_id = $query2_row['if_id'];
					$ad_id = $query2_row['ad_id'];
					
					$delete_query = $conn->query("DELETE FROM kontrole WHERE s_id = ".$k_id."");
					$delete_query = $conn->query("DELETE FROM samochody WHERE s_id = ".$s_id."");
					$delete_query = $conn->query("DELETE FROM stany_pojazdow WHERE sp_id = ".$sp_id."");
					$delete_query = $conn->query("DELETE FROM dane_pojazdow WHERE dp_id = ".$dp_id."");
					$delete_query = $conn->query("DELETE FROM produkcja_pojazdow WHERE pp_id = ".$pp_id."");
					$delete_query = $conn->query("DELETE FROM wlasciciele WHERE w_id = ".$w_id."");
					$delete_query = $conn->query("DELETE FROM informacje_osobowe WHERE if_id = ".$if_id."");
					$delete_query = $conn->query("DELETE FROM adresy WHERE ad_id = ".$ad_id."");
					
				}
				if($delete_query > 0) {
					echo '<div class="text">Kontrole zostaną usunięte. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				} else {
					echo '<div class="text">Wystąpił błąd. Kontrole nie zostaną usunięte.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
					echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
				}
			} else {
				echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć kontrole odbyte w dniu <b>'.$id.'</b>. Niestety podane data nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
				echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
			}
		} else {
			echo '<div style="text-align: center;"><div class="text">Probowałeś usunąć rekord z widoku <b>'.$view.'</b>. Niestety podany widok nie istnieje.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a></div>';
			echo '<meta http-equiv="refresh" content="2; URL=vwviews.php?view='.$view.'">';
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