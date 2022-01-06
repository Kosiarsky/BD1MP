<?php 
session_start(); 
require_once('connection.php'); 
connection(); 
if($_SESSION['auth'] == TRUE) {
include "header.php";   
?>
	<div class="belka">UZUPEŁNIJ BAZE DANYCH PRZYGOTOWANYMI TABELAMI</div>
	<div style="margin:24px; text-align: center;">
		<?php	
		$id = $_GET["id"];
		$zapytanie = mysql_query("SHOW TABLES In ".$mysql_dbb." WHERE tables_in_".$mysql_dbb." != 'php_admin'");
			
		if($id == 1) {

			if(mysql_num_rows($zapytanie))
			{
				echo '<span class="belka2">BAZA DANYCH JEST UZUPEŁNIONA</span>';
			} else {
				$create_querry = mysql_query("CREATE TABLE adresy (
					ad_id           INTEGER NOT NULL,
					ad_kraj         CHAR(30),
					ad_wojewodztwo  CHAR(30),
					ad_miasto       CHAR(30),
					ad_ulica        CHAR(30),
					ad_nr_domu      INTEGER,
					ad_kod_pocztowy CHAR(6)
				)");

				$create_querry = mysql_query("ALTER TABLE adresy ADD CONSTRAINT ad_pk PRIMARY KEY ( ad_id )");

				$create_querry = mysql_query("CREATE TABLE dane_pojazdow (
					dp_id                         INTEGER NOT NULL,
					dp_paliwo                     CHAR(10),
					dp_przebieg                   INTEGER,
					dp_pojemnosc                  CHAR(3),
					dp_moc_km                     INTEGER,
					dp_moc_kw                     INTEGER,
					dp_masa_wlasna                INTEGER,
					dp_skrzynia_biegow            CHAR(20)
				)");

				$create_querry = mysql_query("ALTER TABLE dane_pojazdow ADD CONSTRAINT dp_pk PRIMARY KEY ( dp_id )");

				$create_querry = mysql_query("CREATE TABLE informacje_osobowe (
					if_id             INTEGER NOT NULL,
					if_imie           CHAR(15),
					if_nazwisko       CHAR(30),
					if_plec           CHAR(15),
					if_data_urodzenia DATE,
					if_pesel          CHAR(11),
					if_telefon        CHAR(9),
					ad_id             INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE informacje_osobowe ADD CONSTRAINT if_pk PRIMARY KEY ( if_id )");
				$create_querry = mysql_query("ALTER TABLE informacje_osobowe ADD CONSTRAINT if_unique UNIQUE ( if_pesel, if_telefon )");
				$create_querry = mysql_query("ALTER TABLE informacje_osobowe ADD CONSTRAINT plec_check CHECK (if_plec IN ('Mezczyzna', 'Kobieta'))");

				$create_querry = mysql_query("CREATE TABLE kontrole (
					k_id                      INTEGER NOT NULL,
					k_pozytywny               CHAR(3),
					k_lpg                     CHAR(3),
					k_hak                     CHAR(3),
					k_data_kontroli           DATE,
					k_data_nastepnej_kontroli DATE,
					k_cena                    INTEGER,
					p_id                      INTEGER NOT NULL,
					s_id                      INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE kontrole ADD CONSTRAINT k_pk PRIMARY KEY ( k_id )");
				$create_querry = mysql_query("ALTER TABLE kontrole ADD CONSTRAINT poz_check CHECK (k_pozytywny IN ('TAK', 'NIE'))");
				$create_querry = mysql_query("ALTER TABLE kontrole ADD CONSTRAINT lpg_check CHECK (k_lpg IN ('TAK', 'NIE'))");
				$create_querry = mysql_query("ALTER TABLE kontrole ADD CONSTRAINT hak_check CHECK (k_hak IN ('TAK', 'NIE'))");

				$create_querry = mysql_query("CREATE TABLE placowki (
					pl_id                 INTEGER NOT NULL,
					pl_telefon            CHAR(9),
					pl_fax                CHAR(12),
					pl_godzina_otwarcia   CHAR(5),
					pl_godzina_zamkniecia CHAR(5),
					ad_id                 INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE placowki ADD CONSTRAINT pl_pk PRIMARY KEY ( pl_id )");
				$create_querry = mysql_query("ALTER TABLE placowki ADD CONSTRAINT ad_unique UNIQUE ( ad_id )");

				$create_querry = mysql_query("CREATE TABLE pracownicy (
					p_id                    INTEGER NOT NULL,
					p_przepracowane_godziny INTEGER,
					p_stawka                INTEGER,
					pl_id                   INTEGER NOT NULL,
					if_id                   INTEGER NOT NULL,
					st_id                   INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE pracownicy ADD CONSTRAINT p_pk PRIMARY KEY ( p_id )");
				$create_querry = mysql_query("ALTER TABLE pracownicy ADD CONSTRAINT p_unique UNIQUE ( if_id, st_id )");

				$create_querry = mysql_query("CREATE TABLE produkcja_pojazdow (
					pp_id                         INTEGER NOT NULL,
					pp_kraj_produkcji             CHAR(30),
					pp_data_produkcji             DATE,
					pp_data_pierwszej_rejestracji DATE,
					pp_data_rejestracji_w_kraju   DATE,
					pp_ilosc_wlascicieli          INTEGER
				)");

				$create_querry = mysql_query("ALTER TABLE produkcja_pojazdow ADD CONSTRAINT pp_pk PRIMARY KEY ( pp_id )");

				$create_querry = mysql_query("CREATE TABLE samochody (
					s_id                  INTEGER NOT NULL,
					s_typ                 CHAR(30),
					s_numer_rejestracyjny CHAR(30),
					s_marka               CHAR(30),
					s_model               CHAR(30),
					s_generacja           CHAR(30),
					w_id                  INTEGER NOT NULL,
					pp_id                 INTEGER NOT NULL,
					dp_id                 INTEGER NOT NULL,
					sp_id                 INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE samochody ADD CONSTRAINT s_pk PRIMARY KEY ( s_id )");
				$create_querry = mysql_query("ALTER TABLE samochody ADD CONSTRAINT s_unique UNIQUE ( s_numer_rejestracyjny, pp_id, dp_id, sp_id )");

				$create_querry = mysql_query("CREATE TABLE stanowiska (
					st_id             INTEGER NOT NULL,
					st_nazwa          CHAR(30),
					st_opis           CHAR(200),
					st_premia         INTEGER,
					st_data_uzyskania DATE
				)");

				$create_querry = mysql_query("ALTER TABLE stanowiska ADD CONSTRAINT st_pk PRIMARY KEY ( st_id )");

				$create_querry = mysql_query("CREATE TABLE stany_pojazdow (
					sp_id           INTEGER NOT NULL,
					sp_silnik       CHAR(30),
					sp_hamulce      CHAR(30),
					sp_amortyzatory CHAR(30),
					sp_zawieszenie  CHAR(30),
					sp_zarowki      CHAR(30),
					sp_lampy        CHAR(30)
				)");

				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT sp_pk PRIMARY KEY ( sp_id )");
				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT silnik_check CHECK (sp_silnik IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT hamulce_check CHECK (sp_hamulce IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT amortyzatory_check CHECK (sp_amortyzatory IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT zawieszenie_check CHECK (sp_zawieszenie IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT zarowki_check CHECK (sp_zarowki IN ('SPRAWNE', 'NIESPRAWNE'))");
				$create_querry = mysql_query("ALTER TABLE stany_pojazdow ADD CONSTRAINT lampy_check CHECK (sp_lampy IN ('SPRAWNE', 'NIESPRAWNE'))");

				$create_querry = mysql_query("CREATE TABLE wlasciciele (
					w_id                  INTEGER NOT NULL,
					w_data_prawa_jazdy    DATE,
					w_waznosc_prawa_jazdy DATE,
					w_ilosc_samochodow    INTEGER,
					w_procent_znizek_oc   INTEGER,
					if_id                 INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE wlasciciele ADD CONSTRAINT w_pk PRIMARY KEY ( w_id )");
				$create_querry = mysql_query("ALTER TABLE wlasciciele ADD CONSTRAINT w_unique UNIQUE ( if_id )");

				$create_querry = mysql_query("CREATE TABLE zmiany_pracownicze (
					zp_id                  INTEGER NOT NULL,
					zp_data                DATE,
					zp_godzina_rozpoczecia CHAR(10),
					zp_godzina_zakonczenia CHAR(10),
					zp_liczba_kontroli     INTEGER,
					zp_przerwa             CHAR(3),
					p_id                   INTEGER NOT NULL
				)");

				$create_querry = mysql_query("ALTER TABLE zmiany_pracownicze ADD CONSTRAINT zp_pk PRIMARY KEY ( zp_id )");
				$create_querry = mysql_query("ALTER TABLE zmiany_pracownicze ADD CONSTRAINT przerwa_check CHECK (zp_przerwa IN ('TAK', 'NIE'))");

				$create_querry = mysql_query("ALTER TABLE informacje_osobowe
					ADD CONSTRAINT ifad_fk FOREIGN KEY ( ad_id )
						REFERENCES adresy ( ad_id )");

				$create_querry = mysql_query("ALTER TABLE kontrole
					ADD CONSTRAINT kp_fk FOREIGN KEY ( p_id )
						REFERENCES pracownicy ( p_id )");

				$create_querry = mysql_query("ALTER TABLE kontrole
					ADD CONSTRAINT ks_fk FOREIGN KEY ( s_id )
						REFERENCES samochody ( s_id )");

				$create_querry = mysql_query("ALTER TABLE placowki
					ADD CONSTRAINT pa_fk FOREIGN KEY ( ad_id )
						REFERENCES adresy ( ad_id )");

				$create_querry = mysql_query("ALTER TABLE pracownicy
					ADD CONSTRAINT pif_fk FOREIGN KEY ( if_id )
						REFERENCES informacje_osobowe ( if_id )");

				$create_querry = mysql_query("ALTER TABLE pracownicy
					ADD CONSTRAINT ppl_fk FOREIGN KEY ( pl_id )
						REFERENCES placowki ( pl_id )");

				$create_querry = mysql_query("ALTER TABLE pracownicy
					ADD CONSTRAINT pst_fk FOREIGN KEY ( st_id )
						REFERENCES stanowiska ( st_id )");

				$create_querry = mysql_query("ALTER TABLE samochody
					ADD CONSTRAINT sdp_fk FOREIGN KEY ( dp_id )
						REFERENCES dane_pojazdow ( dp_id )");

				$create_querry = mysql_query("ALTER TABLE samochody
					ADD CONSTRAINT spp_fk FOREIGN KEY ( pp_id )
						REFERENCES produkcja_pojazdow ( pp_id )");

				$create_querry = mysql_query("ALTER TABLE samochody
					ADD CONSTRAINT ssp_fk FOREIGN KEY ( sp_id )
						REFERENCES stany_pojazdow ( sp_id )");

				$create_querry = mysql_query("ALTER TABLE samochody
					ADD CONSTRAINT sw_fk FOREIGN KEY ( w_id )
						REFERENCES wlasciciele ( w_id )");

				$create_querry = mysql_query("ALTER TABLE wlasciciele
					ADD CONSTRAINT wif_fk FOREIGN KEY ( if_id )
						REFERENCES informacje_osobowe ( if_id )");

				$create_querry = mysql_query("ALTER TABLE zmiany_pracownicze
					ADD CONSTRAINT zpp_fk FOREIGN KEY ( p_id )
						REFERENCES pracownicy ( p_id )"); 
						
			}
			
			if($create_querry > 0) {
				echo 'Tabele zostaną dodane. <br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			} else {
				echo 'Wystąpił błąd, tabele nie zostaną dodane.<br><br> <a href="javascript: history.go(-1)" class="belka2">Powrót</a>';
			}
		} else {
			if(mysql_num_rows($zapytanie)) {
				echo '<span class="belka2">BAZA DANYCH JEST UZUPEŁNIONA</span>';
			} else {
				echo 'Czy na pewno chcesz uzupełnić bazę danych przygotowanymi tabelami? <br><br> <a href="dbcreate.php?id=1" class="belka2">UZUPEŁNIJ</a>';
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