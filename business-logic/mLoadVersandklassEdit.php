<?php
        
include("mCon.php");
        
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT VersandklassenID, VersandklasseJTL, Preis, GewichtMax, MesswerteMax
                FROM tVersandklassen WHERE VersandklassenID = " . $idVersandklasse;       

        
foreach ($dbh->query($sql) as $row) { 
    
    echo "<form action='../business-logic/mSaveVersandklassen.php' method='post'>";
    echo "<input type='text' name='VersandklassenID' value=" . $row["VersandklassenID"] . ">";
    echo "<input type='text' name='VersandklasseJTL' value=" . $row["VersandklasseJTL"] . ">";
    echo "<input type='text' name='Preis' value=" . number_format(floatval($row["Preis"]),2, ",", ".") . ">";
    echo "<input type='text' name='GewichtMax' value=" . number_format(floatval($row["GewichtMax"]),2, ",", ".") . ">";
    echo "<input type='text' name='MesswerteMax' value=" . number_format(floatval($row["MesswerteMax"]),2, ",", ".") . ">";  
    echo "<input type='submit'></form>";   
   
            
    }
        

        


?>