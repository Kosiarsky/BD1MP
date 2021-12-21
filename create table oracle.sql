CREATE TABLE adresy (
    ad_id           NUMBER NOT NULL,
    ad_kraj         VARCHAR2(30),
    ad_wojewodztwo  VARCHAR2(30),
    ad_miasto       VARCHAR2(30),
    ad_ulica        VARCHAR2(30),
    ad_nr_domu      NUMBER,
    ad_kod_pocztowy VARCHAR2(6)
);

ALTER TABLE adresy ADD CONSTRAINT ad_pk PRIMARY KEY ( ad_id );

CREATE TABLE dane_pojazdow (
    dp_id                         NUMBER NOT NULL,
    dp_data_produkcji             DATE,
    dp_data_pierwszej_rejestracji DATE,
    dp_paliwo                     VARCHAR2(10),
    dp_przebieg                   NUMBER,
    dp_pojemnosc                  NUMBER,
    dp_moc_km                     NUMBER,
    dp_moc_nm                     NUMBER,
    dp_masa_wlasna                NUMBER
);

ALTER TABLE dane_pojazdow ADD CONSTRAINT dp_pk PRIMARY KEY ( dp_id );

CREATE TABLE informacje_osobowe (
    if_id             NUMBER NOT NULL,
    if_imie           VARCHAR2(15),
    if_nazwisko       VARCHAR2(30),
    if_plec           VARCHAR2(15),
    if_data_urodzenia DATE,
    if_pesel          NUMBER,
    if_telefon        NUMBER,
    ad_id             NUMBER NOT NULL
);

ALTER TABLE informacje_osobowe ADD CONSTRAINT if_pk PRIMARY KEY ( if_id );
ALTER TABLE informacje_osobowe ADD CONSTRAINT if_unique UNIQUE ( if_pesel, if_telefon );

CREATE TABLE kontrole (
    k_id                      NUMBER NOT NULL,
    k_pozytywny               VARCHAR2(3),
    k_lpg                     VARCHAR2(3),
    k_hak                     VARCHAR2(3),
    k_data_kontroli           DATE,
    k_data_nastepnej_kontroli DATE,
    k_cena                    NUMBER,
    p_id                      NUMBER NOT NULL,
    s_id                      NUMBER NOT NULL
);

ALTER TABLE kontrole ADD CONSTRAINT k_pk PRIMARY KEY ( k_id );
ALTER TABLE kontrole ADD CONSTRAINT poz_check CHECK (k_pozytywny IN ('TAK', 'NIE'));
ALTER TABLE kontrole ADD CONSTRAINT lpg_check CHECK (k_lpg IN ('TAK', 'NIE'));
ALTER TABLE kontrole ADD CONSTRAINT hak_check CHECK (k_hak IN ('TAK', 'NIE'));

CREATE TABLE placowki (
    pl_id                 NUMBER NOT NULL,
    pl_telefon            NUMBER,
    pl_fax                NUMBER,
    pl_godzina_otwarcia   DATE,
    pl_godzina_zamkniecia DATE,
    ad_id                 NUMBER NOT NULL
);

ALTER TABLE placowki ADD CONSTRAINT pl_pk PRIMARY KEY ( pl_id );
ALTER TABLE placowki ADD CONSTRAINT ad_unique UNIQUE ( ad_id );

CREATE TABLE pracownicy (
    p_id                    NUMBER NOT NULL,
    p_przepracowane_godziny NUMBER,
    p_stawka                NUMBER,
    pl_id                   NUMBER NOT NULL,
    if_id                   NUMBER NOT NULL,
    st_id                   NUMBER NOT NULL
);

ALTER TABLE pracownicy ADD CONSTRAINT p_pk PRIMARY KEY ( p_id );
ALTER TABLE pracownicy ADD CONSTRAINT p_unique UNIQUE ( if_id, st_id );

CREATE TABLE produkcja_pojazdow (
    pp_id                         NUMBER NOT NULL,
    pp_kraj_produkcji             VARCHAR2(30),
    pp_data_produkcji             DATE,
    pp_data_pierwszej_rejestracji DATE,
    pp_data_rejestracji_w_kraju   DATE,
    pp_ilosc_wlascicieli          NUMBER
);

ALTER TABLE produkcja_pojazdow ADD CONSTRAINT pp_pk PRIMARY KEY ( pp_id );

CREATE TABLE samochody (
    s_id                  NUMBER NOT NULL,
    s_typ                 VARCHAR2(30),
    s_numer_rejestracyjny VARCHAR2(30),
    s_marka               VARCHAR2(30),
    s_model               VARCHAR2(30),
    s_generacja           VARCHAR2(30),
    w_id                  NUMBER NOT NULL,
    pp_id                 NUMBER NOT NULL,
    dp_id                 NUMBER NOT NULL,
    sp_id                 NUMBER NOT NULL
);

ALTER TABLE samochody ADD CONSTRAINT s_pk PRIMARY KEY ( s_id );
ALTER TABLE samochody ADD CONSTRAINT s_unique UNIQUE ( s_numer_rejestracyjny, pp_id, dp_id, sp_id );

CREATE TABLE stanowiska (
    st_id             NUMBER NOT NULL,
    st_nazwa          VARCHAR2(30),
    st_opis           VARCHAR2(200),
    st_premia         NUMBER,
    st_data_uzyskania DATE
);

ALTER TABLE stanowiska ADD CONSTRAINT st_pk PRIMARY KEY ( st_id );

CREATE TABLE stany_pojazdow (
    sp_id           NUMBER NOT NULL,
    sp_silnik       VARCHAR2(30),
    sp_hamulce      VARCHAR2(30),
    sp_amortyzatory VARCHAR2(30),
    sp_zawieszenie  VARCHAR2(30),
    sp_zarowki      VARCHAR2(30),
    sp_lampy        VARCHAR2(30)
);

ALTER TABLE stany_pojazdow ADD CONSTRAINT sp_pk PRIMARY KEY ( sp_id );

CREATE TABLE wlasciciele (
    w_id                  NUMBER NOT NULL,
    w_data_prawa_jazdy    DATE,
    w_waznosc_prawa_jazdy DATE,
    w_ilosc_samochodow    NUMBER,
    w_procent_znizek_oc   NUMBER,
    if_id                 NUMBER NOT NULL
);

ALTER TABLE wlasciciele ADD CONSTRAINT w_pk PRIMARY KEY ( w_id );
ALTER TABLE wlasciciele ADD CONSTRAINT w_unique UNIQUE ( if_id );

CREATE TABLE zmiany_pracownicze (
    zp_id                  NUMBER NOT NULL,
    zp_data                DATE,
    zp_godzina_rozpoczecia DATE,
    zp_godzina_zakonczenia DATE,
    zp_liczba_kontroli     NUMBER,
    zp_przerwa             VARCHAR2(3),
    p_id                   NUMBER NOT NULL
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