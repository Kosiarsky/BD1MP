/* ZMIANA PENSJI PRACOWNIKA */
select * from pracownicy;
CREATE OR REPLACE PROCEDURE zmiana_stawki (pr numeric, pid numeric) IS
	CURSOR cur_zs IS
		select p_id,p_stawka from pracownicy where p_id=pid;
	st numeric := 0;
	tmp cur_zs%rowtype;
	begin 
	open cur_zs;
		Fetch cur_zs INTO tmp;
		st := tmp.p_stawka;
		Update pracownicy set pracownicy.p_stawka=st*((100+pr)/100) where p_id=tmp.p_id;
	close cur_zs;
end;
/
exec zmiana_stawki(30,6);
select * from pracownicy;


/* ZMIANA PREMII PRACOWNIKA */
select p_id,st_nazwa, st_premia from pracownicy, stanowiska WHERE pracownicy.st_id = stanowiska.st_id;
Create or replace procedure zmiana_premii (pr numeric, pid numeric) IS
	CURSOR cur_zs IS
		select p.p_id,s.st_id,s.st_nazwa,s.st_premia from pracownicy p, stanowiska s where p.p_id=pid AND s.st_id = p.st_id;
	buffor cur_zs%rowtype;
	BEGIN
	OPEN cur_zs;
		FETCH cur_zs INTO buffor;
		UPDATE pracownicy SET pracownicy.p_stawka = pracownicy.p_stawka*((100+pr)/100) WHERE buffor.p_id = pracownicy.p_id;
		UPDATE stanowiska SET stanowiska.st_premia = stanowiska.st_premia*((100+pr)/100) WHERE buffor.st_id = stanowiska.st_id;
	CLOSE cur_zs; 
END;
/
exec zmiana_premii(30,2);
select p_id,st_nazwa, st_premia from pracownicy, stanowiska WHERE pracownicy.st_id = stanowiska.st_id;


/* ZMIANA PREMII DLA POSZCZEGÓLNYCH STANOWISK */
select st_nazwa, st_premia from stanowiska;
Create or replace procedure zmiana_premii_st(pr numeric, stnazwa varchar2) IS
	CURSOR cur_zs IS
		select st_id,st_nazwa,st_premia from stanowiska where st_nazwa=stnazwa;
	buffor cur_zs%rowtype;
	BEGIN
	OPEN cur_zs;
	LOOP
		FETCH cur_zs INTO buffor;
		EXIT WHEN cur_zs%NOTFOUND;
		UPDATE stanowiska SET stanowiska.st_premia = stanowiska.st_premia*((100+pr)/100) WHERE buffor.st_nazwa = stanowiska.st_nazwa AND buffor.st_id = stanowiska.st_id;
	END LOOP;
	CLOSE cur_zs;	
END;
/
exec zmiana_premii_st(30,'Mechanik');
select st_nazwa, st_premia from stanowiska;


/* ZMIANA PENSJI DLA POSZCZEGÓLNYCH STANOWISK */
select p_id,st_nazwa, p_stawka from pracownicy, stanowiska WHERE pracownicy.st_id = stanowiska.st_id;
Create or replace procedure zmiana_stawki_st (pr numeric, stnazwa varchar2) IS
	CURSOR cur_zs IS
		select p.p_id,s.st_id,s.st_nazwa,s.st_premia from pracownicy p, stanowiska s where s.st_nazwa=stnazwa AND s.st_id = p.st_id;
	buffor cur_zs%rowtype;
	BEGIN
	OPEN cur_zs;
	LOOP
		FETCH cur_zs INTO buffor;
		EXIT WHEN cur_zs%NOTFOUND;
		UPDATE pracownicy SET pracownicy.p_stawka = pracownicy.p_stawka*((100+pr)/100) WHERE buffor.p_id = pracownicy.p_id;
	END LOOP;
	CLOSE cur_zs;
END;
/
exec zmiana_stawki_st(30,'Mechanik');
select p_id,st_nazwa, p_stawka from pracownicy, stanowiska WHERE pracownicy.st_id = stanowiska.st_id;


/* ZMIANA CENY KONTROL */
select k_id, k_cena, k_lpg, k_hak from kontrole;
Create or replace procedure zmiana_ceny (pr numeric, lpg varchar2, hak varchar2) IS
	CURSOR cur_zs IS
		select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_lpg = 'TAK' AND k_hak = 'TAK';
	CURSOR cur_zs_l IS
		select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_lpg = 'TAK' AND k_hak = 'NIE';
	CURSOR cur_zs_h IS
		select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_hak = 'TAK' AND k_lpg = 'NIE';
	CURSOR cur_zs_b IS
		select k_id, k_cena, k_lpg, k_hak from kontrole WHERE k_hak = 'NIE' AND k_lpg = 'NIE';
	buffor cur_zs%rowtype;
	BEGIN
	IF lpg = 'TAK' AND hak = 'NIE' THEN
		OPEN cur_zs_l;
		LOOP
			FETCH cur_zs_l INTO buffor;
			EXIT WHEN cur_zs_l%NOTFOUND;
			UPDATE kontrole SET kontrole.k_cena = kontrole.k_cena*((100+pr)/100) WHERE buffor.k_id = kontrole.k_id;
		END LOOP;
		CLOSE cur_zs_l;
	ELSIF hak = 'TAK' AND lpg = 'NIE' THEN
		OPEN cur_zs_h;
		LOOP
			FETCH cur_zs_h INTO buffor;
			EXIT WHEN cur_zs_h%NOTFOUND;
			UPDATE kontrole SET kontrole.k_cena = kontrole.k_cena*((100+pr)/100) WHERE buffor.k_id = kontrole.k_id;
		END LOOP;
		CLOSE cur_zs_h;
	ELSIF hak = 'TAK' AND lpg = 'TAK' THEN
		OPEN cur_zs;
		LOOP
			FETCH cur_zs INTO buffor;
			EXIT WHEN cur_zs%NOTFOUND;
			UPDATE kontrole SET kontrole.k_cena = kontrole.k_cena*((100+pr)/100) WHERE buffor.k_id = kontrole.k_id;
		END LOOP;
		CLOSE cur_zs;
	ELSE
	 OPEN cur_zs_b;
		LOOP
			FETCH cur_zs_b INTO buffor;
			EXIT WHEN cur_zs_b%NOTFOUND;
			UPDATE kontrole SET kontrole.k_cena = kontrole.k_cena*((100+pr)/100) WHERE buffor.k_id = kontrole.k_id;
		END LOOP;
		CLOSE cur_zs_b;
	END IF;
END;
/
exec zmiana_ceny(30, 'TAK', 'NIE');
select k_id, k_cena, k_lpg, k_hak from kontrole;
exec zmiana_ceny(30, 'NIE', 'TAK');
select k_id, k_cena, k_lpg, k_hak from kontrole;
exec zmiana_ceny(30, 'TAK', 'TAK');
select k_id, k_cena, k_lpg, k_hak from kontrole;
exec zmiana_ceny(30, 'NIE', 'NIE');
select k_id, k_cena, k_lpg, k_hak from kontrole;