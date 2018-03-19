<?php
        
include("mCon.php");
        
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT VersandklassenID, VersandklasseJTL, Preis, GewichtMax, MesswerteMax
                FROM tVersandklassen";
        
echo "<table><thead>";
// Headline
echo "<tr><th>ID</th>";
echo "<th>Versandklasse</th>";
echo "<th>Versandkosten</th>";
echo "<th>max. Gewicht</th>";     
echo "<th>max. Maﬂe</th></tr></thead>";     
        
foreach ($dbh->query($sql) as $row) {
    
    echo "<tr>"; 
    echo "<td>" .$row["VersandklassenID"] . "</td>";
    echo "<td>" .$row["VersandklasseJTL"] . "</td>";
    echo "<td>" . number_format(floatval($row["Preis"]),2, ",", ".") . "</td>";
    echo "<td>" . number_format(floatval($row["GewichtMax"]),2, ",", ".") . "</td>";
    echo "<td>" . number_format(floatval($row["MesswerteMax"]),2, ",", ".") . "</td>";  
    echo "<td><form action='../sites/versandklassen-edit.php'><input type=button name=id value=". $row["VersandklassenID"] ." id='btnEdit'></form></td>";
    echo "</tr>";
            
    }
        
//Table conclusion
echo "</tbody>";
echo "</table>";
        


?>