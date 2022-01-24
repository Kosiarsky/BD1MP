/* ZMIANA PENSJI PRACOWNIKA */
DELIMITER //
CREATE PROCEDURE zmiana_stawki (pr numeric(38,0), pid numeric(38,0))
BEGIN
	DECLARE st numeric(38,0)  DEFAULT  0;
	DECLARE tmp_p_stawka numeric(38,0);
	DECLARE tmp_p_id numeric(38,0);
	DECLARE cur_zs CURSOR FOR
		select p_id,p_stawka from pracownicy where p_id=pid;
	open cur_zs;
    Fetch cur_zs INTO tmp_p_id, tmp_p_stawka;
    SET st = tmp_p_stawka;
    Update pracownicy set pracownicy.p_stawka=st*((100+pr)/100) where p_id=tmp_p_id;
	close cur_zs;
end;
//
DELIMITER ;
--CALL zmiana_stawki(30,6);


/* ZMIANA PREMII PRACOWNIKA */
DELIMITER //
CREATE PROCEDURE zmiana_premii (pr numeric(38,0), pid numeric(38,0))
BEGIN
	DECLARE st numeric(38,0)  DEFAULT  0;
	DECLARE tmp_st_premia numeric(38,0);
	DECLARE tmp_st_id numeric(38,0);
	DECLARE cur_zs CURSOR FOR
		select s.st_id,s.st_premia from pracownicy p, stanowiska s where p.p_id=pid AND s.st_id = p.st_id;
	OPEN cur_zs;
		FETCH cur_zs INTO tmp_st_id, tmp_st_premia;
		SET st = tmp_st_premia;
		UPDATE stanowiska SET stanowiska.st_premia = st*((100+pr)/100) WHERE tmp_st_id = stanowiska.st_id;
	CLOSE cur_zs; 
end;
//
DELIMITER ;
--CALL zmiana_premii(30,2);


/* ZMIANA PREMII DLA POSZCZEGÓLNYCH STANOWISK */
DELIMITER //
CREATE PROCEDURE zmiana_premii_st(pr numeric(38,0), stnazwa char(50))
BEGIN
	DECLARE done numeric(38,0) DEFAULT 0;
	DECLARE tmp_st_premia numeric(38,0);
	DECLARE tmp_st_nazwa char(50);
	DECLARE tmp_st_id numeric(38,0);
	DECLARE cur_zs CURSOR FOR
		select st_id, st_nazwa,st_premia from stanowiska where st_nazwa=stnazwa;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_zs;
	WHILE done=0 DO
		FETCH cur_zs INTO tmp_st_id, tmp_st_nazwa, tmp_st_premia;
		UPDATE stanowiska SET stanowiska.st_premia = tmp_st_premia*((100+pr)/100) WHERE tmp_st_nazwa = stanowiska.st_nazwa AND tmp_st_id = stanowiska.st_id;
	END WHILE;
	CLOSE cur_zs;	
end;
//
DELIMITER ;
--CALL zmiana_premii_st(30,'Mechanik');


/* ZMIANA PENSJI DLA POSZCZEGÓLNYCH STANOWISK */
DELIMITER //
CREATE PROCEDURE zmiana_stawki_st (pr numeric(38,0), stnazwa char(50))
BEGIN
	DECLARE done numeric(38,0) DEFAULT 0;
	DECLARE tmp_p_stawka numeric(38,0);
	DECLARE tmp_st_nazwa char(50);
	DECLARE tmp_p_id numeric(38,0);
	DECLARE cur_zs CURSOR FOR
		select p.p_id,s.st_nazwa,p.p_stawka from pracownicy p, stanowiska s where s.st_nazwa=stnazwa AND s.st_id = p.st_id;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_zs;
	WHILE done=0 DO
		FETCH cur_zs INTO tmp_p_id, tmp_st_nazwa, tmp_p_stawka;
		UPDATE pracownicy SET pracownicy.p_stawka = tmp_p_stawka*((100+pr)/100) WHERE tmp_p_id = pracownicy.p_id;
	END WHILE;
	CLOSE cur_zs;
end;
//
DELIMITER ;
--CALL zmiana_stawki_st(30,'Mechanik');


/* ZMIANA CENY KONTROL */
DELIMITER //
CREATE PROCEDURE zmiana_ceny (pr numeric(38,0), lpg char(50), hak char(50)) 
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
end;
//
DELIMITER ;
--CALL zmiana_ceny(30, 'TAK', 'NIE');
--CALL zmiana_ceny(30, 'NIE', 'TAK');
--CALL zmiana_ceny(30, 'TAK', 'TAK');
--CALL zmiana_ceny(30, 'NIE', 'NIE');