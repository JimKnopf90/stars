<?php


include("mCon.php");

$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$dbusername","$pw");

$sql = "UPDATE tVersandklassen SET VersandklasseJTL = '" . $_POST['VersandklasseJTL'] . "', Preis = " . number_format(floatval($_POST['Preis']),2, ".", ",") .
", PreisVerpackungskosten = " . number_format(floatval($_POST['PreisVerpackungskosten']),2, ".", ",") . ", GewichtMax = " . number_format(floatval($_POST['GewichtMax']),2, ".", ",") . ", MesswerteMax = " .number_format(floatval($_POST['MesswerteMax']),2, ".", ",") . " WHERE VersandklassenID = " . $_POST['VersandklassenID'];

echo $sql;

$bz = $dbh->exec($sql);

?>