-- primary keys TODO

drop TABLE informace;
drop TABLE predmet;
drop TABLE projekt;
drop TABLE resitel;
drop TABLE student;
drop TABLE tym;
drop TABLE varianta;
drop TABLE vyucujici;

CREATE TABLE predmet(
id_predmet INT AUTO_INCREMENT PRIMARY KEY,
nazev VARCHAR(50) NOT NULL,
id_vyucujici INT NOT NULL,
cvicici VARCHAR(50),
prednasejici VARCHAR(50),
garant VARCHAR(50) NOT NULL
);

CREATE TABLE vyucujici(
id_vyucujici INT AUTO_INCREMENT PRIMARY KEY,
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
zadavatel INT
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
info_reseni INT,
varianta INT
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

CREATE TABLE tym(
id_resitel INT NOT NULL,
nazev_tymu VARCHAR(30) NOT NULL,
loginy_clenu VARCHAR(100) NOT NULL,
login_vedouciho VARCHAR(8) NOT NULL
);


-- nastaveni cizich klicu

ALTER TABLE predmet ADD CONSTRAINT FK_vyucujici FOREIGN KEY (id_vyucujici) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE projekt ADD CONSTRAINT FK_zadavatel FOREIGN KEY (zadavatel) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE varianta ADD CONSTRAINT FK_vedouci FOREIGN KEY (vedouci) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE informace ADD CONSTRAINT FK_hodnotici FOREIGN KEY (hodnotici) REFERENCES vyucujici(id_vyucujici);
ALTER TABLE student ADD CONSTRAINT FK_student FOREIGN KEY (id_resitel) REFERENCES resitel(id_resitel);
ALTER TABLE tym ADD CONSTRAINT FK_tym FOREIGN KEY (id_resitel) REFERENCES resitel(id_resitel);
ALTER TABLE resitel ADD CONSTRAINT FK_reseni FOREIGN KEY (info_reseni) REFERENCES informace(id_informace);
ALTER TABLE varianta ADD CONSTRAINT FK_projekt FOREIGN KEY (projekt) REFERENCES projekt(id_projekt);
ALTER TABLE resitel ADD CONSTRAINT FK_varianta FOREIGN KEY (varianta) REFERENCES varianta(id_varianta);




INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Gary Kasparov','',123456798);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Magnus Carlsen','',123123123);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Hikaru Nakamura','',123123123);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Boris Spasky','',123131233);
INSERT INTO vyucujici(jmeno,titul,kontakt) VALUES('Pavel Eljanov','',123456787);

INSERT INTO predmet(nazev, id_vyucujici, cvicici, prednasejici, garant) VALUES('Databázové systémy',2,'Anatoly Karpov','Bobby Fisher','Mikhail Tal');
INSERT INTO predmet(nazev, id_vyucujici, cvicici, prednasejici, garant) VALUES('Matematika 1',2,'Wesley So','Fabiano Caruana','Vladimir Kramnik');
INSERT INTO predmet(nazev, id_vyucujici, cvicici, prednasejici, garant) VALUES('Fyzika 3',3,'Hikaru Nakamura','Viswanathan Anand','Sergey Karjakin');
INSERT INTO predmet(nazev, id_vyucujici, cvicici, prednasejici, garant) VALUES('Právní minimum',5,'Shakhiyar Mamedyarov','Anish Giri','Michael Adams');
INSERT INTO predmet(nazev, id_vyucujici, cvicici, prednasejici, garant) VALUES('Základy programování',4,'Pavel Eljanov','Alexander Grischuk','Yangyi Yu');


INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel) VALUES ('IDS 1', 'http://www.fit.vutbr.cz/IDS/asdfsdf',5 ,3,1 );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel) VALUES ('IDS 2', 'http://www.fit.vutbr.cz/IDS/ssgfbsdf',5 ,0,2 );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel) VALUES ('IDS 3', 'http://www.fit.vutbr.cz/IDS/fgfgfsdf',5 ,0,3 );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel) VALUES ('IDS 4', 'http://www.fit.vutbr.cz/IDS/asghghgf',5 ,0,1 );
INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel) VALUES ('IDS 5', 'http://www.fit.vutbr.cz/IDS/aasddkld',19 ,0,5 );

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

INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/fgsdsdf',1,1);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/wqerdsdf',2,1);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/sdfsdfdf',3,1);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/bbbbsdf',4,1);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/asdassdf',5,2);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/fgsdsdf',6,2);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/wqerdsdf',7,2);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/sdfsdfdf',8,2);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/bbbbsdf',9,2);
INSERT INTO resitel(odevzdane_reseni, info_reseni, varianta) VALUES('http://www.fit.vutbr.cz/IDS/asdassdf',10,2);

INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(1, 'Milan', 'Hruban', 'xhruba08', 9503294823, '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(2, 'David', 'Hel', 'xhelda00', 9505184920, '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(3, 'Michal',  'Kohout', 'xkohou00', 9503294834,  '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(4, 'Tomáš',  'Svoboda', 'xsvobo95', 9503294812,  '', 'a');
INSERT INTO student(id_resitel, jmeno, prijmeni, login, rodne_cislo, titul, password) VALUES(5, 'František',  'Veselý', 'xvesel65', 9503294823, '', 'a');

INSERT INTO tym(id_resitel, nazev_tymu, loginy_clenu, login_vedouciho) VALUES(6, 'Norway Gnomes', 'xhruba08, xhelda00', 'xsvobo95');
INSERT INTO tym(id_resitel, nazev_tymu, loginy_clenu, login_vedouciho) VALUES(7, 'Saint-Louis Bishops', 'xnovak81', 'xvesel65');
INSERT INTO tym(id_resitel, nazev_tymu, loginy_clenu, login_vedouciho) VALUES(8, 'ChessBrahs', 'xspanel01', 'xhelda00');
INSERT INTO tym(id_resitel, nazev_tymu, loginy_clenu, login_vedouciho) VALUES(9, 'Colombus Cardinals', 'xzatec05', 'xkurat01');
INSERT INTO tym(id_resitel, nazev_tymu, loginy_clenu, login_vedouciho) VALUES(10, 'New York Knights', 'xcerny02, xcerma01', 'xplasi09');


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

-- dotaz s predikátem IN s vnořeným selectem (1)
-- POPIS: Vypíše informace o variantách, které spadají pod dany projekt
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


-- dotaz s predikátem EXISTS (1) 
-- POPIS: Vypiše jméno, titul a kontakt vyučujícího, který neučí žádný předmět
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


-- POPIS: Vypíše počet řešitelů, kteří jsou zapsáni na jednotlive varianty (groupby 2/2)
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
  P.id_vyucujici = V.id_vyucujici and P.nazev='Základy programování';

  */
