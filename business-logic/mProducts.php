<?php

    include("mConErp.php");   
    
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sql = "SELECT DISTINCT TOP (100)'Amazon' As Plattform, AVAL.kArtikel, AVAL.kStueckliste, AVAL.Artikelnummer, AVAL.Bezeichnung, AVAL.EAN, AVAL.ASIN, AVAL.PreisAmazon, AVAL.Hersteller, 
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
        // echo "<tr><th><a href='login.php'><img class='icon-setting' src='../image/icon-settings.png' /></a></th>";
        echo "<th id='th-settings'></th>";
        echo "<tr id='th-plattform'><th>Plattform</th>";
        echo "<th id='th-artikelnummer'>Artikelnummer</th>";
        echo "<th id='th-artikelname'>Artikelname</th>";
        echo "<th id='th-hersteller'>Hersteller</th>";
        echo "<th id='th-plattform-id'>Plattform-ID</th>";
        echo "<th id='th-ek-netto'>EK-Netto</th>";
        echo "<th id='th-mehrwertsteuer'>Mwst.</th>";
        echo "<th id='th-versandklasse'>Versandklasse</th>";
        echo "<th id='th-gewicht'>Gewicht</th>";
        echo "<th id='th-nullpreis'>Nullpreis</th>";
        echo "<th id='th-vk-preis'>VK-Preis</th>";
        echo "<th id='th-marge-euro'>Marge in €</th>";
        echo "<th id='th-marge-prozent'>Marge in %</th>";
        echo "<th id='th-bestand'>Bestand</th>";
        echo "<th id='th-ordner'>Ordner</th></tr>";
        
        foreach ($dbh->query($sql) as $row) {
            
            echo "<tr class='hover' >";
            // echo "<td> <a href='login.php'><img class='icon-setting' src='../image/icon-settings.png' /></a></td>";
            echo "<td id='td-plattform'>" .$row["Plattform"] . "</td>";
            echo "<td id='td-artikelnummer'>" .$row["Artikelnummer"] . "</td>";
            echo "<td id='td-artikelname'>" .$row["Bezeichnung"] . "</td>";
            echo "<td id='td-hersteller'>" .$row["Hersteller"] . "</td>";
            echo "<td id='td-plattform-id'>" .$row["ASIN"] . "</td>";
            echo "<td id='td-ek-netto'>" .$row["GesamtEkNetto"] . "</td>";
            echo "<td id='td-mehrwertsteuer'> 19% </td>";
            echo "<td id='td-versandklasse'> GLS | 3,26 € </td>";
            echo "<td id='td-gewicht'> 7,5 kg </td>";
            echo "<td id='td-nullpreis'> 14,44 €</td>";
            echo "<td id='td-marge-euro'> 1,22 €</td>";
            echo "<td id='td-marge-prozent'> 7 %</td>";
            echo "<td id='td-bestand'> 21 </td>";
            echo "<td id='td-ordner'> Faltkartons </td>";
            echo "</tr>";
        }
        
        //Table conclusion
        echo "</table>";



?>