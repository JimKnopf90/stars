<?php
   
include("mCon.php");
        
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT BestandsID, Kategorie, Artikelnummer, Artikelname, gesamterLagerbestand, inAuftraegen, verfuegbarerLagerbestand, istBestandswert
                FROM tLagerbestand";

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
        echo '<tr class=" user-table-hover">'; 
            echo '<td>' .$row["Kategorie"] . '</td>';
            echo '<td>' .$row["Artikelnummer"] . '</td>';
            echo '<td>' .$row["Artikelname"] . '</td>';
            echo '<td>' . number_format(floatval($row["gesamterLagerbestand"]),2, ",", ".") . '</td>';;
            echo '<td>' . number_format(floatval($row["inAuftraegen"]),2, ",", ".") . '</td>';
            echo '<td>' . number_format(floatval($row["verfuegbarerLagerbestand"]),2, ",", ".") . '</td>';
            echo '<td>' . number_format(floatval($row["istBestandswert"]),2, ",", ".") . '</td>';
    }

echo '</table>';
        

?>
















