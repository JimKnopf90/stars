<?php
        
include("mCon.php");
        
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT VersandklassenID, VersandklasseJTL, Preis, PreisVerpackungskosten, GewichtMax, MesswerteMax
                FROM tVersandklassen WHERE VersandklassenID = " . $idVersandklasse;       

        
foreach ($dbh->query($sql) as $row) { 
    
    echo "<form action='../business-logic/mSaveVersandklassen.php' method='post'>";
    echo "<input id='input_delete' type='text' name='VersandklassenID' value=" . $row["VersandklassenID"] . ">";
    echo "<p>Versandklasse</p><input class='input_text' type='text' name='VersandklasseJTL' value='" . $row["VersandklasseJTL"] . "'>";
    echo "<p>Versandkosten</p><input class='input_text' type='text' name='Preis' value=" . number_format(floatval($row["Preis"]),2, ",", ".") . ">";
    echo "<p>Verpackungskosten</p><input class='input_text' type='text' name='PreisVerpackungskosten' value=" . number_format(floatval($row["PreisVerpackungskosten"]),2, ",", ".") . ">";
    echo "<p>max. Gewicht</p><input class='input_text' type='text' name='GewichtMax' value=" . number_format(floatval($row["GewichtMax"]),2, ",", ".") . ">";
    echo "<p>max. Maße</p><input class='input_text' type='text' name='MesswerteMax' value=" . number_format(floatval($row["MesswerteMax"]),2, ",", ".") . ">";  
    echo "<input id='btn_submit' type='submit' value='Daten Speichern'>"; 
    echo "<input id='btn_close' type='submit' value='Schließen'></form>";   
   
            
    }
        

        
