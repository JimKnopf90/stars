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
                    <li><a class="inactive" id="rechts" href="statistic.php">Statistiken</a></li>
                </ul>
                <div id="nav-icons">
                <a href="login.php"><img class="icons"src="../image/icon-information.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-help.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-settings.png" /></a>
                    <a href="login.php"><img class="icons" src="../image/icon-logout.png" /></a>
                </div>
            </nav>
        </header>
        <div class="background">
        <div class="divider"></div>
            <div id="content-mainpage">
                <h1>Wilkommen, <?php echo $_SESSION["username"]; ?></h1>
            <div id="news">
                <div class="beitrag-left">
                    <div class="beitrag">
                        <h3>Betaphase bis zur Freigabe von 1.0</h3>
                        <h5>
                            <p>Die Webanwendung befindet sich noch für unbestimmte Zeit in der Betaphase</p>
                            <p><span>Testphase</span></p>
                            <p>Es werden alle Funktionen der Anwendung getestet. Es kann durchaus vorkommen, dass auch nach der Freigabe des Programmes noch Fehler auftauchen können.</p>
                            <p>Sollten Fehler auftauchen, bitte an eine E-Mail an: blablabla@blabla.de senden</p>
                        </h5>
                        <h6>Von: Daniel Reichert - 25.04.2018</h6>
                    </div>
                </div> 
                <div class="beitrag-right">
                    <div class="beitrag">
                        <h3>Beitrag #2 - Hier steht der Titel des Beitrages aus- und fett geschrieben</h3>
                        <h5>
                            Der inhalt sollte nicht mehr als 500 Zeichen inkl. Leerzeichen haben.</br>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</br>
                    At vero eos et accusam et justo duo dolores et ea rebum. </br>
                    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et e</h5>
                        <h6>Von: Daniel Reichert - 25.04.2018</h6>
                    </div>
                </div>
                <div class="beitrag-left">
                    <div class="beitrag">
                        <h3>Beitrag #1 - Hier steht der Titel des Beitrages aus- und fett geschrieben</h3>
                        <h5>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
                            <p><span>At vero eos et accusam et justo duo dolores et ea rebum.</span></p>
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
                            <p><span>At vero eos et accusam et justo duo dolores et ea rebum.</span> Mehr lesen...</p>
                            </h5>
                        <h6>Von: Daniel Reichert - 25.04.2018</h6>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    </body>
</html>
<?php
} else {
    header("Location: ../sites/login.php"); 
}
?>