<?php
        
include("mCon.php");
        
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");
        
$sql = "SELECT usernameid, username, forename, lastname, mail, isAdmin
                FROM tUser";
        
echo "<table id='tblUserlist'><thead>";
// Headline
echo "<tr><th>ID</th>";
echo "<th>Benutzername</th>";
echo "<th>Vorname</th>";
echo "<th>Nachname</th>";
echo "<th>Mail</th>";
echo "<th>Rolle</th></tr></thead>";    
 
        
foreach ($dbh->query($sql) as $row) {
    
    echo "<tr>"; 
    echo "<td>" .$row["usernameid"] . "</td>";   
    echo "<td>" .$row["username"] . "</td>";
    echo "<td>" . $row["forename"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["mail"] . "</td>";
    echo "<td>" . $row["isAdmin"] . "</td>";  
    echo "<td><form action='../sites/versandklassen-edit.php'><input type='button' class='btnEdit'></form></td>";
    echo "</tr>";
            
    }
        
//Table conclusion
echo "</tbody>";
echo "</table>";
        


?>