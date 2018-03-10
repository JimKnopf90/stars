<?php

    include("mConErp.php");   
    
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sql = "SELECT DISTINCT TOP(100) 'Amazon' As Plattform, AVAL.kArtikel, AVAL.kStueckliste, AVAL.Artikelnummer, AVAL.Bezeichnung, AVAL.EAN, AVAL.ASIN, AVAL.PreisAmazon, AVAL.Hersteller, 
				AVAL.IstStuecklistenkomponente, AVAL.VerkaufspreisBrutto, EK.GesamtEkNetto
            FROM            ArtikelVerwaltung.vArtikelliste AS AVAL INNER JOIN
                dbo.tkategorieartikel AS KA ON AVAL.kArtikelForKategorieArtikel = KA.kArtikel LEFT OUTER JOIN
                             (SELECT        dbo.tStueckliste.kStueckliste, SUM(dbo.tliefartikel.fEKNetto * dbo.tStueckliste.fAnzahl) AS GesamtEkNetto
                               FROM         dbo.tStueckliste INNER JOIN dbo.tliefartikel ON dbo.tStueckliste.kArtikel = dbo.tliefartikel.tArtikel_kArtikel
                               GROUP BY dbo.tStueckliste.kStueckliste) AS EK ON EK.kStueckliste = AVAL.kStueckliste
            WHERE			(KA.kKategorie IN (SELECT        kKategorie
								   FROM          dbo.tkategorie
                                   WHERE        (kOberKategorie = 41))) AND (1 = AVAL.Zustand)
            ORDER BY AVAL.Bezeichnung, AVAL.kArtikel";

    
   
        //Table beginn
        echo "<table>";
        
        // Headline
        echo "<tr><th>Plattform</th>";
        echo "<th>Artikelnummer</th>";
        echo "<th>Artikelname</th>";
        echo "<th>Hersteller</th>";
        echo "<th>ASIN</th>";
        echo "<th>GesamtEK-Netto</th></tr>";
        
        foreach ($dbh->query($sql) as $row) {
            
            echo "<tr class='hover' >";
            echo "<td>" .$row["Plattform"] . "</td>";
            echo "<td>" .$row["Artikelnummer"] . "</td>";
            echo "<td>" .$row["Bezeichnung"] . "</td>";
            echo "<td>" .$row["Hersteller"] . "</td>";
            echo "<td>" .$row["ASIN"] . "</td>";
            echo "<td>" .$row["GesamtEkNetto"] . "</td>";
            echo "</tr>";
        }
        
        //Table conclusion
        echo "</table>";



?>