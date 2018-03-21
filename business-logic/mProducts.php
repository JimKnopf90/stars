<?php
    
    // TR: Versandklassen werden aus der Stars-DB gelesen und gespeichert.
    include("mCon.php");
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sth = $dbh->prepare("SELECT * FROM tVersandklassen");
    $sth->execute();    
    
    $result = $sth->fetchAll();
    //print_r($result);
    
    echo $result[0]['VersandklasseJTL'];



    include("mConErp.php");      
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    //Paging
    $limit = 100;
    
    
    if (isset($_GET["page"])) { 
        $page  = $_GET["page"];       
    } else { 
        $page=1;        
    };    
    
     $start_from = ($page-1) * $limit;      
    
    $sql = "SELECT DISTINCT 'Amazon' AS Plattform, AVAL.kArtikel, AVAL.kStueckliste, AVAL.Artikelnummer, AVAL.Bezeichnung, AVAL.EAN, AVAL.ASIN, AVAL.PreisAmazon, AVAL.Hersteller, AVAL.IstStuecklistenkomponente, 
                         AVAL.VerkaufspreisBrutto, EK.GesamtEkNetto, Steuer.fSteuersatz, dbo.tVersandklasse.cName, AVAL.BestandGesamt, AVAL.Versandgewicht
FROM            ArtikelVerwaltung.vArtikelliste AS AVAL INNER JOIN
                         dbo.tkategorieartikel AS KA ON AVAL.kArtikelForKategorieArtikel = KA.kArtikel INNER JOIN
                         dbo.tArtikel AS Art ON Art.kArtikel = AVAL.kArtikel INNER JOIN
                         dbo.tSteuersatz AS Steuer ON Art.kSteuerklasse = Steuer.kSteuersatz INNER JOIN
                         dbo.tVersandklasse ON Art.kVersandklasse = dbo.tVersandklasse.kVersandklasse LEFT OUTER JOIN
                             (SELECT        dbo.tStueckliste.kStueckliste, SUM(dbo.tliefartikel.fEKNetto * dbo.tStueckliste.fAnzahl) AS GesamtEkNetto
                               FROM            dbo.tStueckliste INNER JOIN
                                                         dbo.tliefartikel ON dbo.tStueckliste.kArtikel = dbo.tliefartikel.tArtikel_kArtikel
                               GROUP BY dbo.tStueckliste.kStueckliste) AS EK ON EK.kStueckliste = AVAL.kStueckliste
WHERE        (KA.kKategorie IN
                             (SELECT        kKategorie
                               FROM            dbo.tkategorie
                               WHERE        (kOberKategorie = 41))) AND (1 = AVAL.Zustand) ORDER BY AVAL.Bezeichnung, AVAL.kArtikel OFFSET $start_from ROWS FETCH NEXT $limit ROWS ONLY";
   
  
   
        //Table beginn
        echo "<table><thead>";        
       
        // Headline        
        echo "<tr><th id='th-edit'><a href='login.php'><img class='icon-art-settings' src='../image/icon-art-setting.png' /></a></th>";
        echo "<th id='th-plattform'>Plattform <br><input id='txt-plattform'></th>";
        echo "<th id='th-artikelnummer'>Artikelnummer <br><form><span><input id='txt-artikelnummer'></span></form></th>";
        echo "<th id='th-artikelname'>Artikelname <br><form action='../business-logic/mProducts.php' method='post'><input id='txt-artikelname' name='artikelname'></form></th>";
        echo "<th id='th-hersteller'>Hersteller <br><input id='txt-hersteller'></th>";
        echo "<th id='th-plattform-id'>Plattform-ID <br><input id='txt-plattformid'></th>";
        echo "<th id='th-ek-netto'>EK-Netto <br><input id='txt-eknetto'></th>";
        echo "<th id='th-mehrwertsteuer'>MwSt. <br><input id='txt-mwst'></th>";
        echo "<th id='th-versandklasse'>Versandklasse <br><input id='txt-versandklasse'></th>";
        echo "<th id='th-gewicht'>Gewicht <br><input id='txt-gewicht'></th>";
        echo "<th id='th-nullpreis'>Nullpreis <br><input id='txt-nullpreis'></th>";
        echo "<th id='th-vk-preis'>VK Preis <br><input id='txt-vkpreis'></th>";
        echo "<th id='th-marge-euro'>Marge € <br><input id='txt-margeeuro'></th>";
        echo "<th id='th-marge-prozent'>Marge % <br><input id='txt-margeprozent'></th>";
        echo "<th id='th-bestand'>Bestand <br><input id='txt-bestand'></th>";
        echo "<th id='th-ordner'>Ordner <br><input id='txt-ordner'></th></tr></thead>";       
     
        echo "<tbody>";
        foreach ($dbh->query($sql) as $row) {
            
            echo "<tr class='hover' >";
            echo "<td id='td-edit'> <a href='login.php'><img class='icon-art-setting' src='../image/icon-art-setting.png' /></a></td>";
            echo "<td id='td-plattform'>" .$row["Plattform"] . "</td>";
            echo "<td id='td-artikelnummer'>" .$row["Artikelnummer"] . "</td>";
            echo "<td id='td-artikelname'>" .$row["Bezeichnung"] . "</td>";
            echo "<td id='td-hersteller'> Brennenstuhl </td>";
            echo "<td id='td-plattform-id'>" .$row["ASIN"] . "</td>";
            echo "<td id='td-ek-netto'>" . number_format(floatval($row["GesamtEkNetto"]),2, ",", ".") . " &#8364</td>";
            echo "<td id='td-mehrwertsteuer'><div id='steuer'>" . floatval($row["fSteuersatz"]) . " %</div></td>";
            echo "<td id='td-versandklasse'>" .$row["cName"] . "</td>";
            echo "<td id='td-gewicht'>" . number_format(floatval($row["Versandgewicht"]),2, ",", ".") . "</td>";
            echo "<td id='td-nullpreis'>" . floatval($row["GesamtEkNetto"]) * 1,19 * 1.217  . "</td>";
            echo "<td id='td-vk-preis'> 29,95 €</td>";
            echo "<td id='td-marge-euro'> 1,22 €</td>";
            echo "<td id='td-marge-prozent'> 7 %</td>";
            echo "<td id='td-bestand'>" . floatval($row["BestandGesamt"]) . "</td>";
            echo "<td id='td-ordner'> Faltkartons </td>";
            echo "</tr>";
        }
        
        //Table conclusion       
        echo "</tbody>";
        echo "</table>";
        
        $sql = "SELECT DISTINCT COUNT(Artikelnummer)
                FROM ArtikelVerwaltung.vArtikelliste AS AVAL INNER JOIN
                dbo.tkategorieartikel AS KA ON AVAL.kArtikelForKategorieArtikel = KA.kArtikel
                WHERE (KA.kKategorie IN (SELECT kKategorie FROM dbo.tkategorie
                WHERE (kOberKategorie = 41))) AND (1 = AVAL.Zustand)";

        $count = $dbh->query($sql);
        
        $total_records = $count->fetchColumn();
        $total_pages = ceil($total_records / $limit);  
        
        $pagLink = "<div id='paging' class='pagination'>";
        
        for ($i=1; $i<=$total_pages; $i++) {          
            if ($i <= 10) {
                $pagLink .= "<a class='pagingElement' href='products.php?page=".$i."'>".$i."</a>";
            } else {
                if ($i == 11) {
                    $pagLink .= "<select><option class='pagingElement' value='products.php?page=".$i."'>".$i."</option>";
                } else {
                     $pagLink .= "<option>".$i."</option>";

                }
              
            }
            
        };
        
        echo $pagLink . "</select><div id='counter'>" . $total_records . " Zeile(n)</div></div>";         
        
        


?>