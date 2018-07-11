<?php
   
include("mConErp.php");

$gesamtWarenwert = 0;
$y = 0;
$list = [];
$b = 0;
 //Paging
$limit = 30;

 if (isset($_GET["page"])) { 
        $page  = $_GET["page"];       
    } else { 
        $page=1;        
    };   
    

$start_from = ($page-1) * $limit; 

$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT        Tabelle.kKategorie, dbo.tKategorieSprache.cName AS 'Kategoriename', Tabelle.kOberKategorie, Tabelle.kArtikel, Tabelle.cArtNr, Tabelle.cName, Tabelle.fLagerbestand, Tabelle.fZulauf, Tabelle.fInAuftraegen, Tabelle.fVerfuegbar, dbo.tliefartikel.fEKNetto
FROM            (SELECT        dbo.tkategorie.kKategorie, dbo.tkategorie.kOberKategorie, dbo.tkategorieartikel.kArtikel, dbo.tArtikel.cArtNr, dbo.tArtikelBeschreibung.cName, dbo.tlagerbestand.fLagerbestand, 
                                                    dbo.tlagerbestand.fZulauf, dbo.tlagerbestand.fInAuftraegen, dbo.tlagerbestand.fVerfuegbar
                          FROM            dbo.tkategorie INNER JOIN
                                                    dbo.tkategorieartikel ON dbo.tkategorie.kKategorie = dbo.tkategorieartikel.kKategorie INNER JOIN
                                                    dbo.tArtikel ON dbo.tkategorieartikel.kArtikel = dbo.tArtikel.kArtikel INNER JOIN
                                                    dbo.tArtikelBeschreibung ON dbo.tkategorieartikel.kArtikel = dbo.tArtikelBeschreibung.kArtikel INNER JOIN
                                                    dbo.tlagerbestand ON dbo.tkategorieartikel.kArtikel = dbo.tlagerbestand.kArtikel
                          WHERE        (dbo.tkategorie.kOberKategorie IN
                                                        (SELECT        kKategorie
                                                          FROM            dbo.tkategorie AS tkategorie_1
                                                          WHERE        (kOberKategorie = 39))) OR
                                                    (dbo.tkategorie.kOberKategorie = 39)) AS Tabelle INNER JOIN
                         dbo.tliefartikel ON Tabelle.kArtikel = dbo.tliefartikel.tArtikel_kArtikel INNER JOIN dbo.tKategorieSprache ON dbo.tKategorieSprache.kKategorie = Tabelle.kKategorie
WHERE        (dbo.tliefartikel.tLieferant_kLieferant = 34)";

    /** Überschriften **/
echo '<table id="lb-table">';
    echo '<tr id="lb-table-header">';
        echo '<th>Kategorie</th>';
        echo '<th>Art.Nr.</th>';
        echo '<th>Art.Name</th>';
        echo '<th>ges. Lagerbestand</th>';
        echo '<th>in Aufträgen</th>';
        echo '<th>verf. Lagerbestand</th>';
        echo '<th>Bestandswert</th>';
    echo '</tr>';

    /** Kategoriefilter **/
    echo '<tr>';        
        echo '<td>';
            echo '<select id="lb-table-filter-kategorie">';
                echo '<option></option>';
                echo '<option>Faltkartons</option>';
                echo '<option>Maxibriefkartons</option>';
                echo '<option>Großbriefkartons</option>';
                echo '<option>Klebeband</option></td>';
            echo '</select>';
        echo '</td>';

        /** Input Artikelnummer **/
        echo '<td>';
            echo '<input id="lb-table-filter-artikelnummer" type="text">';
        echo '</td>';

        /** Input Artikelname **/
        echo '<td>';
            echo '<input id="lb-table-filter-artikelname" type="text">';
        echo '</td>';

        /** Lagerbestandsfilter **/
        echo '<td>';
            echo '<select id="lb-table-filter-gesamter-lagerbestand">';
                echo '<option></option>'; 
                echo '<option>niedrigster</option>'; 
                echo '<option>höchster</option></select></td>'; 
            echo '</select>'; 
        echo '</td>';

        /** in Aufträgen Filter **/
        echo '<td>';
            echo '<select id="lb-table-filter-auftraege">';
                echo '<option></option>'; 
                echo '<option>niedrigster</option>'; 
                echo '<option>höchster</option></select></td>'; 
            echo '</select>'; 
        echo '</td>'; 

        /** verfügbarer Lagerbestand **/
        echo '<td>';
            echo '<select id="b-table-filter-verf-lagerbestand">';
                echo '<option></option>'; 
                echo '<option>niedrigster</option>'; 
                echo '<option>höchster</option></select></td>'; 
            echo '</select>'; 
        echo '</td>'; 

        /** Bestandsübersicht **/
        echo '<td>';
            echo '<select id="b-table-filter-bestandswert">';
                echo '<option></option>'; 
                echo '<option>niedrigster</option>'; 
                echo '<option>höchster</option></select></td>'; 
            echo '</select>'; 
        echo '</td>';
    echo '</tr>';


    foreach ($dbh->query($sql) as $row) {
        
        $istBestandswert = (floatval($row["fEKNetto"])) * (floatval($row["fVerfuegbar"])); 
        
        
         $list[$y]['Kategoriename'] = $row['Kategoriename'];
         $list[$y]['cArtNr'] = $row['cArtNr'];
         $list[$y]['cName'] = $row['cName'];
         $list[$y]['fLagerbestand'] = $row["fLagerbestand"];
         $list[$y]['fInAuftraegen'] = $row["fInAuftraegen"];
         $list[$y]['fVerfuegbar'] = $row["fVerfuegbar"];
         $list[$y]['istBestandswert'] = $istBestandswert;
            
        $gesamtWarenwert = $gesamtWarenwert + $istBestandswert;
        $y = $y + 1;
    }

  for ($a = 0; $a < count($list) ; $a++) {               
                
                // TR: Tabellen Content
                if($a>=($page -1) * $limit  && $a<($limit) * $page )
                {
                    echo '<tr class="user-table-hover">'; 
                    echo '<td>' .$list[$a]['Kategoriename'] . '</td>';
                    echo '<td>' .$list[$a]['cArtNr'] . '</td>';
                    echo '<td>' .$list[$a]['cName'] . '</td>';
                    echo '<td>' .$list[$a]['fLagerbestand'] . '</td>';
                    echo '<td>' .$list[$a]['fInAuftraegen'] . '</td>';
                    echo '<td>' .$list[$a]['fVerfuegbar']. '</td>';
                    echo '<td>' .$list[$a]['istBestandswert']. '</td>';
                }
               
            }
    
echo '</table>';
echo '<span>Gesamtwarenwert: </span>' . number_format($gesamtWarenwert,2, ",", "." ) . " €" ;

$total_pages = ceil(count($list) / $limit);

        $pagLink = "<div id='paging' class='pagination'><div id='pagenumber'> Seite: " . $page . "</div>";
        
        for ($i=1; $i<=$total_pages; $i++) {          
            if ($i <= 10) {
                $pagLink .= "<a class='pagingElement' href='admin-lagerbestand.php?page=".$i."'>".$i."</a>";
            } else {
                if ($i == 11) {
                    $pagLink .= "<select onchange=\"location = this.value;\"><option value='' selected disabled hidden>Seite wählen</option><option class='pagingElement' value='admin-lagerbestand.php?page=".$i."'>$i</option>";
                }
                else {
                    $pagLink .= "<option class='pagingElement' value='admin-lagerbestand.php?page=".$i."'>$i</option>";
                }

              
            }
            
        };
     echo $pagLink . "</select><div id='counter'>" . count($list) . " Zeile(n)</div></div>";   


















