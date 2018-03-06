<?php
    $hostname = "192.168.138.165";
    $port = 1433;
    $dbname = "StaRsDB";
    $dbusername = "sa";
    $pw = "abc:0102";
    
    $dbh = new PDO ("sqlsrv:Server=$hostname,$port;Database=$dbname","$dbusername","$pw");
    
    $sql = "SELECT COUNT(*) FROM tUser WHERE username = :username AND password = :password";
        

?>