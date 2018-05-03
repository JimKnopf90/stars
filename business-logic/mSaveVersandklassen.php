<?php


include("mCon.php");

$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");

$sql = "UPDATE tVersandklassen SET VersandklasseJTL = '" . $_POST['VersandklasseJTL'] . "', Preis = " . str_replace(',', '.',$_POST['Preis']) .
", PreisVerpackungskosten = " . str_replace(',', '.', $_POST['PreisVerpackungskosten']) . ", GewichtMax = " . str_replace(',', '.',$_POST['GewichtMax']) . ", MesswerteMax = " . str_replace(',', '.',$_POST['MesswerteMax'] ). " WHERE VersandklassenID = " . $_POST['VersandklassenID'];


$bz = $dbh->exec($sql);

