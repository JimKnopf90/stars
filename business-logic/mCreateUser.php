<?php

include("mCon.php");

$role = $_POST["user-role"];

if ($role == "Administrator")
{
    $role = 1;
} else {
    $role = 0 ;
}
  


$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");

$sql = "INSERT INTO tUser (username, password, forename, lastname, mail, isAdmin) 
        VALUES ('" . $_POST["username"] . "', '" .md5($_POST['password']) . "', '" . $_POST['forename'] . "', '" .$_POST['lastname']     . "', '" . $_POST['mail'] . "', $role)";

$bz = $dbh->exec($sql);

header("Location: ../sites/admin-users.php"); 

?>