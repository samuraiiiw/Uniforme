TRUNCATE pol;
INSERT INTO pol(naziv) VALUES
                ("musko"),
                ("zensko"),
                ("uniseks");

TRUNCATE vrsta;
INSERT INTO vrsta(naziv) VALUES
                 ("bluze"),
                 ("pantalone"),
                 ("mantil"),
                 ("haljine"),
                 ("suknje"),
                 ("kape"),
                 ("majice");
TRUNCATE velicine;
INSERT INTO velicine(`size`) VALUES
                    ('S'),
                    ('M'),
                    ('L'),
                    ('XL');
TRUNCATE artikal;
INSERT INTO artikal(`sifra`,`naziv`,`cena`,`vrsta_id`,`pol_id`) VALUES
                   (10000,'Muska bluza',5999,1,1),
                   (10000,'Muska bluza2',4999,1,1),
                   (10000,'Zenksa bluza',5199,1,2),
                   (10000,'zenska bluza2',3999,1,2),
                   (10000,'Muska pantalona',10999,2,1),
                   (10000,'Zenska pantalona',102999,2,2);
TRUNCATE slika;
INSERT INTO slika(`put`,`artikal_id`) VALUES
                 ("artikli/artikalM1.jpg", 1),
                 ("artikli/artikalM2.jpg", 2),
                 ("artikli/artikal1.jpg", 3),
                 ("artikli/artikal2.jpg", 4),
                 ("artikli/artikalM3.jpg", 5),
                 ("artikli/artikal3.jpg", 6);
TRUNCATE dostupne_velicine;
INSERT INTO dostupne_velicine (`artikal_id`,`velicine_size`)
VALUES ()