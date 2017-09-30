drop TABLE informace;
drop TABLE predmet;
drop TABLE projekt;
drop TABLE resitel;
drop TABLE student;
drop TABLE tym;
drop TABLE varianta;
drop TABLE vyucujici;
drop table zapsany_predmet;
drop table clenove_teamu;
drop table prihlasena_varianta;


CREATE TABLE predmet(
id_predmet INT AUTO_INCREMENT PRIMARY KEY,
nazev VARCHAR(50) NOT NULL,
id_cvicici INT,
id_prednasejici INT,
id_garant INT NOT NULL,
kapacita INT NOT NULL
);

CREATE TABLE vyucujici(
id_vyucujici INT AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(8) NOT NULL,
password VARCHAR(255) NOT NULL,
jmeno VARCHAR(50) NOT NULL,
titul VARCHAR(25),
kontakt INT
);

CREATE TABLE projekt(
id_projekt INT AUTO_INCREMENT PRIMARY KEY,
nazev VARCHAR(50) NOT NULL,
popis VARCHAR(100) NOT NULL, 
maximum_bodu INT NOT NULL,
minimum_bodu INT NOT NULL,
zadavatel INT,
predmet INT NOT NULL,
datum_odevzdani TIMESTAMP,
datum_prihlaseni TIMESTAMP
);

CREATE TABLE varianta (
id_varianta INT AUTO_INCREMENT PRIMARY KEY,
maximum_resitelu INT NOT NULL,
popis VARCHAR(100) NOT NULL,
studentu_v_tymu INT NOT NULL,
vedouci INT,
projekt INT NOT NULL
);

CREATE TABLE informace(
id_informace INT AUTO_INCREMENT PRIMARY KEY,
pocet_bodu INT,
reseni VARCHAR(100),
datum_hodnoceni TIMESTAMP,
hodnotici INT
);

CREATE TABLE resitel(
id_resitel INT AUTO_INCREMENT PRIMARY KEY,
odevzdane_reseni VARCHAR(100),
info_reseni INT
);

CREATE TABLE student(
id_resitel INT NOT NULL,
jmeno VARCHAR(25) NOT NULL,
prijmeni VARCHAR(25) NOT NULL,
titul VARCHAR(25),
login VARCHAR(8) NOT NULL,
rodne_cislo INT NOT NULL,
password VARCHAR(255) NOT NULL
);
ALTER TABLE student ADD UNIQUE (login);

CREATE TABLE tym(
id_resitel INT NOT NULL,
nazev_tymu VARCHAR(30) NOT NULL,
login_vedouciho VARCHAR(8) NOT NULL
);

CREATE TABLE clenove_teamu(
id_teamu INT,
login_clena VARCHAR(8)
);

CREATE TABLE zapsany_predmet(
login VARCHAR(8) NOT NULL,
id_predmet INT NOT NULL
);

CREATE TABLE prihlasena_varianta(
id_resitel INT NOT NULL,
id_varianta INT NOT NULL
);

-- nastaveni cizich klicu

ALTER TABLE predmet ADD CONSTRAINT FK_prednasejici FOREIGN KEY (id_prednasejici) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE predmet ADD CONSTRAINT FK_cvicici FOREIGN KEY (id_cvicici) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE predmet ADD CONSTRAINT FK_garant FOREIGN KEY (id_garant) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE projekt ADD CONSTRAINT FK_zadavatel FOREIGN KEY (zadavatel) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE projekt ADD CONSTRAINT FK_predmet FOREIGN KEY (predmet) REFERENCES predmet(id_predmet);
ALTER TABLE varianta ADD CONSTRAINT FK_vedouci FOREIGN KEY (vedouci) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE informace ADD CONSTRAINT FK_hodnotici FOREIGN KEY (hodnotici) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE student ADD CONSTRAINT FK_student FOREIGN KEY (id_resitel) REFERENCES resitel(id_resitel);
ALTER TABLE tym ADD CONSTRAINT FK_tym FOREIGN KEY (id_resitel) REFERENCES resitel(id_resitel);
ALTER TABLE resitel ADD CONSTRAINT FK_reseni FOREIGN KEY (info_reseni) REFERENCES informace(id_informace);
ALTER TABLE varianta ADD CONSTRAINT FK_projekt FOREIGN KEY (projekt) REFERENCES projekt(id_projekt);
ALTER TABLE clenove_teamu ADD CONSTRAINT FK_team FOREIGN KEY (id_teamu) REFERENCES tym(id_resitel);
ALTER TABLE zapsany_predmet ADD CONSTRAINT FK_login FOREIGN KEY (login) REFERENCES student(login);
ALTER TABLE zapsany_predmet ADD CONSTRAINT FK_id_predmet FOREIGN KEY (id_predmet) REFERENCES predmet(id_predmet);
ALTER TABLE prihlasena_varianta ADD CONSTRAINT FK_id_resitel FOREIGN KEY (id_resitel) REFERENCES resitel(id_resitel);
ALTER TABLE prihlasena_varianta ADD CONSTRAINT FK_id_varianta FOREIGN KEY (id_varianta) REFERENCES varianta(id_varianta);


INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Gary Kasparov','',123456798);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Magnus Carlsen','',123123123);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Hikaru Nakamura','',123123123);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Boris Spasky','',123131233);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Pavel Eljanov','',123456787);

INSERT INTO predmet(nazev,  id_cvicici, id_prednasejici, id_garant, kapacita) VALUES('DatabĂˇzovĂ© systĂ©my',2, 1, 1, 100);
INSERT INTO predmet(nazev,  id_cvicici, id_prednasejici, id_garant, kapacita) VALUES('Matematika 1',2,  1, 1, 20);
INSERT INTO predmet(nazev,  id_cvicici, id_prednasejici, id_garant, kapacita) VALUES('Fyzika 3',3,1,  1, 30);
INSERT INTO predmet(nazev,  id_cvicici, id_prednasejici, id_garant, kapacita) VALUES('PrĂˇvnĂ­ minimum',5, 1, 1, 40);
INSERT INTO predmet(nazev,  id_cvicici, id_prednasejici, id_garant, kapacita) VALUES('ZĂˇklady programovĂˇnĂ­',4, 1, 1, 50);


INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel, predmet, datum_prihlaseni, datum_odevzdani) VALUES ('IDS 1', 'http://www.fit.vutbr.cz/IDS/asdfsdf',5 ,3,1, 2,  CURRENT_TIMESTAMP,  CURRENT_TIMESTAMP );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel, predmet, datum_prihlaseni, datum_odevzdani) VALUES ('IDS 2', 'http://www.fit.vutbr.cz/IDS/ssgfbsdf',5 ,0,2, 1, CURRENT_TIMESTAMP,  CURRENT_TIMESTAMP );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel, predmet, datum_prihlaseni, datum_odevzdani) VALUES ('IDS 3', 'http://www.fit.vutbr.cz/IDS/fgfgfsdf',5 ,0,3, 2, CURRENT_TIMESTAMP,  CURRENT_TIMESTAMP );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel, predmet, datum_prihlaseni, datum_odevzdani) VALUES ('IDS 4', 'http://www.fit.vutbr.cz/IDS/asghghgf',5 ,0,1, 3, CURRENT_TIMESTAMP,  CURRENT_TIMESTAMP );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel, predmet, datum_prihlaseni, datum_odevzdani) VALUES ('IDS 5', 'http://www.fit.vutbr.cz/IDS/aasddkld',19 ,0,5, 4, CURRENT_TIMESTAMP,  CURRENT_TIMESTAMP );

INSERT INTO varianta(maximum_resitelu, popis, studentu_v_tymu, vedouci, projekt) VALUES(100,'http://www.fit.vutbr.cz/IDS/aasdsdf',2, 2,1);
INSERT INTO varianta(maximum_resitelu, popis, studentu_v_tymu, vedouci, projekt) VALUES(56,'http://www.fit.vutbr.cz/IDS/agffgsdf',3, 1,1);
INSERT INTO varianta(maximum_resitelu, popis, studentu_v_tymu, vedouci, projekt) VALUES(30,'http://www.fit.vutbr.cz/IDS/ffffsdf',3, 5,1);
INSERT INTO varianta(maximum_resitelu, popis, studentu_v_tymu, vedouci, projekt) VALUES(450,'http://www.fit.vutbr.cz/IDS/sdsdsdf',1, 5,2);
INSERT INTO varianta(maximum_resitelu, popis, studentu_v_tymu, vedouci, projekt) VALUES(450,'http://www.fit.vutbr.cz/IDS/qweqfsdf',1, 5,2);

INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(4, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 1);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(2, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 5);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(4, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP,4);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(0, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 3);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(3, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 2);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(5, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 1);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(5, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 5);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(4, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP,4);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(0, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 3);
INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES(3, 'http://www.fit.vutbr.cz/IDS/aasdsdf', CURRENT_TIMESTAMP, 2);

INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/fgsdsdf',1);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/wqerdsdf',2);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/sdfsdfdf',3);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/bbbbsdf',4);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/asdassdf',5);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/fgsdsdf',6);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/wqerdsdf',7);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/sdfsdfdf',8);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/bbbbsdf',9);
INSERT INTO resitel(odevzdane_reseni, info_reseni) VALUES('http://www.fit.vutbr.cz/IDS/asdassdf',10);

INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(1, 'Milan', 'Hruban', 'xhruba08', 9503294823, '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(2, 'David', 'Hel', 'xhelda00', 9505184920, '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(3, 'Michal',  'Kohout', 'xkohou00', 9503294834,  '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(4, 'TomĂˇĹˇ',  'Svoboda', 'xsvobo95', 9503294812,  '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(5, 'FrantiĹˇek',  'VeselĂ˝', 'xvesel65', 9503294823, '', 'a');

INSERT INTO tym(id_resitel, nazev_tymu, login_vedouciho) VALUES(6, 'Norway Gnomes', 'xsvobo95');
INSERT INTO tym(id_resitel, nazev_tymu,  login_vedouciho) VALUES(7, 'Saint-Louis Bishops', 'xvesel65');
INSERT INTO tym(id_resitel, nazev_tymu,  login_vedouciho) VALUES(8, 'ChessBrahs',  'xhelda00');
INSERT INTO tym(id_resitel, nazev_tymu,  login_vedouciho) VALUES(9, 'Colombus Cardinals',  'xkurat01');
INSERT INTO tym(id_resitel, nazev_tymu,  login_vedouciho) VALUES(10, 'New York Knights', 'xplasi09');


INSERT INTO zapsany_predmet(login, id_predmet) VALUES("xhruba08", 1);
INSERT INTO zapsany_predmet(login, id_predmet) VALUES("xhruba08", 2);
INSERT INTO zapsany_predmet(login, id_predmet) VALUES("xhruba08", 4);


INSERT INTO prihlasena_varianta(id_resitel, id_varianta) VALUES (1, 1);


-- SELECT QUERIES

-- POPIS:zobrazi vsechny studenty a jejich pocet bodu u urcite varianty projektu, kteri nedosahli minimalniho poctu bodu
-- potrebnych pro uspesne splneni daneho projektu (spojeni 3 tabulek)

/*
SELECT 
  student.jmeno, student.prijmeni, student.login, informace.pocet_bodu
FROM 
  student, informace, varianta, projekt, resitel
WHERE 
  varianta.id_varianta = 1 and
  student.id_resitel = resitel.id_resitel and 
  resitel.info_reseni = informace.id_informace and
  resitel.varianta = varianta.id_varianta and
  varianta.projekt = projekt.id_projekt and
  informace.pocet_bodu < projekt.minimum_bodu;

-- dotaz s predikĂˇtem IN s vnoĹ™enĂ˝m selectem (1)
-- POPIS: VypĂ­Ĺˇe informace o variantĂˇch, kterĂ© spadajĂ­ pod dany projekt
SELECT 
  Va.maximum_resitelu, 
  Va.popis, 
  Va.studentu_v_tymu, 
  Va.vedouci
FROM 
  varianta Va
WHERE Va.projekt IN (
  SELECT 
    Proj.id_projekt
  FROM 
    projekt Proj
  WHERE  
    Proj.id_projekt = '1'
);

-- POPIS: Vytvori histogram hodnoceni urcite varianty projekty - zobrazuje pocet bodu a pocet resitelu, kteri ho dosahli (groupby 1/2)
SELECT 
  I.pocet_bodu as "pocet bodu",
  COUNT(I.pocet_bodu) as "pocet resitelu"
FROM  
  informace I,
  varianta V,
  resitel R
WHERE
  V.id_varianta = 1 and R.varianta = V.id_varianta and I.id_informace = R.info_reseni
  
GROUP BY 
  I.pocet_bodu
  
ORDER BY
  I.pocet_bodu DESC;


-- dotaz s predikĂˇtem EXISTS (1) 
-- POPIS: VypiĹˇe jmĂ©no, titul a kontakt vyuÄŤujĂ­cĂ­ho, kterĂ˝ neuÄŤĂ­ ĹľĂˇdnĂ˝ pĹ™edmÄ›t
SELECT 
  V.jmeno,
  V.titul,
  V.kontakt 
FROM 
  vyucujici V
WHERE NOT EXISTS (
  SELECT 
    P.id_vyucujici
  FROM 
    predmet P
  WHERE
    V.id_vyucujici = P.id_vyucujici
);


-- POPIS: VypĂ­Ĺˇe poÄŤet Ĺ™eĹˇitelĹŻ, kteĹ™Ă­ jsou zapsĂˇni na jednotlive varianty (groupby 2/2)
SELECT 
  R.varianta, 
  count(R.varianta) as "pocet studentu"
FROM 
  resitel R
GROUP BY 
  R.varianta;


-- Najde nazev teamu v kterem je student Milan Hruban (a loginy vsech ostatnich clenu a vedouciho) (spojeni 2 tabulek 1/2)
SELECT 
  T.nazev_tymu, 
  T.loginy_clenu, 
  T.login_vedouciho
FROM 
  student S, 
  tym T
WHERE
  S.jmeno = 'Milan' and S.prijmeni = 'Hruban' and T.loginy_clenu LIKE '%'||S.login||'%';

 
 -- najde vyucujiciho predmetu Zaklady programovani (spojeni dvou tabulek 2/2)
SELECT 
  V.jmeno,
  V.titul,
  V.kontakt
FROM 
  predmet P, 
  vyucujici V
WHERE
  P.id_vyucujici = V.id_vyucujici and P.nazev='ZĂˇklady programovĂˇnĂ­';

  */
