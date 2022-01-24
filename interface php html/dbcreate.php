<?php 
session_start();
require_once("connection.php"); 
$conn = OpenCon(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">UZUPEŁNIJ BAZE DANYCH PRZYGOTOWANYMI TABELAMI</div>
	<div style="margin:24px; text-align: center;">
		<?php	
		$id = isset($_GET["id"]) ? $_GET["id"] : '';
		$zapytanie = $conn->query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin' AND tables_in_".$mysql_dbb." != 'view_pracownicy' AND tables_in_".$mysql_dbb." != 'view_samochody' AND tables_in_".$mysql_dbb." != 'view_wlasciciele' AND tables_in_".$mysql_dbb." != 'view_kontrole' AND tables_in_".$mysql_dbb." != 'view_kontrole_week' AND tables_in_".$mysql_dbb." != 'view_utarg' AND tables_in_".$mysql_dbb." != 'view_placowki'");
			
		if($id == 1) {

			if(mysqli_num_rows($zapytanie))
			{
				echo '<span class="belka2">BAZA DANYCH JEST UZUPEŁNIONA</span>';
			} else {
				$create_querry = $conn->query("CREATE TABLE adresy (
					ad_id           INT NOT NULL AUTO_INCREMENT,
					ad_kraj         CHAR(30),
					ad_wojewodztwo  CHAR(30),
					ad_miasto       CHAR(30),
					ad_ulica        CHAR(30),
					ad_nr_domu      INT,
					ad_kod_pocztowy CHAR(6),
					PRIMARY KEY (ad_id)
				)");

				$create_querry = $conn->query("CREATE TABLE dane_pojazdow (
					dp_id                         INT NOT NULL AUTO_INCREMENT,
					dp_paliwo                     CHAR(11),
					dp_przebieg                   INT,
					dp_pojemnosc                  CHAR(3),
					dp_moc_km                     INT,
					dp_moc_kw                     INT,
					dp_masa_wlasna                INT,
					dp_skrzynia_biegow            CHAR(20),
					PRIMARY KEY (dp_id)
				)");

				$create_querry = $conn->query("CREATE TABLE informacje_osobowe (
					if_id             INT NOT NULL AUTO_INCREMENT,
					if_imie           CHAR(15),
					if_nazwisko       CHAR(30),
					if_plec           CHAR(15),
					if_data_urodzenia DATE,
					if_pesel          CHAR(11),
					if_telefon        CHAR(9),
					ad_id             INT NOT NULL,
					PRIMARY KEY (if_id)
				)");

				$create_querry = $conn->query("ALTER TABLE informacje_osobowe ADD CONSTRAINT if_unique UNIQUE ( if_pesel, if_telefon )");
				$create_querry = $conn->query("ALTER TABLE informacje_osobowe ADD CONSTRAINT plec_check CHECK (if_plec IN ('Mezczyzna', 'Kobieta'))");

				$create_querry = $conn->query("CREATE TABLE kontrole (
					k_id                      INT NOT NULL AUTO_INCREMENT,
					k_pozytywny               CHAR(3),
					k_lpg                     CHAR(3),
					k_hak                     CHAR(3),
					k_data_kontroli           DATE,
					k_data_nastepnej_kontroli DATE,
					k_cena                    INT,
					p_id                      INT,
					s_id                      INT NOT NULL,
					PRIMARY KEY (k_id)
				)");

				$create_querry = $conn->query("ALTER TABLE kontrole ADD CONSTRAINT poz_check CHECK (k_pozytywny IN ('TAK', 'NIE'))");
				$create_querry = $conn->query("ALTER TABLE kontrole ADD CONSTRAINT lpg_check CHECK (k_lpg IN ('TAK', 'NIE'))");
				$create_querry = $conn->query("ALTER TABLE kontrole ADD CONSTRAINT hak_check CHECK (k_hak IN ('TAK', 'NIE'))");

				$create_querry = $conn->query("CREATE TABLE placowki (
					pl_id                 INT NOT NULL AUTO_INCREMENT,
					pl_telefon            CHAR(9),
					pl_fax                CHAR(12),
					pl_godzina_otwarcia   CHAR(5),
					pl_godzina_zamkniecia CHAR(5),
					ad_id                 INT NOT NULL,
					PRIMARY KEY (pl_id)
				)");

				$create_querry = $conn->query("ALTER TABLE placowki ADD CONSTRAINT ad_unique UNIQUE ( ad_id )");

				$create_querry = $conn->query("CREATE TABLE pracownicy (
					p_id                    INT NOT NULL AUTO_INCREMENT,
					p_przepracowane_godziny INT,
					p_stawka                INT,
					pl_id                   INT NOT NULL,
					if_id                   INT NOT NULL,
					st_id                   INT NOT NULL,
					PRIMARY KEY (p_id)
				)");

				$create_querry = $conn->query("ALTER TABLE pracownicy ADD CONSTRAINT p_unique UNIQUE ( if_id, st_id )");

				$create_querry = $conn->query("CREATE TABLE produkcja_pojazdow (
					pp_id                         INT NOT NULL AUTO_INCREMENT,
					pp_kraj_produkcji             CHAR(30),
					pp_data_produkcji             DATE,
					pp_data_pierwszej_rejestracji DATE,
					pp_data_rejestracji_w_kraju   DATE,
					pp_ilosc_wlascicieli          INT,
					PRIMARY KEY (pp_id)
				)");

				$create_querry = $conn->query("CREATE TABLE samochody (
					s_id                  INT NOT NULL AUTO_INCREMENT,
					s_typ                 CHAR(30),
					s_numer_rejestracyjny CHAR(30),
					s_marka               CHAR(30),
					s_model               CHAR(30),
					s_generacja           CHAR(30),
					w_id                  INT,
					pp_id                 INT NOT NULL,
					dp_id                 INT NOT NULL,
					sp_id                 INT NOT NULL,
					PRIMARY KEY (s_id)
				)");

				$create_querry = $conn->query("ALTER TABLE samochody ADD CONSTRAINT s_unique UNIQUE ( s_numer_rejestracyjny, pp_id, dp_id, sp_id )");

				$create_querry = $conn->query("CREATE TABLE stanowiska (
					st_id             INT NOT NULL AUTO_INCREMENT,
					st_nazwa          CHAR(30),
					st_opis           CHAR(200),
					st_premia         INT,
					st_data_uzyskania DATE,
					PRIMARY KEY (st_id)
				)");

				$create_querry = $conn->query("CREATE TABLE stany_pojazdow (
					sp_id           INT NOT NULL AUTO_INCREMENT,
					sp_silnik       CHAR(30),
					sp_hamulce      CHAR(30),
					sp_amortyzatory CHAR(30),
					sp_zawieszenie  CHAR(30),
					sp_zarowki      CHAR(30),
					sp_lampy        CHAR(30),
					PRIMARY KEY (sp_id)
				)");

				$create_querry = $conn->query("ALTER TABLE stany_pojazdow ADD CONSTRAINT silnik_check CHECK (sp_silnik IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = $conn->query("ALTER TABLE stany_pojazdow ADD CONSTRAINT hamulce_check CHECK (sp_hamulce IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = $conn->query("ALTER TABLE stany_pojazdow ADD CONSTRAINT amortyzatory_check CHECK (sp_amortyzatory IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = $conn->query("ALTER TABLE stany_pojazdow ADD CONSTRAINT zawieszenie_check CHECK (sp_zawieszenie IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = $conn->query("ALTER TABLE stany_pojazdow ADD CONSTRAINT zarowki_check CHECK (sp_zarowki IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = $conn->query("ALTER TABLE stany_pojazdow ADD CONSTRAINT lampy_check CHECK (sp_lampy IN ('SPRAWNE', 'NIESPRAWNE'))");

				$create_querry = $conn->query("CREATE TABLE wlasciciele (
					w_id                  INT NOT NULL AUTO_INCREMENT,
					w_data_prawa_jazdy    DATE,
					w_waznosc_prawa_jazdy DATE,
					w_ilosc_samochodow    INT,
					w_procent_znizek_oc   INT,
					if_id                 INT NOT NULL,
					PRIMARY KEY (w_id)
				)");

				$create_querry = $conn->query("ALTER TABLE wlasciciele ADD CONSTRAINT w_unique UNIQUE ( if_id )");

				$create_querry = $conn->query("CREATE TABLE zmiany_pracownicze (
					zp_id                  INT NOT NULL AUTO_INCREMENT,
					zp_data                DATE,
					zp_godzina_rozpoczecia CHAR(10),
					zp_godzina_zakonczenia CHAR(10),
					zp_liczba_kontroli     INT,
					zp_przerwa             CHAR(3),
					p_id                   INT NOT NULL,
					PRIMARY KEY (zp_id)
				)");

				$create_querry = $conn->query("ALTER TABLE zmiany_pracownicze ADD CONSTRAINT przerwa_check CHECK (zp_przerwa IN ('TAK', 'NIE'))");

				$create_querry = $conn->query("ALTER TABLE informacje_osobowe
					ADD CONSTRAINT ifad_fk FOREIGN KEY ( ad_id )
						REFERENCES adresy ( ad_id )");

				$create_querry = $conn->query("ALTER TABLE kontrole
					ADD CONSTRAINT kp_fk FOREIGN KEY ( p_id )
						REFERENCES pracownicy ( p_id )");

				$create_querry = $conn->query("ALTER TABLE kontrole
					ADD CONSTRAINT ks_fk FOREIGN KEY ( s_id )
						REFERENCES samochody ( s_id )");

				$create_querry = $conn->query("ALTER TABLE placowki
					ADD CONSTRAINT pa_fk FOREIGN KEY ( ad_id )
						REFERENCES adresy ( ad_id )");

				$create_querry = $conn->query("ALTER TABLE pracownicy
					ADD CONSTRAINT pif_fk FOREIGN KEY ( if_id )
						REFERENCES informacje_osobowe ( if_id )");

				$create_querry = $conn->query("ALTER TABLE pracownicy
					ADD CONSTRAINT ppl_fk FOREIGN KEY ( pl_id )
						REFERENCES placowki ( pl_id )");

				$create_querry = $conn->query("ALTER TABLE pracownicy
					ADD CONSTRAINT pst_fk FOREIGN KEY ( st_id )
						REFERENCES stanowiska ( st_id )");

				$create_querry = $conn->query("ALTER TABLE samochody
					ADD CONSTRAINT sdp_fk FOREIGN KEY ( dp_id )
						REFERENCES dane_pojazdow ( dp_id )");

				$create_querry = $conn->query("ALTER TABLE samochody
					ADD CONSTRAINT spp_fk FOREIGN KEY ( pp_id )
						REFERENCES produkcja_pojazdow ( pp_id )");

				$create_querry = $conn->query("ALTER TABLE samochody
					ADD CONSTRAINT ssp_fk FOREIGN KEY ( sp_id )
						REFERENCES stany_pojazdow ( sp_id )");

				$create_querry = $conn->query("ALTER TABLE samochody
					ADD CONSTRAINT sw_fk FOREIGN KEY ( w_id )
						REFERENCES wlasciciele ( w_id )");

				$create_querry = $conn->query("ALTER TABLE wlasciciele
					ADD CONSTRAINT wif_fk FOREIGN KEY ( if_id )
						REFERENCES informacje_osobowe ( if_id )");

				$create_querry = $conn->query("ALTER TABLE zmiany_pracownicze
					ADD CONSTRAINT zpp_fk FOREIGN KEY ( p_id )
						REFERENCES pracownicy ( p_id )");
				
				$create_querry = $conn->query("create or replace view view_wlasciciele (id,imie,nazwisko,plec,data_urodzenia,pesel,telefon,kraj,wojewodztwo,miasto,ulica,nr_domu,kod_pocztowy,data_otrzymania_prawa_jazdy,
					waznosc_prawa_jazdy,ilosc_samochodow,procent_znizek_oc, ad_id, if_id) 
					as (SELECT w.w_id, i.if_imie, i.if_nazwisko, i.if_plec, i.if_data_urodzenia, i.if_pesel, i.if_telefon, a.ad_kraj, a.ad_wojewodztwo, a.ad_miasto, a.ad_ulica, a.ad_nr_domu, a.ad_kod_pocztowy, 
					w.w_data_prawa_jazdy, w.w_waznosc_prawa_jazdy, w.w_ilosc_samochodow, w.w_procent_znizek_oc, i.ad_id, w.if_id  FROM wlasciciele w, informacje_osobowe i, adresy a WHERE w.if_id = i.if_id AND i.ad_id = a.ad_id)");

				$create_querry = $conn->query("create or replace view view_placowki (id,kraj,wojewodztwo,miasto,ulica,nr_domu,kod_pocztowy, telefon, fax, godzina_otwarcia, godzina_zamkniecia, ad_id) 
					as (SELECT pl.pl_id, a.ad_kraj, a.ad_wojewodztwo, a.ad_miasto, a.ad_ulica, a.ad_nr_domu, a.ad_kod_pocztowy, pl.pl_telefon, pl.pl_fax, pl.pl_godzina_otwarcia, pl.pl_godzina_zamkniecia, pl.ad_id
					FROM placowki pl, adresy a WHERE pl.ad_id = a.ad_id)");

				$create_querry = $conn->query("create or replace view view_pracownicy (id,imie,nazwisko,plec,data_urodzenia,pesel,telefon,kraj,wojewodztwo,miasto,ulica,nr_domu,kod_pocztowy, przepracowane_godziny, stawka, nazwa_stanowiska, opis_stanowiska, premia, st_id, ad_id, if_id) 
					as (SELECT p.p_id, i.if_imie, i.if_nazwisko, i.if_plec, i.if_data_urodzenia, i.if_pesel, i.if_telefon, a.ad_kraj, a.ad_wojewodztwo, 
					a.ad_miasto, a.ad_ulica, a.ad_nr_domu, a.ad_kod_pocztowy, p.p_przepracowane_godziny, p.p_stawka, st.st_nazwa, st.st_opis, st.st_premia, p.st_id, i.ad_id, p.if_id  
					FROM pracownicy p, stanowiska st, informacje_osobowe i, adresy a WHERE p.if_id = i.if_id AND i.ad_id = a.ad_id AND p.st_id = st.st_id)");

				$create_querry = $conn->query("create or replace view view_samochody (id, numer_rejestracyjny, marka, model, generacja, typ, przebieg, paliwo, pojemnosc, 
					moc_km, moc_kw, masa_wlasna, kraj_produkcji, data_produkcji, data_pierwszej_rejestracji, data_rejestracji_w_kraju, ilosc_wlascicieli) 
					as (SELECT s.s_id, s.s_numer_rejestracyjny, s.s_marka, s.s_model, s.s_generacja, s.s_typ, dp.dp_przebieg, dp.dp_paliwo, dp.dp_pojemnosc,
					dp.dp_moc_km, dp.dp_moc_kw, dp.dp_masa_wlasna, pp.pp_kraj_produkcji, pp.pp_data_produkcji, pp.pp_data_pierwszej_rejestracji, pp.pp_data_rejestracji_w_kraju, pp.pp_ilosc_wlascicieli
					FROM samochody s, dane_pojazdow dp, produkcja_pojazdow pp WHERE s.dp_id = dp.dp_id AND s.pp_id = pp.pp_id )");

				$create_querry = $conn->query("create or replace view view_kontrole (id, numer_rejestracyjny, marka, imie_wlasciciela, nazwisko_wlasciciela, przebieg, wynik, lpg, hak, data_kontroli, data_nastepnej_kontroli, cena, stan_silnika, stan_hamulcy,
					stan_amortyzatorow, stan_zawieszenia, stan_zarowek, stan_lamp) 
					as (SELECT k.k_id, s.s_numer_rejestracyjny, s.s_marka, i.if_imie, i.if_nazwisko, dp.dp_przebieg, k.k_pozytywny, k.k_lpg, k.k_hak, k.k_data_kontroli, k.k_data_nastepnej_kontroli, k.k_cena, sp.sp_silnik, sp.sp_hamulce,
					sp.sp_amortyzatory, sp.sp_zawieszenie, sp.sp_zarowki, sp.sp_lampy
					FROM kontrole k, samochody s, dane_pojazdow dp, stany_pojazdow sp, wlasciciele w, informacje_osobowe i WHERE k.s_id = s.s_id AND s.dp_id = dp.dp_id AND s.sp_id = sp.sp_id AND s.w_id = w.w_id AND w.if_id = i.if_id )");

				$create_querry = $conn->query("create or replace view view_kontrole_week (id, numer_rejestracyjny, marka, imie_wlasciciela, nazwisko_wlasciciela, przebieg, wynik, lpg, hak, data_kontroli, data_nastepnej_kontroli, cena, stan_silnika, stan_hamulcy,
					stan_amortyzatorow, stan_zawieszenia, stan_zarowek, stan_lamp) 
					as (SELECT k.k_id, s.s_numer_rejestracyjny, s.s_marka, i.if_imie, i.if_nazwisko, dp.dp_przebieg, k.k_pozytywny, k.k_lpg, k.k_hak, k.k_data_kontroli, k.k_data_nastepnej_kontroli, k.k_cena, sp.sp_silnik, sp.sp_hamulce,
					sp.sp_amortyzatory, sp.sp_zawieszenie, sp.sp_zarowki, sp.sp_lampy
					FROM kontrole k, samochody s, dane_pojazdow dp, stany_pojazdow sp, wlasciciele w, informacje_osobowe i WHERE k.s_id = s.s_id AND s.dp_id = dp.dp_id AND s.sp_id = sp.sp_id AND s.w_id = w.w_id AND w.if_id = i.if_id AND k.k_data_kontroli > DATE_SUB(NOW(), INTERVAL 7 DAY))");

				$create_querry = $conn->query("create or replace view view_utarg (id_placowki, kod_pocztowy, miasto, ulica, nr, data, utarg_dzienny) 
					as (SELECT DISTINCT pl.pl_id, ad.ad_kod_pocztowy, ad.ad_miasto, ad.ad_ulica, ad.ad_nr_domu, k.k_data_kontroli, SUM(k_cena)
					FROM placowki pl, pracownicy p, kontrole k, adresy ad WHERE pl.ad_id = ad.ad_id AND pl.pl_id = p.pl_id 
					AND p.p_id = k.p_id
					GROUP BY k.k_data_kontroli)");
				
				$create_querry = $conn->query("CREATE PROCEDURE zmiana_stawki (pr numeric(38,0), pid numeric(38,0))\n" . "BEGIN\n"
					. "	DECLARE st numeric(38,0)  DEFAULT  0;DECLARE tmp_p_stawka numeric(38,0);DECLARE tmp_p_id numeric(38,0);DECLARE cur_zs CURSOR FOR\n"
					. "		select p_id,p_stawka from pracownicy where p_id=pid;open cur_zs;Fetch cur_zs INTO tmp_p_id, tmp_p_stawka;SET st = tmp_p_stawka;Update pracownicy set pracownicy.p_stawka=st*((100+pr)/100) where p_id=tmp_p_id;close cur_zs;end;");

				$create_querry = $conn->query("CREATE PROCEDURE zmiana_premii (pr numeric(38,0), pid numeric(38,0))\n". "BEGIN\n"
					. "	DECLARE st numeric(38,0)  DEFAULT  0;DECLARE tmp_st_premia numeric(38,0);DECLARE tmp_st_id numeric(38,0);DECLARE cur_zs CURSOR FOR\n"
					. "		select s.st_id,s.st_premia from pracownicy p, stanowiska s where p.p_id=pid AND s.st_id = p.st_id;OPEN cur_zs;FETCH cur_zs INTO tmp_st_id, tmp_st_premia;SET st = tmp_st_premia;UPDATE stanowiska SET stanowiska.st_premia = st*((100+pr)/100) WHERE tmp_st_id = stanowiska.st_id;CLOSE cur_zs;end;");


				$create_querry = $conn->query("CREATE PROCEDURE zmiana_premii_st(pr numeric(38,0), stnazwa char(50))\n". "BEGIN\n"
					. "	DECLARE done numeric(38,0) DEFAULT 0;DECLARE tmp_st_premia numeric(38,0);DECLARE tmp_st_nazwa char(50);DECLARE tmp_st_id numeric(38,0);DECLARE cur_zs CURSOR FOR\n"
					. "		select st_id, st_nazwa,st_premia from stanowiska where st_nazwa=stnazwa;DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;OPEN cur_zs;WHILE done=0 DO\n"
					. "		FETCH cur_zs INTO tmp_st_id, tmp_st_nazwa, tmp_st_premia;UPDATE stanowiska SET stanowiska.st_premia = tmp_st_premia*((100+pr)/100) WHERE tmp_st_nazwa = stanowiska.st_nazwa AND tmp_st_id = stanowiska.st_id;END WHILE;CLOSE cur_zs;end;");


				$create_querry = $conn->query("CREATE PROCEDURE zmiana_stawki_st (pr numeric(38,0), stnazwa char(50))\n" . "BEGIN\n"
					. "	DECLARE done numeric(38,0) DEFAULT 0;DECLARE tmp_p_stawka numeric(38,0);DECLARE tmp_st_nazwa char(50);DECLARE tmp_p_id numeric(38,0);DECLARE cur_zs CURSOR FOR\n"
					. "		select p.p_id,s.st_nazwa,p.p_stawka from pracownicy p, stanowiska s where s.st_nazwa=stnazwa AND s.st_id = p.st_id;DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;OPEN cur_zs;WHILE done=0 DO\n"
					. "		FETCH cur_zs INTO tmp_p_id, tmp_st_nazwa, tmp_p_stawka;UPDATE pracownicy SET pracownicy.p_stawka = tmp_p_stawka*((100+pr)/100) WHERE tmp_p_id = pracownicy.p_id;END WHILE;CLOSE cur_zs;end;");


				$create_querry = $conn->query("CREATE PROCEDURE zmiana_ceny (pr numeric(38,0), lpg char(50), hak char(50)) 
					BEGIN
						DECLARE done numeric(38,0) DEFAULT 0;
						DECLARE tmp_k_id numeric(38,0);
						DECLARE tmp_k_lpg char(50);
						DECLARE tmp_k_hak char(50);
						DECLARE tmp_k_cena numeric(38,0);
						DECLARE cur_zs CURSOR FOR
							select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_lpg = 'TAK' AND k_hak = 'TAK';
						DECLARE cur_zs_l CURSOR FOR
							select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_lpg = 'TAK' AND k_hak = 'NIE';
						DECLARE cur_zs_h CURSOR FOR
							select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_hak = 'TAK' AND k_lpg = 'NIE';
						DECLARE cur_zs_b CURSOR FOR
							select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_hak = 'NIE' AND k_lpg = 'NIE';
						DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
						
						IF lpg = 'TAK' AND hak = 'NIE' THEN
							OPEN cur_zs_l;
							WHILE done=0 DO
								FETCH cur_zs_l INTO tmp_k_id, tmp_k_cena, tmp_k_lpg, tmp_k_hak;
								UPDATE kontrole SET kontrole.k_cena = tmp_k_cena*((100+pr)/100) WHERE tmp_k_id = kontrole.k_id;
							END WHILE;
							CLOSE cur_zs_l;
						ELSEIF hak = 'TAK' AND lpg = 'NIE' THEN
							OPEN cur_zs_h;
							WHILE done=0 DO
								FETCH cur_zs_h INTO tmp_k_id, tmp_k_cena, tmp_k_lpg, tmp_k_hak;
								UPDATE kontrole SET kontrole.k_cena = tmp_k_cena*((100+pr)/100) WHERE tmp_k_id = kontrole.k_id;
							END WHILE;
							CLOSE cur_zs_h;
						ELSEIF hak = 'TAK' AND lpg = 'TAK' THEN
							OPEN cur_zs;
							WHILE done=0 DO
								FETCH cur_zs INTO tmp_k_id, tmp_k_cena, tmp_k_lpg, tmp_k_hak;
								UPDATE kontrole SET kontrole.k_cena = tmp_k_cena*((100+pr)/100) WHERE tmp_k_id = kontrole.k_id;
							END WHILE;
							CLOSE cur_zs;
						ELSE
						 OPEN cur_zs_b;
							WHILE done=0 DO
								FETCH cur_zs_b INTO tmp_k_id, tmp_k_cena, tmp_k_lpg, tmp_k_hak;
								UPDATE kontrole SET kontrole.k_cena = tmp_k_cena*((100+pr)/100) WHERE tmp_k_id = kontrole.k_id;
							END WHILE;
							CLOSE cur_zs_b;
						END IF;
					end;");
				
			}
			
			if($create_querry > 0) {
				echo '<div class="text">Tabele zostaną dodane. </div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo '<div class="text">Wystąpił błąd, tabele nie zostaną dodane.</div><br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else {
			if(mysqli_num_rows($zapytanie)) {
				echo '<span class="belka2">BAZA DANYCH JEST UZUPEŁNIONA</span>';
			} else {
				echo '<div class="text">Czy na pewno chcesz uzupełnić bazę danych przygotowanymi tabelami? </div><br><br> <a href="dbcreate.php?id=1" class="belka2">UZUPEŁNIJ</a>';
			}
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