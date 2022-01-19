DROP SEQUENCE adresy_seq;
DROP SEQUENCE informacje_seq;
DROP SEQUENCE placowki_seq;
DROP SEQUENCE pracownicy_seq;
DROP SEQUENCE zmiany_pr_seq;
DROP SEQUENCE kontrole_seq;

CREATE SEQUENCE adresy_seq START WITH 1;
CREATE SEQUENCE informacje_seq START WITH 1;
CREATE SEQUENCE placowki_seq START WITH 1;
CREATE SEQUENCE pracownicy_seq START WITH 1;
CREATE SEQUENCE zmiany_pr_seq START WITH 1;
CREATE SEQUENCE kontrole_seq START WITH 1;

CREATE OR REPLACE TRIGGER adresy_bir 
BEFORE INSERT ON adresy 
FOR EACH ROW

BEGIN
  SELECT adresy_seq.NEXTVAL
  INTO   :new.ad_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER informacje_bir 
BEFORE INSERT ON informacje_osobowe 
FOR EACH ROW

BEGIN
  SELECT informacje_seq.NEXTVAL
  INTO   :new.if_id
  FROM   dual;
  
  SELECT adresy_seq.CURRVAL
  INTO   :new.ad_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER placowki_bir
BEFORE INSERT ON placowki 
FOR EACH ROW

BEGIN
  SELECT placowki_seq.NEXTVAL
  INTO   :new.pl_id
  FROM   dual;
  
  SELECT adresy_seq.CURRVAL
  INTO   :new.ad_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER stanowiska_bir 
BEFORE INSERT ON stanowiska 
FOR EACH ROW

BEGIN
  SELECT pracownicy_seq.NEXTVAL
  INTO   :new.st_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER pracownicy_bir
BEFORE INSERT ON pracownicy 
FOR EACH ROW

BEGIN
  SELECT pracownicy_seq.CURRVAL
  INTO   :new.p_id
  FROM   dual;
  
  SELECT informacje_seq.CURRVAL
  INTO   :new.if_id
  FROM   dual;
  
  SELECT pracownicy_seq.CURRVAL
  INTO   :new.st_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER stany_pojazdow_bir 
BEFORE INSERT ON stany_pojazdow
FOR EACH ROW

BEGIN
  SELECT kontrole_seq.NEXTVAL
  INTO   :new.sp_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER dane_pojazdow_bir 
BEFORE INSERT ON dane_pojazdow
FOR EACH ROW

BEGIN
  SELECT kontrole_seq.CURRVAL
  INTO   :new.dp_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER produkcja_pojazdow_bir 
BEFORE INSERT ON produkcja_pojazdow
FOR EACH ROW

BEGIN
  SELECT kontrole_seq.CURRVAL
  INTO   :new.pp_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER kontrole_bir
BEFORE INSERT ON kontrole 
FOR EACH ROW

BEGIN
  SELECT kontrole_seq.CURRVAL
  INTO   :new.k_id
  FROM   dual;
  
  SELECT kontrole_seq.CURRVAL
  INTO   :new.s_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER samochody_bir
BEFORE INSERT ON samochody 
FOR EACH ROW

BEGIN
  SELECT kontrole_seq.CURRVAL
  INTO   :new.s_id
  FROM   dual;
  
  SELECT kontrole_seq.CURRVAL
  INTO   :new.w_id
  FROM   dual;
  
  SELECT kontrole_seq.CURRVAL
  INTO   :new.sp_id
  FROM   dual;
  
  SELECT kontrole_seq.CURRVAL
  INTO   :new.dp_id
  FROM   dual;
  
  SELECT kontrole_seq.CURRVAL
  INTO   :new.pp_id
  FROM   dual;
END;
/

CREATE OR REPLACE TRIGGER wlasciciele_bir
BEFORE INSERT ON wlasciciele 
FOR EACH ROW

BEGIN
  SELECT kontrole_seq.CURRVAL
  INTO   :new.w_id
  FROM   dual;
  
  SELECT informacje_seq.CURRVAL
  INTO   :new.if_id
  FROM   dual;
END;
/



CREATE OR REPLACE TRIGGER zmiany_pracownicze_bir 
BEFORE INSERT ON zmiany_pracownicze 
FOR EACH ROW

BEGIN
  SELECT zmiany_pr_seq.NEXTVAL
  INTO   :new.zp_id
  FROM   dual;
END;
/


/* ADD PLACOWKI */

INSERT INTO adresy (  ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES (  'Polska', 'Swietokrzyskie', 'Kielce', 'Legnicka', '90', '25-350' );
INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia ) VALUES ( '952654982', '057420981233', '9:00', '20:00' );

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES ( 'Polska', 'Swietokrzyskie', 'Kielce', 'Legnicka', '90', '25-350' );
INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia ) VALUES ( '922654982', '657420981233', '9:00', '20:00' );

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES ( 'Polska', 'Swietokrzyskie', 'Kielce', 'Legnicka', '90', '25-350' );
INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia ) VALUES ( '952254982', '057424981233', '9:00', '20:00' );

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy ) VALUES ( 'Polska', 'Swietokrzyskie', 'Kielce', 'Legnicka', '90', '25-350' );
INSERT INTO placowki ( pl_telefon, pl_fax, pl_godzina_otwarcia, pl_godzina_zamkniecia ) VALUES ( '952654922', '057420981283', '9:00', '20:00' );

/* ADD PRACOWNIK */

INSERT INTO adresy (ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( 'Polska', 'Swietokrzyskie', 'Kielce', '3maja','42','25-004');
INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon) VALUES ( 'Janusz', 'Kowalski', 'Mezczyzna', TO_DATE('2001/12/15','yyyy/mm/dd'), '91239432612', '194231512');
INSERT INTO stanowiska ( st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES ( 'Kierownik', 'cos', 900, TO_DATE('2021/12/19','yyyy/mm/dd'));
INSERT INTO pracownicy ( p_przepracowane_godziny, p_stawka, pl_id) VALUES ( 240, 4500,1);

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( 'Polska', 'Malopolskie', 'Krakow', 'Grunwaldzka', '193', '28-500');
INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon) VALUES ( 'Malgorzata', 'Wlodarczyk', 'Kobieta', TO_DATE('1986/04/12','yyyy/mm/dd'), '15324512421', '031532351');
INSERT INTO stanowiska ( st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES ( 'Mechanik', 'ra', 500, TO_DATE('2020/04/11','yyyy/mm/dd'));
INSERT INTO pracownicy ( p_przepracowane_godziny, p_stawka, pl_id) VALUES ( 250, 3200,2);

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( 'Polska', 'Malopolskie', 'Krakow', 'Pilsudskiego', '512', '28-500');
INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon) VALUES ( 'Ida', 'Czerwinska', 'Kobieta', TO_DATE('1974/11/11','yyyy/mm/dd'), '63417851231', '734164143');
INSERT INTO stanowiska ( st_nazwa, st_opis, st_premia, st_data_uzyskania) VALUES ( 'Mechanik', 'd', 450, TO_DATE('2019/11/04','yyyy/mm/dd'));
INSERT INTO pracownicy ( p_przepracowane_godziny, p_stawka, pl_id) VALUES ( 300, 3300,3);


/* ADD ZMIANY PRACOWNIKÓW */

INSERT INTO zmiany_pracownicze ( zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES ( TO_DATE('2021/12/20','yyyy/mm/dd'),'09:00','15:00',13,'TAK',1);
INSERT INTO zmiany_pracownicze ( zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES ( TO_DATE('2021/12/20','yyyy/mm/dd'),'09:00','15:00',12,'TAK',2);
INSERT INTO zmiany_pracownicze ( zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES ( TO_DATE('2021/12/20','yyyy/mm/dd'),'15:00','21:00',21,'TAK',3);
INSERT INTO zmiany_pracownicze ( zp_data, zp_godzina_rozpoczecia, zp_godzina_zakonczenia, zp_liczba_kontroli, zp_przerwa, p_id) VALUES ( TO_DATE('2021/12/21','yyyy/mm/dd'),'09:00','15:00',13,'TAK',2);

/* ADD KONTROLE */

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( 'Polska', 'Swietokrzyskie', 'Kielce', 'Kozackiego', '162', '25-008');
INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon) VALUES ( 'Edward', 'Malinowski', 'Mezczyzna', TO_DATE('1981/01/30','yyyy/mm/dd'), '16352710534', '158324153');
INSERT INTO stany_pojazdow ( sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES ( 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'SPRAWNE');
INSERT INTO dane_pojazdow ( dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES ('Benzyna',200900,'2.0',150,129,1654300,'manualna');
INSERT INTO produkcja_pojazdow ( pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES ( 'Japonia', TO_DATE('2009/05/19','yyyy/mm/dd'), TO_DATE('2009/07/24','yyyy/mm/dd'),TO_DATE('2012/03/21','yyyy/mm/dd'),3);
INSERT INTO wlasciciele ( w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc) VALUES ( TO_DATE('2002/04/29','yyyy/mm/dd'), TO_DATE('2026/05/19','yyyy/mm/dd'),2,30);
INSERT INTO samochody ( s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja) VALUES ( 'Sedan', 'TKI0270', 'Opel', 'Vectra', 'A');
INSERT INTO kontrole ( k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id) VALUES ('TAK','TAK','TAK', TO_DATE('2021/12/20','yyyy/mm/dd'), TO_DATE('2022/12/20','yyyy/mm/dd'),900,001);

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( 'Polska', 'Swietokrzyskie', 'Starachowice', 'Polna' ,'242', '23-243');
INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon) VALUES ( 'Juliusz', 'Czarnecki', 'Mezczyzna', TO_DATE('1954/06/23','yyyy/mm/dd'), '10425194231', '092512093');
INSERT INTO stany_pojazdow ( sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES ( 'SPRAWNE', 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'NIESPRAWNE', 'SPRAWNE');
INSERT INTO dane_pojazdow ( dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES ('Diesel',150500,'1.6',98,60,1300000,'manualna');
INSERT INTO produkcja_pojazdow ( pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES ( 'Niemcy', TO_DATE('2008/12/11','yyyy/mm/dd'), TO_DATE('2009/01/23','yyyy/mm/dd'),TO_DATE('2012/05/23','yyyy/mm/dd'),2);
INSERT INTO wlasciciele ( w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc) VALUES ( TO_DATE('2001/05/21','yyyy/mm/dd'), TO_DATE('2026/03/11','yyyy/mm/dd'),3,25);
INSERT INTO samochody ( s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja) VALUES ( 'Hatchbag', 'TKA70US', 'Mazda', '6', 'II');
INSERT INTO kontrole ( k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id) VALUES ('NIE','NIE','NIE', TO_DATE('2021/12/20','yyyy/mm/dd'), TO_DATE('2022/12/20','yyyy/mm/dd'),1200,002);

INSERT INTO adresy ( ad_kraj, ad_wojewodztwo, ad_miasto, ad_ulica, ad_nr_domu, ad_kod_pocztowy) VALUES ( 'Polska', 'Swietokrzyskie', 'Pinczow', 'Kwiatowa', '423', '15-243');
INSERT INTO informacje_osobowe ( if_imie, if_nazwisko, if_plec, if_data_urodzenia, if_pesel, if_telefon) VALUES ( 'Konrad', 'Krupa', 'Mezczyzna', TO_DATE('1999/09/09','yyyy/mm/dd'), '17351251231', '523762143');
INSERT INTO stany_pojazdow ( sp_silnik, sp_hamulce, sp_amortyzatory, sp_zawieszenie, sp_zarowki, sp_lampy) VALUES ( 'SPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE', 'NIESPRAWNE', 'SPRAWNE');
INSERT INTO dane_pojazdow ( dp_paliwo, dp_przebieg, dp_pojemnosc, dp_moc_km, dp_moc_kw, dp_masa_wlasna, dp_skrzynia_biegow) VALUES ('Benzyna',180490,'1.8',180,150,2100000,'automatyczna');
INSERT INTO produkcja_pojazdow ( pp_kraj_produkcji, pp_data_produkcji, pp_data_pierwszej_rejestracji, pp_data_rejestracji_w_kraju, pp_ilosc_wlascicieli) VALUES ( 'Niemcy', TO_DATE('2012/01/13','yyyy/mm/dd'), TO_DATE('2012/02/18','yyyy/mm/dd'),TO_DATE('2015/11/11','yyyy/mm/dd'),1);
INSERT INTO wlasciciele ( w_data_prawa_jazdy, w_waznosc_prawa_jazdy, w_ilosc_samochodow, w_procent_znizek_oc) VALUES ( TO_DATE('1999/08/19','yyyy/mm/dd'), TO_DATE('2021/11/13','yyyy/mm/dd'),1,30);
INSERT INTO samochody ( s_typ, s_numer_rejestracyjny, s_marka, s_model, s_generacja) VALUES ( 'Hatchbag', 'TKI23AB', 'Volkswagen', 'Polo', 'IV');
INSERT INTO kontrole ( k_pozytywny, k_lpg, k_hak, k_data_kontroli, k_data_nastepnej_kontroli, k_cena, p_id) VALUES ('TAK','NIE','TAK', TO_DATE('2021/12/21','yyyy/mm/dd'), TO_DATE('2022/12/20','yyyy/mm/dd'),1500,003);
