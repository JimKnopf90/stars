<?php
session_start();
if(isset($_SESSION["username"])) {     
    ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
		<link rel="icon" href="../image/icon.jpg">
		<script type="text/javascript">
		</script>
		<title>StaRs | Startseite</title>
	</head>
	<body>
    
        <header>
            <nav>
                <a href="mainpage.php"><img id="header-logo" src="../image/verpacking-logo.png" /></a>
                <ul id="nav">
                    <li><a class="active" href="mainpage.php">Startseite</a></li>
                    <li><a class="inactive" href="products.php">Produkte</a></li>
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
        <div class="background">
        <div class="divider"></div>
        <!-- <div id="banner"><img src="../image/banner-1.png"/></div> 
        <div class="divider"></div>-->
            <div id="content-mainpage">
                <h1>Wilkommen, <?php echo $_SESSION["username"]; ?></h1>
            <div id="news">
                <h2>Neuigkeiten!</h2>
                <ul><h3>Es wurden <span class="attention">14</span> fehlerhafte Artikel gefunden.</h3>
                <h3>Es wurden <span class="info">7</span> neue Artikel gefunden.</h3>
                <h3>Bitte überprüfe umgehend die fehlerhaften Artikel! Diese findest du <a href="attentions.php">Hier</a></h3>
                <h3>Sollte es Probleme geben, wende dich bitte an die zuständige Person.</h3>
                <h3>Neue <span class="info">Statistiken</span> sind verfügbar!</h3>
                <h3>Der <span class="info">Repricer</span> ist jetzt auch am Start!</h3>
                <h3><span class="info">Timm</span> nascht gern Kot.</h3>
                <h3>Es wurden <span class="info">7</span> neue Artikel gefunden.</h3>
                <h3>Bitte überprüfe umgehend die fehlerhaften Artikel! Diese findest du <a href="attentions.php">Hier</a></h3>
                <h3>Sollte es Probleme geben, wende dich bitte an die zuständige Person.</h3>
                <h3>Neue <span class="info">Statistiken</span> sind verfügbar!</h3>
                <h3>Der <span class="info">Repricer</span> ist jetzt auch am Start!</h3>
                <h3><span class="info">Timm</span> nascht gern Kot.</h3>
                </ul>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
} else {
    echo "erst ein loggen Bro";
}
?>