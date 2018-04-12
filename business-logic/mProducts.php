<?php
    
    // TR: Versandklassen werden aus der Stars-DB gelesen und gespeichert.
    include("mCon.php");
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
    
    $sth = $dbh->prepare("SELECT * FROM tVersandklassen");
    $sth->execute();    
    
    $result = $sth->fetchAll();
    //print_r($result);
    
       
    // TR: Versandklassen werden in einem zweidimensionalem Array gespeichert um Versandkosten zu ermitteln.
    $versandklassen = array();
    
    for ($i=0; $i < count($result); $i++) {        
        $versandklassen[$result[$i]['VersandklasseJTL']] = array( $result[$i]['VersandklasseJTL'] => $result[$i]['Preis']);
    }  
    
    // TR: Verpackungskosten werden in einem Array gespeichert.
    $verpackungskosten = array();
    
    for ($i=0; $i < count($result); $i++) {
        $verpackungskosten[$result[$i]['VersandklasseJTL']] = array( $result[$i]['VersandklasseJTL'] => $result[$i]['PreisVerpackungskosten']);
    }   
    

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
    
    $sql = "SELECT DISTINCT 'Amazon' AS Plattform, AVAL.kArtikel, AVAL.kStueckliste, AVAL.Artikelnummer, AVAL.Bezeichnung, AVAL.EAN, AVAL.ASIN, AVAL.PreisAmazon, COALESCE(AVAL.Hersteller, 'kein Wert') As Hersteller, AVAL.IstStuecklistenkomponente, 
                         AVAL.VerkaufspreisBrutto, EK.GesamtEkNetto, Steuer.fSteuersatz, dbo.tVersandklasse.kVersandklasse, dbo.tVersandklasse.cName, AVAL.BestandGesamt, AVAL.Versandgewicht
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
                               WHERE        (kOberKategorie = 41))) AND (1 = AVAL.Zustand) ";
   
  

        // TR: Werte für die Suche auslesen.
        // $plattformSearch = isset($_GET['txt-plattform']) ? $_GET['txt-plattform'] : '';    
        $artikelnummerSearch = isset($_GET['txt-artikelnummer']) ? $_GET['txt-artikelnummer'] : '';
        $artikelnameSearch = isset($_GET['txt-artikelname']) ? $_GET['txt-artikelname'] : '';
        $herstellerSearch = isset($_GET['txt-hersteller']) ? $_GET['txt-hersteller'] : '';
        $plattformIDSearch = isset($_GET['txt-plattformid']) ? $_GET['txt-plattformid'] : '';
        $eknettoSearch = isset($_GET['txt-eknetto']) ? $_GET['txt-eknetto'] : '';
        $mwstSearch = isset($_GET['txt-mwst']) ? $_GET['txt-mwst'] : '';
        $versandklassenSearch = isset($_GET['txt-versandklasse']) ? $_GET['txt-versandklasse'] : '';
        $gewichtSearch = isset($_GET['txt-gewicht']) ? $_GET['txt-gewicht'] : '';
        $vkpreisSearch = isset($_GET['txt-vkpreis']) ? $_GET['txt-vkpreis'] : '';
        $bestandSearch = isset($_GET['txt-bestand']) ? $_GET['txt-bestand'] : '';
        
        // TR: Table beginn
        echo "<form action='../sites/products.php' method='get'><table><thead>";      
       
        // TR: Headline        
        echo "<tr><th id='th-edit'><a href='login.php'><img class='icon-art-settings' src='../image/icon-art-setting.png'/></a></th>";
        echo "<th id='th-plattform'>Plattform <br><form><input id='txt-plattform'></form></th>";        
        echo "<th id='th-artikelnummer'>Artikelnummer <br><span><input name='txt-artikelnummer' id='txt-artikelnummer' value='" . $artikelnummerSearch . "'></span></th>";
        echo "<th id='th-artikelname'>Artikelname <br><input id='txt-artikelname' name='txt-artikelname' value='" . $artikelnameSearch . "'></th>";
        echo "<th id='th-hersteller'>Hersteller <br><input id='txt-hersteller' name='txt-hersteller' value='" . $herstellerSearch . "'></th>";
        echo "<th id='th-plattform-id'>Plattform-ID <br><input id='txt-plattformid' name='txt-plattformid' value='" . $plattformIDSearch . "'></th>";
        echo "<th id='th-ek-netto'>EK-Netto <br><input id='txt-eknetto' name='txt-eknetto' value='" . $eknettoSearch . "'.></th>";
        echo "<th id='th-mehrwertsteuer'>MwSt. <br><input id='txt-mwst' name='txt-mwst' value='" . $mwstSearch . "'.></th>";
        echo "<th id='th-versandklassenid'>Versandklassen-ID </th>";
        echo "<th id='th-versandklasse'>Versandklasse <br><input id='txt-versandklasse' name='txt-versandklasse' value='" . $versandklassenSearch . "'.></th>";
        echo "<th id='th-gewicht'>Gewicht <br><input id='txt-gewicht' name='txt-gewicht' value='" . $gewichtSearch . "'.></th>";
        echo "<th id='th-nullpreis'>Nullpreis <br><input id='txt-nullpreis'></th>";
        echo "<th id='th-vk-preis'>VK Preis <br><input id='txt-vkpreis' name='txt-vkpreis' value='" . $vkpreisSearch . "'.></th>";
        echo "<th id='th-marge-euro'>Marge â‚¬ <br><input id='txt-margeeuro'></th>";
        echo "<th id='th-marge-prozent'>Marge % <br><input id='txt-margeprozent'></th>";
        echo "<th id='th-bestand'>Bestand <br><input id='txt-bestand' name='txt-bestand' value='" . $bestandSearch . "'.></th>";
        echo "<th id='th-ordner'>Ordner <br><input id='txt-ordner'><input type='submit' id='btnSubmit'></th></tr></thead>";   
        
        
        // TR: Suche
        // if (isset($_GET["txt-plattform"])) $sql .= " AND Plattform LIKE '%" . $_GET["txt-plattform"] . "%'";  
        if ($artikelnummerSearch != '') $sql .= " AND Artikelnummer LIKE '%" . $_GET["txt-artikelnummer"] . "%'";  
        if ($artikelnameSearch != '') $sql .= " AND Bezeichnung LIKE '%" . $_GET["txt-artikelname"] . "%'";  
        if ($herstellerSearch != '') $sql .= " AND Hersteller LIKE '%" . $_GET["txt-hersteller"] . "%'";  
        if ($plattformIDSearch != '') $sql .= " AND ASIN LIKE '%" . $_GET["txt-plattformid"] . "%'";
        if ($eknettoSearch != '') $sql .= " AND GesamtEkNetto LIKE '" . str_replace(',', '.', $_GET["txt-eknetto"]) . "%'";
        if ($mwstSearch != '') $sql .= " AND fSteuersatz LIKE '" . $_GET["txt-mwst"] . "%'";  
        if ($versandklassenSearch != '') $sql .= " AND cName LIKE '%" . $_GET["txt-versandklasse"] . "%'";  
        if ($gewichtSearch != '') $sql .= " AND Versandgewicht LIKE '" . str_replace(',', '.', $_GET["txt-gewicht"]) . "%'";  
        if ($vkpreisSearch != '') $sql .= " AND VerkaufspreisBrutto LIKE '" . str_replace(',', '.', $_GET["txt-vkpreis"]) . "%'";
        if ($bestandSearch != '') $sql .= " AND BestandGesamt = '" . $_GET["txt-bestand"] . "'";
        
              
        $sql .= " ORDER BY AVAL.Bezeichnung, AVAL.kArtikel OFFSET $start_from ROWS FETCH NEXT $limit ROWS ONLY";     
        
       
        
        echo "<tbody>";
        foreach ($dbh->query($sql) as $row) {
            
            $valueVersandkosten = $versandklassen[$row["cName"]][$row["cName"]];
            $valueVerpackungskosten = $verpackungskosten[$row["cName"]][$row["cName"]];
            $mwst = $row["VerkaufspreisBrutto"] / 100 * floatval($row["fSteuersatz"]);
            $amazonKosten = $row["VerkaufspreisBrutto"] / 100 * 15;
            $summeGesamtkosten = $mwst + $amazonKosten + $row["GesamtEkNetto"] + $valueVersandkosten + $valueVerpackungskosten;
            $margeEuro = ($row["VerkaufspreisBrutto"] - $summeGesamtkosten);
            
            if ($row["VerkaufspreisBrutto"] != 0) {
                $margeProzent = 100 * $margeEuro / $row["VerkaufspreisBrutto"];
            } else {
                $margeProzent = 0.0 ;
            }
         
            echo "<tr class='hover' >";
            echo "<td id='td-edit' class='btnEdit'><a><img class='icon-art-setting' src='../image/icon-art-setting.png' /></a></td>";
            echo "<td id='td-plattform'>" .$row["Plattform"] . "</td>";
            echo "<td id='td-artikelnummer'>" .$row["Artikelnummer"] . "</td>";
            echo "<td id='td-artikelname'>" .$row["Bezeichnung"] . "</td>";
            echo "<td id='td-hersteller'>" .$row["Hersteller"] .  "</td>";
            echo "<td id='td-plattform-id'>" .$row["ASIN"] . "</td>";
            echo "<td id='td-ek-netto'>" . number_format(floatval($row["GesamtEkNetto"]),2, ",", ".") . " &#8364</td>";
            echo "<td id='td-mehrwertsteuer'><div id='steuer'>" . floatval($row["fSteuersatz"]) . " %</div></td>";
            echo "<td id='td-versandklassenid'>" .$row["kVersandklasse"] . "</td>";
            echo "<td id='td-versandklasse'>" .$row["cName"] . "</td>";            
            echo "<td id='td-gewicht'>" . number_format(floatval($row["Versandgewicht"]),2, ",", ".") . "</td>";            
            echo "<td id='td-nullpreis'>" .  number_format((floatval($row["GesamtEkNetto"]) + $valueVersandkosten + $valueVerpackungskosten ) * 1.19 * 1.217, 2, ",", ".")  . "</td>";
            echo "<td id='td-vk-preis'>". number_format(floatval($row["VerkaufspreisBrutto"]),2, ",", ".") . "</td>";
            echo "<td id='td-marge-euro'>" . number_format($margeEuro, 2, ",", ".") . "</td>";
            echo "<td id='td-marge-prozent'> " .  number_format($margeProzent, 2, ",", ".") . " %</td>";
            echo "<td id='td-bestand'>" . floatval($row["BestandGesamt"]) . "</td>";
            echo "<td id='td-ordner'> Faltkartons </td>";
            echo "</tr>";
        }
        
        //Table conclusion       
        echo "</tbody>";
        echo "</table></form>";        
       
        
        $sql = "SELECT DISTINCT COUNT(Artikelnummer)
                FROM ArtikelVerwaltung.vArtikelliste AS AVAL INNER JOIN
                     dbo.tkategorieartikel AS KA ON AVAL.kArtikelForKategorieArtikel = KA.kArtikel INNER JOIN
                     dbo.tArtikel AS Art ON Art.kArtikel = AVAL.kArtikel INNER JOIN
                     dbo.tSteuersatz AS Steuer ON Art.kSteuerklasse = Steuer.kSteuersatz INNER JOIN
                     dbo.tVersandklasse ON Art.kVersandklasse = dbo.tVersandklasse.kVersandklasse LEFT OUTER JOIN
                             (SELECT dbo.tStueckliste.kStueckliste, SUM(dbo.tliefartikel.fEKNetto * dbo.tStueckliste.fAnzahl) AS GesamtEkNetto
                               FROM dbo.tStueckliste INNER JOIN
                               dbo.tliefartikel ON dbo.tStueckliste.kArtikel = dbo.tliefartikel.tArtikel_kArtikel
                               GROUP BY dbo.tStueckliste.kStueckliste) AS EK ON EK.kStueckliste = AVAL.kStueckliste
                WHERE (KA.kKategorie IN (SELECT kKategorie FROM dbo.tkategorie
                WHERE (kOberKategorie = 41))) AND (1 = AVAL.Zustand)";
        
        // TR: Suche Anzahl
        if ($artikelnummerSearch != '') $sql .= " AND Artikelnummer LIKE '%" . $_GET["txt-artikelnummer"] . "%'";
        if ($artikelnameSearch != '') $sql .= " AND Bezeichnung LIKE '%" . $_GET["txt-artikelname"] . "%'";
        if ($herstellerSearch != '') $sql .= " AND Hersteller LIKE '%" . $_GET["txt-hersteller"] . "%'";  
        if ($plattformIDSearch != '') $sql .= " AND ASIN LIKE '%" . $_GET["txt-plattformid"] . "%'";  
        if ($eknettoSearch != '') $sql .= " AND GesamtEkNetto LIKE '" . str_replace(',', '.', $_GET["txt-eknetto"]) . "%'"; 
        if ($mwstSearch != '') $sql .= " AND fSteuersatz LIKE '" . $_GET["txt-mwst"] . "%'";  
        if ($versandklassenSearch != '') $sql .= " AND cName LIKE '%" . $_GET["txt-versandklasse"] . "%'";  
        if ($gewichtSearch != '') $sql .= " AND Versandgewicht LIKE '" . str_replace(',', '.', $_GET["txt-gewicht"]) . "%'"; 
        if ($vkpreisSearch != '') $sql .= " AND VerkaufspreisBrutto LIKE '" . str_replace(',', '.', $_GET["txt-vkpreis"]) . "%'"; 
        if ($bestandSearch != '') $sql .= " AND BestandGesamt = '" . $_GET["txt-bestand"] . "'";
        
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