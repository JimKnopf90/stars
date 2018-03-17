<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="../css/table-stylesheet.css">		
		<link rel="icon" href="../image/icon.jpg">
        <script src="../js/products.js" type="text/javascript"></script>
        <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        
        
		
		<title>StaRs | Produkte</title>
	</head>
	<body>
	<label id="myLabel"></label>
        <header>
            <nav>
                <a href="mainpage.php"><img id="header-logo" src="../image/verpacking-logo.png" /></a>
                <ul id="nav">
                    <li><a class="inactive" href="mainpage.php">Startseite</a></li>
                    <li><a class="active" href="products.php">Produkte</a></li>
                    <li><a class="inactive" href="mainpage.php">Stammartikel</a></li>
                    <li><a class="inactive" href="mainpage.php">Fehlermeldungen</a></li>
                    <li><a class="inactive" id="rechts" href="statistic.php">Statistiken</a></li>
                    <a href="login.php"><img class="icons"src="../image/icon-information.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-help.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-settings.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-logout.png" /></a>
                </ul>
            </nav>
        </header>
        <div class="divider"></div>
       
	</body>
</html>



<?php
 include("../business-logic/mProducts.php");
?>
























