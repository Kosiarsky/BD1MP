drop view view_wlasciciele;
drop view view_placowki;
drop view view_pracownicy;
drop view view_samochody;
drop view view_kontrole;
drop view view_kontrole_week;
drop view view_utarg;
ALTER TABLE informacje_osobowe DROP FOREIGN KEY ifad_fk;
ALTER TABLE kontrole DROP FOREIGN KEY kp_fk;
ALTER TABLE kontrole DROP FOREIGN KEY ks_fk;
ALTER TABLE placowki DROP FOREIGN KEY pa_fk;
ALTER TABLE pracownicy DROP FOREIGN KEY pif_fk;	
ALTER TABLE pracownicy DROP FOREIGN KEY ppl_fk;
ALTER TABLE pracownicy DROP FOREIGN KEY pst_fk;
ALTER TABLE samochody DROP FOREIGN KEY sdp_fk;
ALTER TABLE samochody DROP FOREIGN KEY spp_fk;
ALTER TABLE samochody DROP FOREIGN KEY ssp_fk;
ALTER TABLE samochody DROP FOREIGN KEY sw_fk;
ALTER TABLE wlasciciele DROP FOREIGN KEY wif_fk;	
ALTER TABLE zmiany_pracownicze DROP FOREIGN KEY zpp_fk;	
DROP TABLE IF EXISTS
kontrole, pracownicy, samochody, placowki, zmiany_pracownicze, stanowiska, dane_pojazdow, stany_pojazdow, produkcja_pojazdow, wlasciciele, informacje_osobowe, adresy CASCADE;

