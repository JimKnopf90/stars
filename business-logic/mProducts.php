<?php

    include("mConErp.php");   
    
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sql = "SELECT kArtikel AS kArtikel, kStueckliste AS kStueckliste,                            Artikelnummer AS Artikelnummer, Bezeichnung AS Bezeichnung, EAN                AS EAN, ASIN AS ASIN,
    PreisAmazon AS PreisAmazon, kStueckliste AS IstStueckliste, IstStuecklistenkomponente AS IstStuecklistenkomponente, VerkaufspreisBrutto AS VerkaufspreisBrutto
    FROM ( SELECT DISTINCT
        AVAL.kArtikel AS kArtikel, AVAL.kStueckliste AS kStueckliste, AVAL.Artikelnummer AS Artikelnummer, AVAL.Bezeichnung AS Bezeichnung,
        AVAL.EAN AS EAN, AVAL.ASIN AS ASIN, AVAL.PreisAmazon AS PreisAmazon, AVAL.IstStuecklistenkomponente AS IstStuecklistenkomponente,
        AVAL.VerkaufspreisBrutto AS VerkaufspreisBrutto
        FROM  ArtikelVerwaltung.vArtikelliste AS AVAL
        INNER JOIN tKategorieArtikel AS KA ON AVAL.kArtikelForKategorieArtikel = KA.kArtikel
        WHERE (KA.[kKategorie] IN (SELECT kKategorie FROM tkategorie WHERE (kOberKategorie = 41)) AND (1 = AVAL.[Zustand]))
    )  AS [Distinct1]
    ORDER BY Bezeichnung ASC, kArtikel ASC";

//Table beginn
echo "<table border='1'";

// Headline
echo "<tr> <td>Artikelnummer</td>";
echo "<td>Artikelname</td>";
echo "<td>Preis</td></tr>";

    foreach ($dbh->query($sql) as $row) {
        
        echo "<tr>";
        echo "<td>" .$row["Artikelnummer"] . "</td>";
        echo "<td>" .$row["Bezeichnung"] . "</td>";
        echo "<td>" .$row["PreisAmazon"] . "</td>";
        echo "</tr>";
    }

//Table conclusion 
echo "</table>";

?>