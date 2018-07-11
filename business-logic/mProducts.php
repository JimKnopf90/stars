<?php

    // TR: Versandklassen werden aus der Stars-DB gelesen und gespeichert.
    include("mCon.php");
    
    // TR: Variablen
    $y = 0;
    $k = 0;
    $list = [];

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
														 WHERE dbo.tliefartikel.tLieferant_kLieferant = 34
                               GROUP BY dbo.tStueckliste.kStueckliste) AS EK ON EK.kStueckliste = AVAL.kStueckliste
                          WHERE        (KA.kKategorie IN
                             (SELECT        kKategorie
                               FROM            dbo.tkategorie
                               WHERE        (kOberKategorie = 41))) AND (1 = AVAL.Zustand)
                               UNION
                            SELECT DISTINCT 'verpacking_com' AS Plattform, AVAL.kArtikel, AVAL.kStueckliste, AVAL.Artikelnummer, AVAL.Bezeichnung, AVAL.EAN, AVAL.ASIN, AVAL.PreisAmazon, COALESCE(AVAL.Hersteller, 'kein Wert') As Hersteller, AVAL.IstStuecklistenkomponente, 
                                                     AVAL.VerkaufspreisBrutto, EK.GesamtEkNetto, Steuer.fSteuersatz, dbo.tVersandklasse.kVersandklasse, dbo.tVersandklasse.cName, AVAL.BestandGesamt, AVAL.Versandgewicht
                                                     FROM            ArtikelVerwaltung.vArtikelliste AS AVAL INNER JOIN
                                                     dbo.tkategorieartikel AS KA ON AVAL.kArtikelForKategorieArtikel = KA.kArtikel INNER JOIN
                                                     dbo.tArtikel AS Art ON Art.kArtikel = AVAL.kArtikel INNER JOIN
                                                     dbo.tSteuersatz AS Steuer ON Art.kSteuerklasse = Steuer.kSteuersatz INNER JOIN
                                                     dbo.tVersandklasse ON Art.kVersandklasse = dbo.tVersandklasse.kVersandklasse LEFT OUTER JOIN
                                                         (SELECT        dbo.tStueckliste.kStueckliste, SUM(dbo.tliefartikel.fEKNetto * dbo.tStueckliste.fAnzahl) AS GesamtEkNetto
                                                           FROM            dbo.tStueckliste INNER JOIN
                                                                                     dbo.tliefartikel ON dbo.tStueckliste.kArtikel = dbo.tliefartikel.tArtikel_kArtikel
                                                                                     WHERE dbo.tliefartikel.tLieferant_kLieferant = 34
                                                           GROUP BY dbo.tStueckliste.kStueckliste) AS EK ON EK.kStueckliste = AVAL.kStueckliste
                                                      WHERE (KA.kKategorie IN (SELECT kKategorie FROM dbo.tkategorie WHERE KA.kKategorie IN (SELECT kKategorie From tkategorie	
                                WHERE kOberKategorie IN (SELECT kKategorie From tkategorie	
                                WHERE kOberKategorie IN (SELECT kKategorie From tkategorie	
                                WHERE kOberKategorie IN (SELECT kKategorie From tkategorie	
                                WHERE kOberKategorie = 218 OR kKategorie = 218)))))) AND (1 = AVAL.Zustand)";
   
  

        // TR: Werte für die Suche auslesen.
        $plattformSearch = isset($_GET['txt-plattform']) ? $_GET['txt-plattform'] : '';
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
        $nullpreisSearch = isset($_GET['txt-nullpreis']) ? $_GET['txt-nullpreis'] : '';
        $margeEuroSearch = isset($_GET['txt-margeeuro']) ? $_GET['txt-margeeuro'] : '';
        $margeProzentSearch = isset($_GET['txt-margeprozent']) ? $_GET['txt-margeprozent'] : '';

        // TR: Werte für die Sortierung auslesen.
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        $sortStatus = isset($_GET['sort']) ? $_GET['sortStatus'] : '';

        
        // TR: Table Start
        echo "<form action='../sites/products.php' method='get'><table><thead>";      
       
        // TR: Headline        
        echo "<tr><th id='th-edit'><a ><img class='icon-art-settings' src='../image/icon-art-setting.png'/></a></th>";
        echo "<th id='th-plattform'><span id='spnPlattform'>Plattform</span> <br><form><input id='txt-plattform' name='txt-plattform' value='" . $plattformSearch . "'></form></th>";
        echo "<th id='th-artikelnummer'><span id='spnArtikelnummer'>Artikelnummer</span> <br><span><input name='txt-artikelnummer' id='txt-artikelnummer' value='" . $artikelnummerSearch . "'></span></th>";
        echo "<th id='th-artikelname'><span id='spnArtikelname'>Artikelname</span> <br><input id='txt-artikelname' name='txt-artikelname' value='" . $artikelnameSearch . "'></th>";
        echo "<th id='th-hersteller'><span id='spnHersteller'>Hersteller</span> <br><input id='txt-hersteller' name='txt-hersteller' value='" . $herstellerSearch . "'></th>";
        echo "<th id='th-plattform-id'><span id='spnPlattform-id'>Plattform-ID</span> <br><input id='txt-plattformid' name='txt-plattformid' value='" . $plattformIDSearch . "'></th>";
        echo "<th id='th-ek-netto'><span id='spn-ek-netto'>EK-Netto</span> <br><input id='txt-eknetto' name='txt-eknetto' value='" . $eknettoSearch . "'></th>";
        echo "<th id='th-mehrwertsteuer'><span id='spnMehrwertsteuer'>MwSt.</span> <br><input id='txt-mwst' name='txt-mwst' value='" . $mwstSearch . "'></th>";
        echo "<th id='th-versandklassenid'>Versandklassen-ID </th>";
        echo "<th id='th-versandklasse'><span id='spnVersandklasse'>Versandklasse</span> <br><input id='txt-versandklasse' name='txt-versandklasse' value='" . $versandklassenSearch . "'></th>";
        echo "<th id='th-gewicht'><span id='spnGewicht'>Gewicht</span> <br><input id='txt-gewicht' name='txt-gewicht' value='" . $gewichtSearch . "'></th>";
        echo "<th id='th-nullpreis'><span id='spnNullpreis'>Nullpreis</span> <br><input id='txt-nullpreis' name='txt-nullpreis' value='" . $nullpreisSearch . "'></th>";
        echo "<th id='th-vk-preis'><span id='spn-vk-preis'>VK Preis<span> <br><input id='txt-vkpreis' name='txt-vkpreis' value='" . $vkpreisSearch . "'></th>";
        echo "<th id='th-marge-euro'><span id='spn-marge-euro'>Marge €</span> <br><input id='txt-margeeuro' name='txt-margeeuro' value='" . $margeEuroSearch. "'></th>";
        echo "<th id='th-marge-prozent'><span id='spn-marge-prozent'>Marge %</span> <br><input id='txt-margeprozent' name='txt-margeprozent' value='" . $margeProzentSearch. "'></th>";
        echo "<th id='th-bestand'><span id='spnBestand'>Bestand</span> <br><input id='txt-bestand' name='txt-bestand' value='" . $bestandSearch . "'></th>";
        echo "<th id='th-ordner'>Ordner <br><input id='txt-ordner'><input type='submit' id='btnSubmit'></th></tr></thead>";


        foreach ($dbh->query($sql) as $row) {         
            
            $valueVersandkosten = $versandklassen[$row["cName"]][$row["cName"]];
            $valueVerpackungskosten = $verpackungskosten[$row["cName"]][$row["cName"]];
            $mwst = $row["VerkaufspreisBrutto"] - ($row["VerkaufspreisBrutto"] * 100 / (floatval($row["fSteuersatz"]) + 100 )) ;
            $amazonKosten = $row["VerkaufspreisBrutto"] / 100 * 15;
            $summeGesamtkosten = $mwst + $amazonKosten + $row["GesamtEkNetto"] + $valueVersandkosten + $valueVerpackungskosten;
            $margeEuro = ($row["VerkaufspreisBrutto"] - $summeGesamtkosten);
            
            if ($row["VerkaufspreisBrutto"] != 0) {
                $margeProzent = 100 * $margeEuro / $row["VerkaufspreisBrutto"];
            } else {
                $margeProzent = 0.0 ;
            }
            
            // TR: Array wird mit den Werten der Tabelle gefüllt.
            $list[$y]['Plattform'] = $row["Plattform"]; 
            $list[$y]['Artikelnummer'] = $row["Artikelnummer"];
            $list[$y]['Artikelname'] = $row["Bezeichnung"];
            $list[$y]['Hersteller'] = $row["Hersteller"];
            $list[$y]['PlattformID'] = $row["ASIN"];
            $list[$y]['EkNetto'] = number_format(floatval($row["GesamtEkNetto"]),2, ",", ".");
            $list[$y]['Mwst'] = floatval($row["fSteuersatz"]);
            $list[$y]['Versandklasse'] = $row["kVersandklasse"];
            $list[$y]['VersandklasseName'] = $row["cName"];
            $list[$y]['Gewicht'] = number_format(floatval($row["Versandgewicht"]),2, ",", ".");
            $list[$y]['Nullpreis'] = number_format((floatval($row["GesamtEkNetto"]) + $valueVersandkosten + $valueVerpackungskosten ) * 1.19 * 1.217, 2, ",", ".");
            $list[$y]['VKPreis'] = number_format(floatval($row["VerkaufspreisBrutto"]),2, ",", ".");
            $list[$y]['MargeEuro'] = number_format($margeEuro, 2, ",", ".");
            $list[$y]['MargeProzent'] = number_format($margeProzent, 2, ",", ".");
            $list[$y]['Bestand'] = floatval($row["BestandGesamt"]);
            $list[$y]['Ordner'] = "Faltkartons";           
            
            $y = $y + 1;
        }

        //TR: Array wird gefilter
        if ($plattformSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['Plattform'] != $plattformSearch)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($artikelnummerSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if (strpos($listEntry['Artikelnummer'], $artikelnummerSearch) === false)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($artikelnameSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if (strpos($listEntry['Artikelname'], $artikelnameSearch) === false)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($herstellerSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if (strpos($listEntry['Hersteller'], $herstellerSearch) === false)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($plattformIDSearch  != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if (strpos($listEntry['PlattformID'], $plattformIDSearch) === false)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($eknettoSearch   != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['EkNetto'] != $eknettoSearch)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($mwstSearch   != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if (strpos($listEntry['Mwst'], $mwstSearch) === false)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($versandklassenSearch   != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if (strpos($listEntry['VersandklasseName'], $versandklassenSearch) === false)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($gewichtSearch   != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['Gewicht'] != $gewichtSearch)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($vkpreisSearch   != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['VKPreis'] != $vkpreisSearch)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($margeProzentSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['MargeProzent'] != $margeProzentSearch)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($margeEuroSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['MargeEuro'] != $margeEuroSearch)
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($nullpreisSearch != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
               if ($listEntry['Nullpreis'] != $nullpreisSearch)
               {
                   unset($list[$k]);
               }
               $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }
        if ($bestandSearch    != '')
        {
            $k = 0;
            foreach ($list as $listEntry)
            {
                if ($listEntry['Bestand'] != $bestandSearch )
                {
                    unset($list[$k]);
                }

                $k++;
            }
            // TR: Index wird neu durchgezählt-
            $list = array_values($list);
        }


        if ($sort != "")
        {
            $list = SortArray($list, $sort, $sortStatus);
        }

         createTable($list, $page, $limit);

        

        $total_pages = ceil(count($list) / $limit);
        
        $pagLink = "<div id='paging' class='pagination'><div id='pagenumber'> Seite: " . $page . "</div>";
        
        for ($i=1; $i<=$total_pages; $i++) {          
            if ($i <= 10) {
                $pagLink .= "<a class='pagingElement' href='products.php?page=".$i."'>".$i."</a>";
            } else {
                if ($i == 11) {
                    $pagLink .= "<select onchange=\"location = this.value;\"><option value='' selected disabled hidden>Seite wählen</option><option class='pagingElement' value='products.php?page=".$i."'>$i</option>";
                } else {
                    $pagLink .= "<option class='pagingElement' value='products.php?page=".$i."'>$i</option>";

                }
              
            }
            
        };
        
        echo $pagLink . "</select><div id='counter'>" . count($list) . " Zeile(n)</div></div>";
        
        function SortArray ($_list, $attribute, $sortStatus)
        {
            if ($attribute == "spn-marge-euro" and $sortStatus == "DESC")
            {
                usort($_list,"CompareMargeEuroDESC");
                return $_list;
            }

            if ($attribute == "spn-marge-euro" and $sortStatus == "ASC")
            {
                usort($_list,"compareMargeEuroASC");
                return $_list;
            }

            if ($attribute == "spn-vk-preis" and $sortStatus == "DESC")
            {
                usort($_list,"compareVKPreisDESC");
                return $_list;
            }

            if ($attribute == "spn-vk-preis" and $sortStatus == "ASC")
            {
                usort($_list,"compareVKPreisASC");
                return $_list;
            }

            if ($attribute == "spn-marge-prozent" and $sortStatus == "DESC")
            {
                usort($_list,"compareMargeProzentDESC");
                return $_list;
            }

            if ($attribute == "spn-marge-prozent" and $sortStatus == "ASC")
            {
                usort($_list,"compareMargeProzentASC");
                return $_list;
            }

            if ($attribute == "spnBestand" and $sortStatus == "DESC")
            {
                usort($_list,"compareBestandDESC");
                return $_list;
            }

            if ($attribute == "spnBestand" and $sortStatus == "ASC")
            {
                usort($_list,"compareBestandASC");
                return $_list;
            }

            if ($attribute == "spnNullpreis" and $sortStatus == "DESC")
            {
                usort($_list,"compareNullpreisDESC");
                return $_list;
            }

            if ($attribute == "spnNullpreis" and $sortStatus == "ASC")
            {
                usort($_list,"compareNullpreisASC");
                return $_list;
            }

            if ($attribute == "spnGewicht" and $sortStatus == "DESC")
            {
                usort($_list,"compareGewichtDESC");
                return $_list;
            }

            if ($attribute == "spnGewicht" and $sortStatus == "ASC")
            {
                usort($_list,"compareGewichtASC");
                return $_list;
            }

            if ($attribute == "spnVersandklasse" and $sortStatus == "DESC")
            {
                usort($_list,"compareVersandklasseDESC");
                return $_list;
            }

            if ($attribute == "spnVersandklasse" and $sortStatus == "ASC")
            {
                usort($_list,"compareVersandklasseASC");
                return $_list;
            }

            if ($attribute == "spnMehrwertsteuer" and $sortStatus == "DESC")
            {
                usort($_list,"compareMwstDESC");
                return $_list;
            }

            if ($attribute == "spnMehrwertsteuer" and $sortStatus == "ASC")
            {
                usort($_list,"compareMwstASC");
                return $_list;
            }

            if ($attribute == "spn-ek-netto" and $sortStatus == "DESC")
            {
                usort($_list,"compareEKNettoDESC");
                return $_list;
            }

            if ($attribute == "spn-ek-netto" and $sortStatus == "ASC")
            {
                usort($_list,"compareEKNettoASC");
                return $_list;
            }

            if ($attribute == "spnPlattform-id" and $sortStatus == "DESC")
            {
                usort($_list,"comparePlattformIdDESC");
                return $_list;
            }

            if ($attribute == "spnPlattform-id" and $sortStatus == "ASC")
            {
                usort($_list,"comparePlattformIdASC");
                return $_list;
            }

            if ($attribute == "spnHersteller" and $sortStatus == "DESC")
            {
                usort($_list,"compareHerstellerDESC");
                return $_list;
            }

            if ($attribute == "spnHersteller" and $sortStatus == "ASC")
            {
                usort($_list,"compareHerstellerASC");
                return $_list;
            }

            if ($attribute == "spnArtikelname" and $sortStatus == "DESC")
            {
                usort($_list,"compareArtikelnameDESC");
                return $_list;
            }

            if ($attribute == "spnArtikelname" and $sortStatus == "ASC")
            {
                usort($_list,"compareArtikelnameASC");
                return $_list;
            }

            if ($attribute == "spnArtikelnummer" and $sortStatus == "DESC")
            {
                usort($_list,"compareArtikelnummerDESC");
                return $_list;
            }

            if ($attribute == "spnArtikelnummer" and $sortStatus == "ASC")
            {
                usort($_list,"compareArtikelnummerASC");
                return $_list;
            }

            if ($attribute == "spnPlattform" and $sortStatus == "DESC")
            {
                usort($_list,"comparePlattformDESC");
                return $_list;
            }

            if ($attribute == "spnPlattform" and $sortStatus == "ASC")
            {
                usort($_list,"comparePlattformASC");
                return $_list;
            }


            
        }
        
        function compareMargeEuroASC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["MargeEuro"]));
            $val2 =floatval(str_replace(',', '.', $value2["MargeEuro"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;

        }

        function compareMargeEuroDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["MargeEuro"]));
            $val2 =floatval(str_replace(',', '.', $value2["MargeEuro"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareVKPreisASC($value1, $value2) {

            $val1 = floatval(str_replace(',', '.', $value1["VKPreis"]));
            $val2 =floatval(str_replace(',', '.', $value2["VKPreis"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;

        }

        function compareVKPreisDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["VKPreis"]));
            $val2 =floatval(str_replace(',', '.', $value2["VKPreis"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;

        }

        function compareMargeProzentASC($value1, $value2) {

            $val1 = floatval(str_replace(',', '.', $value1["MargeProzent"]));
            $val2 =floatval(str_replace(',', '.', $value2["MargeProzent"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;

        }

        function compareMargeProzentDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["MargeProzent"]));
            $val2 =floatval(str_replace(',', '.', $value2["MargeProzent"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;

        }

        function compareBestandASC($value1, $value2) {

            $val1 = floatval(str_replace(',', '.', $value1["Bestand"]));
            $val2 =floatval(str_replace(',', '.', $value2["Bestand"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareBestandDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["Bestand"]));
            $val2 =floatval(str_replace(',', '.', $value2["Bestand"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareNullpreisASC($value1, $value2) {

            $val1 = floatval(str_replace(',', '.', $value1["Nullpreis"]));
            $val2 = floatval(str_replace(',', '.', $value2["Nullpreis"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareNullpreisDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["Nullpreis"]));
            $val2 = floatval(str_replace(',', '.', $value2["Nullpreis"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareGewichtASC($value1, $value2) {

            $val1 = floatval(str_replace(',', '.', $value1["Gewicht"]));
            $val2 = floatval(str_replace(',', '.', $value2["Gewicht"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareGewichtDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["Gewicht"]));
            $val2 = floatval(str_replace(',', '.', $value2["Gewicht"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareVersandklasseASC($value1, $value2) {

            $val1 =  $value1["VersandklasseName"];
            $val2 =  $value2["VersandklasseName"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareVersandklasseDESC($value1, $value2) {
            $val1 = $value1["VersandklasseName"];
            $val2 = $value2["VersandklasseName"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareMwstASC($value1, $value2) {

            $val1 =  $value1["Mwst"];
            $val2 =  $value2["Mwst"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareMwstDESC($value1, $value2) {
            $val1 = $value1["Mwst"];
            $val2 = $value2["Mwst"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareEKNettoASC($value1, $value2) {

            $val1 = floatval(str_replace(',', '.', $value1["EkNetto"]));
            $val2 = floatval(str_replace(',', '.', $value2["EkNetto"]));
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareEKNettoDESC($value1, $value2) {
            $val1 = floatval(str_replace(',', '.', $value1["EkNetto"]));
            $val2 = floatval(str_replace(',', '.', $value2["EkNetto"]));
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function comparePlattformIdASC($value1, $value2) {

            $val1 =  $value1["PlattformID"];
            $val2 =  $value2["PlattformID"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function comparePlattformIdDESC($value1, $value2) {
            $val1 = $value1["PlattformID"];
            $val2 = $value2["PlattformID"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareHerstellerASC($value1, $value2) {

            $val1 =  $value1["Hersteller"];
            $val2 =  $value2["Hersteller"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareHerstellerDESC($value1, $value2) {
            $val1 = $value1["Hersteller"];
            $val2 = $value2["Hersteller"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareArtikelnameASC($value1, $value2) {

            $val1 =  $value1["Artikelname"];
            $val2 =  $value2["Artikelname"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareArtikelnameDESC($value1, $value2) {
            $val1 = $value1["Artikelname"];
            $val2 = $value2["Artikelname"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function compareArtikelnummerASC($value1, $value2) {

            $val1 =  $value1["Artikelnummer"];
            $val2 =  $value2["Artikelnummer"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function compareArtikelnummerDESC($value1, $value2) {
            $val1 = $value1["Artikelnummer"];
            $val2 = $value2["Artikelnummer"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }

        function comparePlattformASC($value1, $value2) {

            $val1 =  $value1["Plattform"];
            $val2 =  $value2["Plattform"];
            if ($val1 < $val2) return -1;
            else if ($val1 > $val2) return 1;
            else return 0;
        }

        function comparePlattformDESC($value1, $value2) {
            $val1 = $value1["Plattform"];
            $val2 = $value2["Plattform"];
            if ($val1 > $val2) return -1;
            else if ($val1 < $val2) return 1;
            else return 0;
        }



        /**
         * @param $_list
         */
        function createTable ($_list, $_page, $_limit)
        {
            // TR: Table Head
            echo "<tbody>";
            
            for ($a = 0; $a < count($_list) ; $a++) {               
                
                // TR: Tabellen Content
                if($a>=($_page -1) * $_limit  && $a<($_limit) * $_page )
                {
                    
                    echo "<tr class='hover' >";
                    echo "<td id='td-edit' class='btnEdit'><a><img class='icon-art-setting' src='../image/icon-art-setting.png' /></a></td>";
                    echo "<td id='td-plattform'>" . $_list[$a]['Plattform'] . "</td>";
                    echo "<td id='td-artikelnummer'>" . $_list[$a]['Artikelnummer'] . "</td>";
                    echo "<td id='td-artikelname'>" . $_list[$a]['Artikelname'] . "</td>";
                    echo "<td id='td-hersteller'>" . $_list[$a]['Hersteller'] .  "</td>";
                    echo "<td id='td-plattform-id'>" . $_list[$a]['PlattformID'] . "</td>";
                    echo "<td id='td-ek-netto'>" . $_list[$a]['EkNetto'] . " &#8364</td>";
                    echo "<td id='td-mehrwertsteuer'><div id='steuer'>" . $_list[$a]['Mwst'] . " %</div></td>";
                    echo "<td id='td-versandklassenid'>" . $_list[$a]['Versandklasse'] . "</td>";
                    echo "<td id='td-versandklasse'>" .$_list[$a]['VersandklasseName'] . "</td>";
                    echo "<td id='td-gewicht'>" . $_list[$a]['Gewicht'] . "</td>";
                    echo "<td id='td-nullpreis'>" .  $_list[$a]['Nullpreis']  . "</td>";
                    echo "<td id='td-vk-preis'>". $_list[$a]['VKPreis'] . "</td>";
                    echo "<td id='td-marge-euro'>" . $_list[$a]['MargeEuro'] . "</td>";
                    echo "<td id='td-marge-prozent'>" .  $_list[$a]['MargeProzent'] . " %</td>";
                    echo "<td id='td-bestand'>" . $_list[$a]['Bestand'] . "</td>";
                    echo "<td id='td-ordner'>"  . $_list[$a]['Ordner'] . "</td>";
                    echo "</tr>";
                }
               
            }
            
            //Table Conclusion
            echo "</tbody>";
            echo "</table></form>";
        }
        


