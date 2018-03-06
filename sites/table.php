<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/table-stylesheet.css">
		<link rel="icon" href="../image/icon.jpg">
		<script type="text/javascript">
	function div_change(strID){
        document.getElementById(strID).style.display = (document.getElementById(strID).style.display == 'none' ) ? 'block' : 'none';
        document.getElementById(strID + "_shown").style.display = (document.getElementById(strID + "_shown").style.display == 'none' ) ? 'block' : 'none';
        document.getElementById(strID + "_hidden").style.display = (document.getElementById(strID + "_hidden").style.display == 'none' ) ? 'block' : 'none';
 }
		</script>
		<title>Tabellen-Testseite</title>
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
            <table>
                <tr>
                    <th class="table-plattform">Plattform</th>
                    <th class="table-artikelnummer">Artikelnummer</th>
                    <th class="table-artikelname">Artikelname</th>
                    <th class="table-hersteller">Hersteller</th>
                    <th class="table-plattform-id">Plattform-ID</th>
                    <th class="table-ek-netto">EK-Netto</th>
                    <th class="table-mehrwertsteuer">Mwst.</th>
                    <th class="table-versandklasse">Versandklasse</th>
                    <th class="table-versandklasse">Gewicht</th>
                    <th class="table-verkaufspreis">Verkaufspreis</th>
                    <th class="table-nullpreis">Nullpreis</th>
                    <th class="table-marge-euro">Marge in €</th>
                    <th class="table-marge-prozent">Marge in %</th>
                    <th class="table-bestand">Bestand</th>
                    <th class="table-ordner">Ordner</th>
                </tr>                
            </table>
            
            
		</div>   
	</body>
</html>



























