<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">UZUPEŁNIJ TABELE PRZYGOTOWANYMI REKORDAMI</div>
	<div style="margin:24px; text-align: center;">
		<?php	
		$id = $_GET["id"];
		$zapytanie = mysql_query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin'");
			
		if($id == 1) {

			if(mysql_num_rows($zapytanie))
			{
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (001, 'Polska', 'Swietokrzyskie', 'Kielce', '3maja','42','25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (002, 'Polska', 'Malopolskie', 'Krakow', 'Grunwaldzka', '193', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (003, 'Polska', 'Malopolskie', 'Krakow', 'Pilsudskiego', '512', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (004, 'Polska', 'Swietokrzyskie', 'Kielce', 'Kozackiego', '162', '25-008')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (005, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Polna' ,'242', '23-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (006, 'Polska', 'Swietokrzyskie', 'Pinczow', 'Kwiatowa', '423', '15-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (007, 'Polska', 'Swietokrzyskie', 'Pinczow' ,'Koscielna', '132', '15-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (008, 'Polska', 'Malopolskie', 'Krakow', 'Zielona', '153', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (009, 'Polska', 'Swietokrzyskie', 'Kielce', 'Szkolna', '162', '25-008')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (010, 'Polska', 'Malopolskie', 'Krakow' ,'Lipowa', '168', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (011, 'Polska', 'Swietokrzyskie', 'Kielce', 'Sosnowa', '623', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (012, 'Polska', 'Malopolskie', 'Krakow', 'Parkowa', '241', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (013, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Kolejowa', '343', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (014, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Kolejowa', '352', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (015, 'Polska', 'Malopolskie', 'Krakow', 'Akacjowa', '391', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (016, 'Polska', 'Swietokrzyskie', 'Kielce', '3maja','42','25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (017, 'Polska', 'Malopolskie', 'Krakow', 'Grunwaldzka', '193', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (018, 'Polska', 'Malopolskie', 'Krakow', 'Pilsudskiego', '512', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (019, 'Polska', 'Swietokrzyskie', 'Kielce', 'Kozackiego', '162', '25-008')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (020, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Polna' ,'242', '23-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (021, 'Polska', 'Swietokrzyskie', 'Pinczow', 'Kwiatowa', '423', '15-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (022, 'Polska', 'Swietokrzyskie', 'Pinczow' ,'Koscielna', '132', '15-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (023, 'Polska', 'Malopolskie', 'Krakow', 'Zielona', '153', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (024, 'Polska', 'Swietokrzyskie', 'Kielce', 'Szkolna', '162', '25-008')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (025, 'Polska', 'Malopolskie', 'Krakow' ,'Lipowa', '168', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (026, 'Polska', 'Swietokrzyskie', 'Kielce', 'Sosnowa', '623', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (027, 'Polska', 'Malopolskie', 'Krakow', 'Parkowa', '241', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (028, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Kolejowa', '343', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (029, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Kolejowa', '352', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (030, 'Polska', 'Malopolskie', 'Krakow', 'Akacjowa', '391', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (031, 'Polska', 'Swietokrzyskie', 'Kielce', '3maja','42','25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (032, 'Polska', 'Malopolskie', 'Krakow', 'Grunwaldzka', '193', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (033, 'Polska', 'Malopolskie', 'Krakow', 'Pilsudskiego', '512', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (034, 'Polska', 'Swietokrzyskie', 'Kielce', 'Kozackiego', '162', '25-008')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (035, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Polna' ,'242', '23-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (036, 'Polska', 'Swietokrzyskie', 'Pinczow', 'Kwiatowa', '423', '15-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (037, 'Polska', 'Swietokrzyskie', 'Pinczow' ,'Koscielna', '132', '15-243')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (038, 'Polska', 'Malopolskie', 'Krakow', 'Zielona', '153', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (039, 'Polska', 'Swietokrzyskie', 'Kielce', 'Szkolna', '162', '25-008')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (040, 'Polska', 'Malopolskie', 'Krakow' ,'Lipowa', '168', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (041, 'Polska', 'Swietokrzyskie', 'Kielce', 'Sosnowa', '623', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (042, 'Polska', 'Malopolskie', 'Krakow', 'Parkowa', '241', '28-500')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (043, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Kolejowa', '343', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (044, 'Polska', 'Swietokrzyskie', 'Starachowice', 'Kolejowa', '352', '25-004')");
				$insert_querry = mysql_query("INSERT INTO adresy (ad_id, ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES (045, 'Polska', 'Malopolskie', 'Krakow', 'Akacjowa', '391', '28-500')");

				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (001, 'Japonia', STR_TO_DATE('2009/05/19','%Y/%m/%d'), STR_TO_DATE('2009/07/24','%Y/%m/%d'),STR_TO_DATE('2012/03/21','%Y/%m/%d'),3)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (002, 'Niemcy', STR_TO_DATE('2008/12/11','%Y/%m/%d'), STR_TO_DATE('2009/01/23','%Y/%m/%d'),STR_TO_DATE('2012/05/23','%Y/%m/%d'),2)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (003, 'Niemcy', STR_TO_DATE('2012/01/13','%Y/%m/%d'), STR_TO_DATE('2012/02/18','%Y/%m/%d'),STR_TO_DATE('2015/11/11','%Y/%m/%d'),1)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (004, 'Francja', STR_TO_DATE('2005/03/03','%Y/%m/%d'), STR_TO_DATE('2005/04/12','%Y/%m/%d'),STR_TO_DATE('2009/12/11','%Y/%m/%d'),5)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (005, 'Japonia', STR_TO_DATE('2016/05/04','%Y/%m/%d'), STR_TO_DATE('2016/07/02','%Y/%m/%d'),STR_TO_DATE('2019/09/05','%Y/%m/%d'),1)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (006, 'Wlochy', STR_TO_DATE('2003/11/13','%Y/%m/%d'), STR_TO_DATE('2003/11/04','%Y/%m/%d'),STR_TO_DATE('2009/02/15','%Y/%m/%d'),5)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (007, 'Niemcy', STR_TO_DATE('1999/03/30','%Y/%m/%d'), STR_TO_DATE('1999/05/29','%Y/%m/%d'),STR_TO_DATE('2008/09/12','%Y/%m/%d'),7)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (008, 'Francja', STR_TO_DATE('2001/03/14','%Y/%m/%d'), STR_TO_DATE('2002/05/13','%Y/%m/%d'),STR_TO_DATE('2006/11/14','%Y/%m/%d'),3)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (009, 'Polska', STR_TO_DATE('1995/05/12','%Y/%m/%d'), STR_TO_DATE('1995/07/23','%Y/%m/%d'),STR_TO_DATE('1999/08/13','%Y/%m/%d'),9)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (010, 'Niemcy', STR_TO_DATE('2019/11/23','%Y/%m/%d'), STR_TO_DATE('2020/01/03','%Y/%m/%d'),STR_TO_DATE('2021/09/03','%Y/%m/%d'),2)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (011, 'USA', STR_TO_DATE('2013/09/04','%Y/%m/%d'), STR_TO_DATE('2013/10/13','%Y/%m/%d'),STR_TO_DATE('2015/11/03','%Y/%m/%d'),4)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (012, 'USA', STR_TO_DATE('2015/04/13','%Y/%m/%d'), STR_TO_DATE('2015/05/24','%Y/%m/%d'),STR_TO_DATE('2019/05/13','%Y/%m/%d'),3)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (013, 'USA', STR_TO_DATE('2003/09/09','%Y/%m/%d'), STR_TO_DATE('2003/12/23','%Y/%m/%d'),STR_TO_DATE('2009/02/13','%Y/%m/%d'),3)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (014, 'Hiszpanie', STR_TO_DATE('2009/05/11','%Y/%m/%d'), STR_TO_DATE('2010/01/09','%Y/%m/%d'),STR_TO_DATE('2012/05/19','%Y/%m/%d'),2)");
				$insert_querry = mysql_query("INSERT INTO produkcja_pojazdow (pp_id, pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES (015, 'Hiszpania', STR_TO_DATE('2012/12/03','%Y/%m/%d'), STR_TO_DATE('2012/12/29','%Y/%m/%d'),STR_TO_DATE('2015/11/13','%Y/%m/%d'),3)");

				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (001, '525362425', '426362172314', '09:00', '20:00', 031)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (002, '738262342', '172373264132', '09:00', '20:00', 032)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (003, '527424523', '183729528416', '09:00', '20:00', 033)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (004, '472341532', '103920012312', '09:00', '20:00', 034)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (005, '013024023', '015230140231', '09:00', '20:00', 035)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (006, '613623413', '093294199132', '09:00', '20:00', 036)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (007, '091224123', '523468320012', '09:00', '20:00', 037)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (008, '845630243', '243676800935', '09:00', '20:00', 038)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (009, '234978123', '098867534312', '09:00', '20:00', 039)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (010, '012652334', '053420981233', '09:00', '20:00', 040)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (011, '854641234', '865412343252', '09:00', '20:00', 041)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (012, '710231632', '123465410067', '09:00', '20:00', 042)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (013, '182530142', '736091724234', '09:00', '20:00', 043)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (014, '174523443', '123543564578', '09:00', '20:00', 044)");
				$insert_querry = mysql_query("INSERT INTO placowki (pl_id, pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia, ad_id) VALUES (015, '423432613', '534512376546', '09:00', '20:00', 045)");

				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (001, 'Kierownik', 'cos', 900, STR_TO_DATE('2021/12/19','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (002, 'Mechanik', 'ra', 500, STR_TO_DATE('2020/04/11','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (003, 'Mechanik', 'd', 450, STR_TO_DATE('2019/11/04','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (004, 'Mechanik', 'a', 640, STR_TO_DATE('2019/09/23','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (005, 'Mechanik', 'hg', 640, STR_TO_DATE('2021/01/03','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (006, 'Prezes', 'j', 1500, STR_TO_DATE('2015/11/14','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (007, 'Kierownik', 'x', 1000, STR_TO_DATE('2020/10/05','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (008, 'Sprzedawca', 'a', 750, STR_TO_DATE('2019/02/23','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (009, 'Sprzedawca', 'gs', 650, STR_TO_DATE('2018/04/03','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (010, 'Mechanik', 'gdf', 800, STR_TO_DATE('2020/11/12','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (011, 'Sekretarz', 'df', 550, STR_TO_DATE('2021/11/19','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (012, 'Sekretarz', 'zv', 600, STR_TO_DATE('2020/09/06','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (013, 'Sekretarz', 'b', 600, STR_TO_DATE('2020/08/14','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (014, 'Kierownik', 'vcx', 1200, STR_TO_DATE('2018/06/15','%Y/%m/%d'))");
				$insert_querry = mysql_query("INSERT INTO stanowiska (st_id, st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES (015, 'Mechanik', 'nd', 600, STR_TO_DATE('2017/07/30','%Y/%m/%d'))");

				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (001,'Benzyna',200900,'2.0',150,129,1654,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (002,'Diesel',150500,'1.6',98,60,1300,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (003,'Benzyna',180490,'1.8',180,150,2100,'automatyczna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (004,'Diesel',250420,'1.0',101,70,1800,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (005,'Benzyna',56000,'2.5',260,225,1760,'automatyczna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (006,'Benzyna',170800,'1.6',95,66,1500,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (007,'Benzyna',280800,'1.0',82,55,1320,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (008,'Diesel',290500,'1.6',101,73,1890,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (009,'Diesel',320300,'1.0',66,38,1430,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (010,'Diesel',40000,'3.0',360,328,2500,'automatyczna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (011,'Diesel',170400,'1.8',285,255,1670,'automatyczna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (012,'Benzyna',120400,'3.5',325,290,1890,'automatyczna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (013,'Diesel',190900,'1.2',180,152,1200,'manualna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (014,'Benzyna',150390,'2.0',148,120,1340,'automatyczna')");
				$insert_querry = mysql_query("INSERT INTO dane_pojazdow (dp_id, dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES (015,'Diesel',160600,'2.0',190,161,1540,'automatyczna')");

				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (001, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (002, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (003, 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (004, 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (005, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (006, 'NIESPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (007, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (008, 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (009, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (010, 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (011, 'NIESPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (012, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (013, 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (014, 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE')");
				$insert_querry = mysql_query("INSERT INTO stany_pojazdow (sp_id, sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES (015, 'NIESPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE')");

				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (001, 'Janusz', 'Kowalski', 'Mezczyzna', STR_TO_DATE('2001/12/15','%Y/%m/%d'), '91239432612', '194231512', 001)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (002, 'Malgorzata', 'Wlodarczyk', 'Kobieta', STR_TO_DATE('1986/04/12','%Y/%m/%d'), '15324512421', '031532351', 002)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (003, 'Ida', 'Czerwinska', 'Kobieta', STR_TO_DATE('1974/11/11','%Y/%m/%d'), '63417851231', '734164143', 003)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (004, 'Edward', 'Malinowski', 'Mezczyzna', STR_TO_DATE('1981/01/30','%Y/%m/%d'), '16352710534', '158324153', 004)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (005, 'Juliusz', 'Czarnecki', 'Mezczyzna', STR_TO_DATE('1954/06/23','%Y/%m/%d'), '10425194231', '092512093', 005)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (006, 'Konrad', 'Krupa', 'Mezczyzna', STR_TO_DATE('1999/09/09','%Y/%m/%d'), '17351251231', '523762143', 006)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (007, 'Ignacy', 'Czerwinski', 'Mezczyzna', STR_TO_DATE('1987/10/03','%Y/%m/%d'), '62384512343', '523875123', 007)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (008, 'Izabela', 'Walczak', 'Kobieta', STR_TO_DATE('1979/02/12','%Y/%m/%d'), '98512376534', '123683206', 008)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (009, 'Czesława', 'Lis', 'Kobieta', STR_TO_DATE('1996/01/11','%Y/%m/%d'), '9065712354', '745612389', 009)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (010, 'Natasza', 'Piotrowska', 'Kobieta', STR_TO_DATE('1994/12/30','%Y/%m/%d'), '87658123567', '534123978', 010)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (011, 'Dominik', 'Sobczak', 'Mezczyzna', STR_TO_DATE('1991/03/12','%Y/%m/%d'), '81827208243', '634123867', 011)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (012, 'Ludwik', 'Pietrzak', 'Mezczyzna', STR_TO_DATE('1971/02/28','%Y/%m/%d'), '98761224261', '543128251', 012)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (013, 'Ireneusz', 'Glowacka', 'Mezczyzna', STR_TO_DATE('1996/07/08','%Y/%m/%d'), '90123827122', '525412512', 013)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (014, 'Alek', 'Wroblewski', 'Mezczyzna', STR_TO_DATE('1990/05/29','%Y/%m/%d'), '87412378222', '723421123', 014)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (015, 'Stefania', 'Pawlak', 'Kobieta', STR_TO_DATE('1986/05/19','%Y/%m/%d'), '74562888435', '432444127', 015)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (016, 'Janusz', 'Kowalski', 'Mezczyzna', STR_TO_DATE('2001/12/15','%Y/%m/%d'), '91239435612', '194231412', 016)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (017, 'Malgorzata', 'Wlodarczyk', 'Kobieta', STR_TO_DATE('1986/04/12','%Y/%m/%d'), '15364512421', '032532351', 017)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (018, 'Ida', 'Czerwinska', 'Kobieta', STR_TO_DATE('1974/11/11','%Y/%m/%d'), '63417851241', '734164146', 018)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (019, 'Edward', 'Malinowski', 'Mezczyzna', STR_TO_DATE('1981/01/30','%Y/%m/%d'), '16357710534', '158424153', 019)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (020, 'Juliusz', 'Czarnecki', 'Mezczyzna', STR_TO_DATE('1954/06/23','%Y/%m/%d'), '10425194231', '092712093', 020)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (021, 'Konrad', 'Krupa', 'Mezczyzna', STR_TO_DATE('1999/09/09','%Y/%m/%d'), '17351251331', '523762133', 021)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (022, 'Ignacy', 'Czerwinski', 'Mezczyzna', STR_TO_DATE('1987/10/03','%Y/%m/%d'), '62364512343', '526875123', 022)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (023, 'Izabela', 'Walczak', 'Kobieta', STR_TO_DATE('1979/02/12','%Y/%m/%d'), '98512371534', '123683406', 023)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (024, 'Czesława', 'Lis', 'Kobieta', STR_TO_DATE('1996/01/11','%Y/%m/%d'), '9065712364', '745612386', 024)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (025, 'Natasza', 'Piotrowska', 'Kobieta', STR_TO_DATE('1994/12/30','%Y/%m/%d'), '87858123567', '536123978', 025)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (026, 'Dominik', 'Sobczak', 'Mezczyzna', STR_TO_DATE('1991/03/12','%Y/%m/%d'), '81857208243', '634223867', 026)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (027, 'Ludwik', 'Pietrzak', 'Mezczyzna', STR_TO_DATE('1971/02/28','%Y/%m/%d'), '98762224261', '543728251', 027)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (028, 'Ireneusz', 'Glowacka', 'Mezczyzna', STR_TO_DATE('1996/07/08','%Y/%m/%d'), '90623827122', '565412512', 028)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (029, 'Alek', 'Wroblewski', 'Mezczyzna', STR_TO_DATE('1990/05/29','%Y/%m/%d'), '87417378222', '723521123', 029)");
				$insert_querry = mysql_query("INSERT INTO informacje_osobowe (if_id, if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon, ad_id) VALUES (030, 'Stefania', 'Pawlak', 'Kobieta', STR_TO_DATE('1986/05/19','%Y/%m/%d'), '74562828435', '432446127', 030)");
				
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (001, STR_TO_DATE('2002/04/29','%Y/%m/%d'), STR_TO_DATE('2026/05/19','%Y/%m/%d'),2,30,016)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (002, STR_TO_DATE('2001/05/21','%Y/%m/%d'), STR_TO_DATE('2026/03/11','%Y/%m/%d'),3,25,017)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (003, STR_TO_DATE('1999/08/19','%Y/%m/%d'), STR_TO_DATE('2021/11/13','%Y/%m/%d'),1,30,018)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (004, STR_TO_DATE('1980/03/13','%Y/%m/%d'), STR_TO_DATE('2030/02/01','%Y/%m/%d'),1,35,019)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (005, STR_TO_DATE('1989/03/06','%Y/%m/%d'), STR_TO_DATE('2029/11/09','%Y/%m/%d'),1,25,020)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (006, STR_TO_DATE('1995/11/23','%Y/%m/%d'), STR_TO_DATE('2035/05/19','%Y/%m/%d'),2,15,021)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (007, STR_TO_DATE('2002/03/29','%Y/%m/%d'), STR_TO_DATE('2028/10/13','%Y/%m/%d'),3,0,022)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (008, STR_TO_DATE('2001/02/23','%Y/%m/%d'), STR_TO_DATE('2026/01/30','%Y/%m/%d'),1,5,023)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (009, STR_TO_DATE('1996/03/19','%Y/%m/%d'), STR_TO_DATE('2026/05/29','%Y/%m/%d'),2,10,024)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (010, STR_TO_DATE('2001/12/23','%Y/%m/%d'), STR_TO_DATE('2023/12/11','%Y/%m/%d'),3,5,025)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (011, STR_TO_DATE('1992/04/13','%Y/%m/%d'), STR_TO_DATE('2022/05/29','%Y/%m/%d'),1,15,026)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (012, STR_TO_DATE('2001/11/09','%Y/%m/%d'), STR_TO_DATE('2023/04/14','%Y/%m/%d'),2,25,027)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (013, STR_TO_DATE('1993/11/13','%Y/%m/%d'), STR_TO_DATE('2032/05/03','%Y/%m/%d'),3,35,028)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (014, STR_TO_DATE('1994/07/29','%Y/%m/%d'), STR_TO_DATE('2031/09/09','%Y/%m/%d'),2,0,029)");
				$insert_querry = mysql_query("INSERT INTO wlasciciele (w_id, w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc, if_id) VALUES (015, STR_TO_DATE('1993/03/13','%Y/%m/%d'), STR_TO_DATE('2028/09/03','%Y/%m/%d'),1,30,030)");

				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (001, 'Sedan', 'TKI0270', 'Opel', 'Vectra', 'A',001,001,001,001)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (002, 'Hatchbag', 'TKA70US', 'Mazda', '6', 'II',002,002,002,002)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (003, 'Hatchbag', 'TKI23AB', 'Volkswagen', 'Polo', 'IV',003,003,003,003)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (004, 'Kombi', 'TKI16CX', 'Audi', 'A6', 'C7',004,004,004,004)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (005, 'Kombi', 'TKI19BC', 'BMW', 'Seria5','7',005,005,005,005)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (006, 'Sedan', 'TKI98BZ', 'Seat', 'Ibiza', 'IV',006,006,006,006)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (007, 'Sedan', 'TKI9B4A', 'Mercedes', 'klasaA', 'W177',007,007,007,007)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (008, 'SUV', 'TKIXA03', 'Peugeot', '2008', 'I',008,008,008,008)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (009, 'Sedan', 'TKIDA01', 'Seat', 'Leon', 'II',009,009,009,009)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (010, 'Sedan', 'TKIMZ78', 'Ford', 'Mondeo', 'Mk4',010,010,010,010)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (011, 'SUV', 'TKIM7Z4', 'Volkswagen', 'Tiguana', 'II',011,011,011,011)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (012, 'Sedan', 'TKI89BM', 'Mercedes', 'KlasaE', 'W211',012,012,012,012)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (013, 'Kombi', 'TKIBMW3', 'Volkswagen', 'Passat','B8',013,013,013,013)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (014, 'Sedan', 'TKI9BM1', 'Audi', 'A8','D3',014,014,014,014)");
				$insert_querry = mysql_query("INSERT INTO samochody (s_id, s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja, w_id, pp_id, dp_id, sp_id) VALUES (015, 'Kombi', 'TKIBMK1', 'Audi', 'A4', 'B9',015,015,015,015)");

				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (001, 240, 4500,001,001,001)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (002, 250, 3200,002,002,002)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (003, 300, 3300,003,003,003)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (004, 290, 3500,004,004,004)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (005, 210, 5200,005,005,005)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (006, 180, 4200,006,006,006)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (007, 210, 4500,007,007,007)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (008, 245, 7800,008,008,008)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (009, 290, 3200, 009,009,009)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (010, 240, 4300,010,010,010)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (011, 235, 3200,011,011,011)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (012, 240, 2900,012,012,012)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (013, 287, 3900,013,013,013)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (014, 198, 5400,014,014,014)");
				$insert_querry = mysql_query("INSERT INTO pracownicy (p_id, p_przepracowane_godziny, p_stawka, pl_id, if_id, st_id) VALUES (015, 232, 5300,015,015,015)");

				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (001, STR_TO_DATE('2021/12/20','%Y/%m/%d'),'09:00','15:00',13,'TAK',001)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (002, STR_TO_DATE('2021/12/20','%Y/%m/%d'),'09:00','15:00',12,'TAK',002)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (003, STR_TO_DATE('2021/12/20','%Y/%m/%d'),'15:00','21:00',21,'TAK',003)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (004, STR_TO_DATE('2021/12/21','%Y/%m/%d'),'09:00','15:00',13,'TAK',004)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (005, STR_TO_DATE('2021/12/21','%Y/%m/%d'),'09:00','15:00',15,'TAK',005)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (006, STR_TO_DATE('2021/12/21','%Y/%m/%d'),'15:00','21:00',23,'TAK',006)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (007, STR_TO_DATE('2021/12/21','%Y/%m/%d'),'15:00','21:00',8,'TAK',007)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (008, STR_TO_DATE('2021/12/22','%Y/%m/%d'),'09:00','15:00',14,'TAK',008)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (009, STR_TO_DATE('2021/12/22','%Y/%m/%d'),'09:00','15:00',13,'TAK',009)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (010, STR_TO_DATE('2021/12/22','%Y/%m/%d'),'15:00','21:00',13,'TAK',010)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (011, STR_TO_DATE('2021/12/23','%Y/%m/%d'),'09:00','15:00',23,'TAK',011)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (012, STR_TO_DATE('2021/12/23','%Y/%m/%d'),'15:00','21:00',11,'TAK',012)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (013, STR_TO_DATE('2022/01/01','%Y/%m/%d'),'09:00','15:00',5,'TAK',013)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (014, STR_TO_DATE('2022/01/01','%Y/%m/%d'),'15:00','22:00',4,'TAK',014)");
				$insert_querry = mysql_query("INSERT INTO zmiany_pracownicze (zp_id, zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES (015, STR_TO_DATE('2022/01/01','%Y/%m/%d'),'15:00','22:00',9,'TAK',015)");

				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (001,'TAK','TAK','TAK', STR_TO_DATE('2021/12/20','%Y/%m/%d'), STR_TO_DATE('2022/12/20','%Y/%m/%d'),900,001,001)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (002,'NIE','NIE','NIE', STR_TO_DATE('2021/12/20','%Y/%m/%d'), STR_TO_DATE('2022/12/20','%Y/%m/%d'),1200,002,002)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (003,'TAK','NIE','TAK', STR_TO_DATE('2021/12/21','%Y/%m/%d'), STR_TO_DATE('2022/12/20','%Y/%m/%d'),1500,003,003)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (004,'TAK','NIE','TAK', STR_TO_DATE('2021/12/23','%Y/%m/%d'), STR_TO_DATE('2022/12/23','%Y/%m/%d'),500,004,004)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (005,'NIE','NIE','NIE', STR_TO_DATE('2022/01/02','%Y/%m/%d'), STR_TO_DATE('2023/01/02','%Y/%m/%d'),850,005,005)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (006,'TAK','TAK','TAK', STR_TO_DATE('2022/01/02','%Y/%m/%d'), STR_TO_DATE('2023/01/02','%Y/%m/%d'),1250,006,006)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (007,'TAK','TAK','TAK', STR_TO_DATE('2022/01/03','%Y/%m/%d'), STR_TO_DATE('2023/01/03','%Y/%m/%d'),1500,007,007)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (008,'NIE','NIE','NIE', STR_TO_DATE('2022/01/04','%Y/%m/%d'), STR_TO_DATE('2023/01/04','%Y/%m/%d'),950,008,008)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (009,'TAK','NIE','NIE', STR_TO_DATE('2022/01/04','%Y/%m/%d'), STR_TO_DATE('2023/01/04','%Y/%m/%d'),1250,009,009)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (010,'NIE','NIE','NIE', STR_TO_DATE('2022/01/05','%Y/%m/%d'), STR_TO_DATE('2023/01/05','%Y/%m/%d'),2500,010,010)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (011,'TAK','NIE','NIE', STR_TO_DATE('2022/01/05','%Y/%m/%d'), STR_TO_DATE('2023/01/05','%Y/%m/%d'),1900,011,011)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (012,'NIE','NIE','NIE', STR_TO_DATE('2022/01/06','%Y/%m/%d'), STR_TO_DATE('2023/01/06','%Y/%m/%d'),350,012,012)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (013,'TAK','NIE','TAK', STR_TO_DATE('2022/01/06','%Y/%m/%d'), STR_TO_DATE('2023/01/06','%Y/%m/%d'),490,013,013)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (014,'TAK','TAK','TAK', STR_TO_DATE('2022/01/06','%Y/%m/%d'), STR_TO_DATE('2023/01/06','%Y/%m/%d'),2400,014,014)");
				$insert_querry = mysql_query("INSERT INTO kontrole (k_id, k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id, s_id) VALUES (015,'NIE','NIE','TAK', STR_TO_DATE('2022/01/06','%Y/%m/%d'), STR_TO_DATE('2023/01/06','%Y/%m/%d'),420,015,015)");

				if($insert_querry > 0) {
					echo 'Tabele zostaną uzupełnione. <br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
				} else {
					echo 'Wystąpił błąd, tabele nie zostaną uzupełnione.<br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
				}
			} else {
				echo '<span class="belka2">BAZA DANYCH JEST PUSTA</span>';
			}
			
			
		} else {
			if(mysql_num_rows($zapytanie)) {
				echo 'Czy na pewno chcesz uzupełnić tabele przygotowanymi rekordami? <br><br> <a href="dbinsert.php?id=1" class="belka2">UZUPEŁNIJ</a>';
			} else {
				echo '<span class="belka2">BAZA DANYCH JEST PUSTA</span>';
			}
		}
		?>
	</div>
<?php
include "footer.php";
} else {
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
?>