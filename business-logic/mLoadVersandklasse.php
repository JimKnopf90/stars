<?php
        
include("mCon.php");
        
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT VersandklassenID, VersandklasseJTL, Preis, PreisVerpackungskosten, GewichtMax, MesswerteMax
                FROM tVersandklassen";
        
echo "<table id='tblVersandklassen'><thead>";
// Headline
echo "<tr><th>ID</th>";
echo "<th>Versandklasse</th>";
echo "<th>Versandkosten</th>";
echo "<th>Verpackungskosten</th>";
echo "<th>max. Gewicht</th>";     
echo "<th>max. Ma&szlig;e</th></tr></thead>";     
        
foreach ($dbh->query($sql) as $row) {
    
    echo "<tr class='user-table-hover'>"; 
    echo "<td id='versandklassenID'>" .$row["VersandklassenID"] . "</td>";
    echo "<td>" .$row["VersandklasseJTL"] . "</td>";
    echo "<td>" . number_format(floatval($row["Preis"]),2, ",", ".") . "</td>";
    echo "<td>" . number_format(floatval($row["PreisVerpackungskosten"]),2, ",", ".") . "</td>";
    echo "<td>" . number_format(floatval($row["GewichtMax"]),2, ",", ".") . "</td>";
    echo "<td>" . number_format(floatval($row["MesswerteMax"]),2, ",", ".") . "</td>";  
    echo "<td><form action='../sites/versandklassen-edit.php'><input type='button' value=". $row["VersandklassenID"] ." class='btnEdit'></form></td>";
    echo "</tr>";
            
    }
        
//Table conclusion
echo "</tbody>";
echo "</table>";
        


