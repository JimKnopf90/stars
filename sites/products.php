<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
		<link rel="icon" href="../image/icon.jpg">
		<script type="text/javascript">
            function div_change(strID){
            document.getElementById(strID).style.display = (document.getElementById(strID).style.display == 'none' ) ? 'block' : 'none';
            document.getElementById(strID + "_shown").style.display = (document.getElementById(strID + "_shown").style.display == 'none' ) ? 'block' : 'none';
            document.getElementById(strID + "_hidden").style.display = (document.getElementById(strID + "_hidden").style.display == 'none' ) ? 'block' : 'none';
        }
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
        
        <!-- JAVASCRIPT -->
        
		<div class="content-bg">
            <div id="headline">
                <li>Plattform</li> <!-- fester Wert -->
                <li>Artikelnummer</li> <!-- fester Wert -->
                <li>ASIN </li> <!-- fester Wert "hier noch auf den artikel verlinken Beispiel:   https://www.amazon.de/dp/B07B3PZDNR/ " -->
                <li>Produktname </li> <!-- fester Wert -->
                <li>Gesamt EK Netto </li> <!-- fester Wert -->
                <li>Mwst. </li> <!-- fester Wert -->
                <li>Versandklasse </li> <!-- wert kann man ändern -->
                <li>Versandkosten </li> <!-- wert kann man ändern -->
                <li>Nullpreis </li> <!-- fester Wert -->
                <li>Marge in € </li> <!-- fester Wert -->
                <li>Marge in % </li>
                <li><a href="javascript:/" onClick="div_change(1)"><img title="Suche öffnen und schließen" id="pic-lupe" src="../image/icon-lupe.png"></a></li><!-- fester Wert -->
            </div>
            <div id="javascript-search">
                <div id="1">
                    <form action="mainpage.php" method="post">
                    <!-- Der Inhalt dieses Divs wird immer ein und ausgeblendet.-->
                        <div id="search-articles">
                            <select class="Dropdown">
                                <option>-- Auswählen --</option>
                                <option>eBay</option>
                                <option>Amazaon</option>
                                <option>Rakuten</option>
                                <option>Webshop Verpacking</option>
                            </select>
                            <input id="input-artikelnummer" type="text" name="search" placeholder="Artikelnummer/SKU">
                            <input id="input-asin" type="text" name="search" placeholder="ASIN">
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</body>
</html>


























