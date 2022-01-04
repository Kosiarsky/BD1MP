CREATE TABLE adresy (
    ad_id           INT NOT NULL,
    ad_kraj         CHAR(30),
    ad_wojewodztwo  CHAR(30),
    ad_miasto       CHAR(30),
    ad_ulica        CHAR(30),
    ad_nr_domu      INT,
    ad_kod_pocztowy CHAR(6)
);

ALTER TABLE adresy ADD CONSTRAINT ad_pk PRIMARY KEY ( ad_id );

CREATE TABLE dane_pojazdow (
    dp_id                         INT NOT NULL,
    dp_data_produkcji             DATE,
    dp_data_pierwszej_rejestracji DATE,
    dp_paliwo                     CHAR(10),
    dp_przebieg                   INT,
    dp_pojemnosc                  INT,
    dp_moc_km                     INT,
    dp_moc_nm                     INT,
    dp_masa_wlasna                INT
);

ALTER TABLE dane_pojazdow ADD CONSTRAINT dp_pk PRIMARY KEY ( dp_id );

CREATE TABLE informacje_osobowe (
    if_id             INT NOT NULL,
    if_imie           CHAR(15),
    if_nazwisko       CHAR(30),
    if_plec           CHAR(15),
    if_data_urodzenia DATE,
    if_pesel          INT,
    if_telefon        INT,
    ad_id             INT NOT NULL
);

ALTER TABLE informacje_osobowe ADD CONSTRAINT if_pk PRIMARY KEY ( if_id );
ALTER TABLE informacje_osobowe ADD CONSTRAINT if_unique UNIQUE ( if_pesel, if_telefon );

CREATE TABLE kontrole (
    k_id                      INT NOT NULL,
    k_pozytywny               CHAR(3),
    k_lpg                     CHAR(3),
    k_hak                     CHAR(3),
    k_data_kontroli           DATE,
    k_data_nastepnej_kontroli DATE,
    k_cena                    INT,
    p_id                      INT NOT NULL,
    s_id                      INT NOT NULL
);

ALTER TABLE kontrole ADD CONSTRAINT k_pk PRIMARY KEY ( k_id );
ALTER TABLE kontrole ADD CONSTRAINT poz_check CHECK (k_pozytywny IN ('TAK', 'NIE'));
ALTER TABLE kontrole ADD CONSTRAINT lpg_check CHECK (k_lpg IN ('TAK', 'NIE'));
ALTER TABLE kontrole ADD CONSTRAINT hak_check CHECK (k_hak IN ('TAK', 'NIE'));

CREATE TABLE placowki (
    pl_id                 INT NOT NULL,
    pl_telefon            INT,
    pl_fax                INT,
    pl_godzina_otwarcia   DATE,
    pl_godzina_zamkniecia DATE,
    ad_id                 INT NOT NULL
);

ALTER TABLE placowki ADD CONSTRAINT pl_pk PRIMARY KEY ( pl_id );
ALTER TABLE placowki ADD CONSTRAINT ad_unique UNIQUE ( ad_id );

CREATE TABLE pracownicy (
    p_id                    INT NOT NULL,
    p_przepracowane_godziny INT,
    p_stawka                INT,
    pl_id                   INT NOT NULL,
    if_id                   INT NOT NULL,
    st_id                   INT NOT NULL
);

ALTER TABLE pracownicy ADD CONSTRAINT p_pk PRIMARY KEY ( p_id );
ALTER TABLE pracownicy ADD CONSTRAINT p_unique UNIQUE ( if_id, st_id );

CREATE TABLE produkcja_pojazdow (
    pp_id                         INT NOT NULL,
    pp_kraj_produkcji             CHAR(30),
    pp_data_produkcji             DATE,
    pp_data_pierwszej_rejestracji DATE,
    pp_data_rejestracji_w_kraju   DATE,
    pp_ilosc_wlascicieli          INT
);

ALTER TABLE produkcja_pojazdow ADD CONSTRAINT pp_pk PRIMARY KEY ( pp_id );

CREATE TABLE samochody (
    s_id                  INT NOT NULL,
    s_typ                 CHAR(30),
    s_numer_rejestracyjny CHAR(30),
    s_marka               CHAR(30),
    s_model               CHAR(30),
    s_generacja           CHAR(30),
    w_id                  INT NOT NULL,
    pp_id                 INT NOT NULL,
    dp_id                 INT NOT NULL,
    sp_id                 INT NOT NULL
);

ALTER TABLE samochody ADD CONSTRAINT s_pk PRIMARY KEY ( s_id );
ALTER TABLE samochody ADD CONSTRAINT s_unique UNIQUE ( s_numer_rejestracyjny, pp_id, dp_id, sp_id );

CREATE TABLE stanowiska (
    st_id             INT NOT NULL,
    st_nazwa          CHAR(30),
    st_opis           CHAR(200),
    st_premia         INT,
    st_data_uzyskania DATE
);

ALTER TABLE stanowiska ADD CONSTRAINT st_pk PRIMARY KEY ( st_id );

CREATE TABLE stany_pojazdow (
    sp_id           INT NOT NULL,
    sp_silnik       CHAR(30),
    sp_hamulce      CHAR(30),
    sp_amortyzatory CHAR(30),
    sp_zawieszenie  CHAR(30),
    sp_zarowki      CHAR(30),
    sp_lampy        CHAR(30)
);

ALTER TABLE stany_pojazdow ADD CONSTRAINT sp_pk PRIMARY KEY ( sp_id );

CREATE TABLE wlasciciele (
    w_id                  INT NOT NULL,
    w_data_prawa_jazdy    DATE,
    w_waznosc_prawa_jazdy DATE,
    w_ilosc_samochodow    INT,
    w_procent_znizek_oc   INT,
    if_id                 INT NOT NULL
);

ALTER TABLE wlasciciele ADD CONSTRAINT w_pk PRIMARY KEY ( w_id );
ALTER TABLE wlasciciele ADD CONSTRAINT w_unique UNIQUE ( if_id );

CREATE TABLE zmiany_pracownicze (
    zp_id                  INT NOT NULL,
    zp_data                DATE,
    zp_godzina_rozpoczecia DATE,
    zp_godzina_zakonczenia DATE,
    zp_liczba_kontroli     INT,
    zp_przerwa             CHAR(3),
    p_id                   INT NOT NULL
);

ALTER TABLE zmiany_pracownicze ADD CONSTRAINT zp_pk PRIMARY KEY ( zp_id );
ALTER TABLE zmiany_pracownicze ADD CONSTRAINT przrwa_check CHECK (zp_przerwa IN ('TAK', 'NIE'));

ALTER TABLE informacje_osobowe
    ADD CONSTRAINT ifad_fk FOREIGN KEY ( ad_id )
        REFERENCES adresy ( ad_id );

ALTER TABLE kontrole
    ADD CONSTRAINT kp_fk FOREIGN KEY ( p_id )
        REFERENCES pracownicy ( p_id );

ALTER TABLE kontrole
    ADD CONSTRAINT ks_fk FOREIGN KEY ( s_id )
        REFERENCES samochody ( s_id );

ALTER TABLE placowki
    ADD CONSTRAINT pa_fk FOREIGN KEY ( ad_id )
        REFERENCES adresy ( ad_id );

ALTER TABLE pracownicy
    ADD CONSTRAINT pif_fk FOREIGN KEY ( if_id )
        REFERENCES informacje_osobowe ( if_id );

ALTER TABLE pracownicy
    ADD CONSTRAINT ppl_fk FOREIGN KEY ( pl_id )
        REFERENCES placowki ( pl_id );

ALTER TABLE pracownicy
    ADD CONSTRAINT pst_fk FOREIGN KEY ( st_id )
        REFERENCES stanowiska ( st_id );

ALTER TABLE samochody
    ADD CONSTRAINT sdp_fk FOREIGN KEY ( dp_id )
        REFERENCES dane_pojazdow ( dp_id );

ALTER TABLE samochody
    ADD CONSTRAINT spp_fk FOREIGN KEY ( pp_id )
        REFERENCES produkcja_pojazdow ( pp_id );

ALTER TABLE samochody
    ADD CONSTRAINT ssp_fk FOREIGN KEY ( sp_id )
        REFERENCES stany_pojazdow ( sp_id );

ALTER TABLE samochody
    ADD CONSTRAINT sw_fk FOREIGN KEY ( w_id )
        REFERENCES wlasciciele ( w_id );

ALTER TABLE wlasciciele
    ADD CONSTRAINT wif_fk FOREIGN KEY ( if_id )
        REFERENCES informacje_osobowe ( if_id );

ALTER TABLE zmiany_pracownicze
    ADD CONSTRAINT zpp_fk FOREIGN KEY ( p_id )
        REFERENCES pracownicy ( p_id );

