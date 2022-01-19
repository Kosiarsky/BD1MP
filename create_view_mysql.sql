create or replace view view_wlasciciele (id,imie,nazwisko,plec,data_urodzenia,pesel,telefon,kraj,wojewodztwo,miasto,ulica,nr_domu,kod_pocztowy,data_otrzymania_prawa_jazdy,
	waznosc_prawa_jazdy,ilosc_samochodow,procent_znizek_oc, ad_id, if_id) 
	as (SELECT w.w_id, i.if_imie, i.if_nazwisko, i.if_plec, i.if_data_urodzenia, i.if_pesel, i.if_telefon, a.ad_kraj, a.ad_wojewodztwo, a.ad_miasto, a.ad_ulica, a.ad_nr_domu, a.ad_kod_pocztowy, 
	w.w_data_prawa_jazdy, w.w_waznosc_prawa_jazdy, w.w_ilosc_samochodow, w.w_procent_znizek_oc, i.ad_id, w.if_id  FROM wlasciciele w, informacje_osobowe i, adresy a WHERE w.if_id = i.if_id AND i.ad_id = a.ad_id);

create or replace view view_placowki (id,kraj,wojewodztwo,miasto,ulica,nr_domu,kod_pocztowy, telefon, fax, godzina_otwarcia, godzina_zamkniecia, ad_id) 
	as (SELECT pl.pl_id, a.ad_kraj, a.ad_wojewodztwo, a.ad_miasto, a.ad_ulica, a.ad_nr_domu, a.ad_kod_pocztowy, pl.pl_telefon, pl.pl_fax, pl.pl_godzina_otwarcia, pl.pl_godzina_zamkniecia, pl.ad_id
	FROM placowki pl, adresy a WHERE pl.ad_id = a.ad_id);

create or replace view view_pracownicy (id,imie,nazwisko,plec,data_urodzenia,pesel,telefon,kraj,wojewodztwo,miasto,ulica,nr_domu,kod_pocztowy, przepracowane_godziny, stawka, nazwa_stanowiska, opis_stanowiska, premia, st_id, ad_id, if_id) 
	as (SELECT p.p_id, i.if_imie, i.if_nazwisko, i.if_plec, i.if_data_urodzenia, i.if_pesel, i.if_telefon, a.ad_kraj, a.ad_wojewodztwo, 
	a.ad_miasto, a.ad_ulica, a.ad_nr_domu, a.ad_kod_pocztowy, p.p_przepracowane_godziny, p.p_stawka, st.st_nazwa, st.st_opis, st.st_premia, p.st_id, i.ad_id, p.if_id  
	FROM pracownicy p, stanowiska st, informacje_osobowe i, adresy a WHERE p.if_id = i.if_id AND i.ad_id = a.ad_id AND p.st_id = st.st_id);

create or replace view view_samochody (id, numer_rejestracyjny, marka, model, generacja, typ, przebieg, paliwo, pojemnosc, 
	moc_km, moc_kw, masa_wlasna, kraj_produkcji, data_produkcji, data_pierwszej_rejestracji, data_rejestracji_w_kraju, ilosc_wlascicieli) 
	as (SELECT s.s_id, s.s_numer_rejestracyjny, s.s_marka, s.s_model, s.s_generacja, s.s_typ, dp.dp_przebieg, dp.dp_paliwo, dp.dp_pojemnosc,
	dp.dp_moc_km, dp.dp_moc_kw, dp.dp_masa_wlasna, pp.pp_kraj_produkcji, pp.pp_data_produkcji, pp.pp_data_pierwszej_rejestracji, pp.pp_data_rejestracji_w_kraju, pp.pp_ilosc_wlascicieli
	FROM samochody s, dane_pojazdow dp, produkcja_pojazdow pp WHERE s.dp_id = dp.dp_id AND s.pp_id = pp.pp_id );

create or replace view view_kontrole (id, numer_rejestracyjny, marka, imie_wlasciciela, nazwisko_wlasciciela, przebieg, wynik, lpg, hak, data_kontroli, data_nastepnej_kontroli, cena, stan_silnika, stan_hamulcy,
	stan_amortyzatorow, stan_zawieszenia, stan_zarowek, stan_lamp) 
	as (SELECT k.k_id, s.s_numer_rejestracyjny, s.s_marka, i.if_imie, i.if_nazwisko, dp.dp_przebieg, k.k_pozytywny, k.k_lpg, k.k_hak, k.k_data_kontroli, k.k_data_nastepnej_kontroli, k.k_cena, sp.sp_silnik, sp.sp_hamulce,
	sp.sp_amortyzatory, sp.sp_zawieszenie, sp.sp_zarowki, sp.sp_lampy
	FROM kontrole k, samochody s, dane_pojazdow dp, stany_pojazdow sp, wlasciciele w, informacje_osobowe i WHERE k.s_id = s.s_id AND s.dp_id = dp.dp_id AND s.sp_id = sp.sp_id AND s.w_id = w.w_id AND w.if_id = i.if_id );

create or replace view view_kontrole_week (id, numer_rejestracyjny, marka, imie_wlasciciela, nazwisko_wlasciciela, przebieg, wynik, lpg, hak, data_kontroli, data_nastepnej_kontroli, cena, stan_silnika, stan_hamulcy,
	stan_amortyzatorow, stan_zawieszenia, stan_zarowek, stan_lamp) 
	as (SELECT k.k_id, s.s_numer_rejestracyjny, s.s_marka, i.if_imie, i.if_nazwisko, dp.dp_przebieg, k.k_pozytywny, k.k_lpg, k.k_hak, k.k_data_kontroli, k.k_data_nastepnej_kontroli, k.k_cena, sp.sp_silnik, sp.sp_hamulce,
	sp.sp_amortyzatory, sp.sp_zawieszenie, sp.sp_zarowki, sp.sp_lampy
	FROM kontrole k, samochody s, dane_pojazdow dp, stany_pojazdow sp, wlasciciele w, informacje_osobowe i WHERE k.s_id = s.s_id AND s.dp_id = dp.dp_id AND s.sp_id = sp.sp_id AND s.w_id = w.w_id AND w.if_id = i.if_id AND k.k_data_kontroli > DATE_SUB(NOW(), INTERVAL 7 DAY));

create or replace view view_utarg (id_placowki, kod_pocztowy, miasto, ulica, nr, data, utarg_dzienny) 
	as (SELECT DISTINCT pl.pl_id, ad.ad_kod_pocztowy, ad.ad_miasto, ad.ad_ulica, ad.ad_nr_domu, k.k_data_kontroli, SUM(k_cena)
	FROM placowki pl, pracownicy p, kontrole k, adresy ad WHERE pl.ad_id = ad.ad_id AND pl.pl_id = p.pl_id 
	AND p.p_id = k.p_id
	GROUP BY k.k_data_kontroli);