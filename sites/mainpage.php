<?php
session_start();
if(isset($_SESSION["username"])) {     
    ?>
    <html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
		<link rel="icon" href="../Programm/pictures/icon.jpg">
		<script type="text/javascript">
		
		</script>
		<title>Startseite</title>
	</head>
	<body>
	<div id="header-bg">
			<a href="mainpage.php"><img id="header-logo" src="../image/verpacking-logo.png" /></a>
				<div id="menu">
					<ul>
						<li><a href="mainpage.php">Startseite</a></li>
						<li><a href="products.php">Produkte</a></li>
						<li><a href="statistik.php">Statistik</a></li>
					</ul>
				</div>
            <div id="buttons">
                <a href="login.php"><img title="Ausloggen" class="mini-button" name="Logout" alt="logout" src="../image/logoutbutton.png" /></a>
                <a href="help.php"><img title="Hilfe" class="mini-button" name="settings" alt="settings" src="../image/hilfebutton.png" /></a>
                <a href="settings.php"><img title="Einstellungen" class="mini-button" name="settings" alt="settings" src="../image/einstellungsbutton.png" /></a>
			</div>
		</div>
         <div class="content-bg">         
				    <strong class="ueberschrift" >Willkommen, <?php echo $_SESSION["username"]; ?></strong>
                    <br />
                    <article id="newsfeed"> 
                        Neuigkeiten: Du kannst nun unter dem Menüpunkt <b><a href="products.php">"Produkte"</a></b> alle Artikeldaten einsehen und ggf. ändern.
                    </article>
                    <div id="attentions">
                        <strong class="attention">Hinweis!</strong>
                        <article> 
                            Wir haben <strong class="attention" > 123 </strong> neue Artikel
                        </article> 
                        <article> 
                            <strong class="attention" > 123 </strong> Artikel sind Fehlerhaft!
                        </article>
                    </div>
                    <br />
                </div>
	</body>
</html>
<?php
} else {
    echo "erst ein loggen Bro";
}
?>
