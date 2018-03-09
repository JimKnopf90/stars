<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="../css/table-stylesheet.css">
		<link rel="icon" href="../image/icon.jpg">
        <script type="text/javascript"> 
		</script>
		<title>StaRs | Produkte</title>
	</head>
	<body>
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
        <table>
            <tr id="table-header">
                <th ><a href="login.php"><img class="icon-setting" src="../image/icon-settings.png" /></a></th>
                <th >Plattform</th>
                <th>Artikelnummer</th>
                <th>Artikelname</th>
                <th>Hersteller</th>
                <th>Plattform ID</th>
                <th>EK Netto</th>
                <th>Mwst.</th>
                <th>Versandklasse</th>
                <th>Gewicht</th>
                <th>Nullpreis</th>
                <th>Verkaufspreis</th>
                <th>Marge in €</th>
                <th>Marge in %</th>
                <th>Bestand</th>
                <th>Produktgruppe</th>
            </tr>
            
            <!-- Hier die Filterfunktion -->
            <tr id="table-filter">
                <th ><a href="#"><img class="icon-setting" src="../image/icon-settings.png" /></a></th>
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>eBay Verpacking_com</option>
                        <option>eBay Verpackung-Berlin</option>
                        <option>Amazon</option>
                        <option>real.de</option>
                        <option>Rakuten</option>
                        <option>Webshop Verpacking</option>
                    </select>
                </td>
                
                <td>
                    <input type="text" name="artikelnummer" placeholder="Artikelnummer">
                </td>
                
                <td>
                    <input type="text" name="artikelname" placeholder="Artikelname">
                </td>
               
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>Verpacking</option>
                        <option>Herlitz</option>
                        <option>Tesa</option>
                        <option>Edding</option>
                        <option>Brennenstuhl</option>
                        <option>Staedtler</option>
                    </select>
                </td>
                
                <td>
                    <input type="text" name="Plattform-ID" placeholder="Artikelname">
                </td>
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td>
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>19 %</option>
                    </select>
                </td> 
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>GB | 1,20€</option>
                        <option>MB | 2,15€</option>
                        <option>GLS | 2,92€</option>
                        <option>GLS | 3,37€</option>
                        <option>GLS | 3,88€</option>
                        <option>GLS | 6,03€</option>
                        <option>GLS | 14,39€</option>
                        <option>NB Rolle | 2,50€</option>
                    </select>
                </td> 
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td>
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td>
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td> 
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td>
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td> 
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>aufsteigend</option>
                        <option>absteigend</option>
                    </select>
                </td>
                
                <td>
                    <select class="dropdown">
                        <option>---</option>
                        <option>Faltkartons</option>
                        <option>Bürobedarf</option>
                        <option>Klebeband</option>
                        <option>Hinzufügen + </option>
                    </select>
                </td>
            </tr>
            <!-- Hier kommt die eigentliche Tabelle -->
            <tr class="hover">
                <td ><a href="#"><img class="icon-setting" src="../image/icon-settings.png" /></a></td>
                <td>Amazon</td>    
                <td>SKU-VON-AMZN</td>    
                <td>1 Gelisteter Artikel von Amazon</td>        
                <td>Musterhersteller</td>        
                <td> H13RD13A5IN</td>        
                <td> 10,99 €</td>        
                <td> 19 %</td>        
                <td> GLS | 3,26</td>        
                <td> 3,5 kg</td>        
                <td> 19,77 €</td>        
                <td> 20,55 €</td>        
                <td> - 0,78 €</td>        
                <td> - 23 %</td>        
                <td> -10 Stk.</td>        
                <td> Mustergruppe</td>   
            </tr> 
            
            <tr class="hover">
                <td ><a href="#"><img class="icon-setting" src="../image/icon-settings.png" /></a></td>
                <td>Amazon</td>    
                <td>SKU-VON-AMZN</td>    
                <td>1 Gelisteter Artikel von Amazon</td>        
                <td>Musterhersteller</td>        
                <td> H13RD13A5IN</td>        
                <td> 10,99 €</td>        
                <td> 19 %</td>        
                <td> GLS | 3,26</td>        
                <td> 3,5 kg</td>        
                <td> 19,77 €</td>        
                <td> 20,55 €</td>        
                <td> - 0,78 €</td>        
                <td> - 23 %</td>        
                <td> -10 Stk.</td>        
                <td> Mustergruppe</td>   
            </tr>
            
            <tr class="hover">
                <td ><a href="#"><img class="icon-setting" src="../image/icon-settings.png" /></a></td>
                <td>eBay Verpacking_com</td>    
                <td>900001-001</td>    
                <td>1 Gelisteter Artikel von eBay</td>        
                <td>Hersteller Muster</td>        
                <td> 546546546546</td>        
                <td> 14,99 €</td>        
                <td> 7 %</td>        
                <td> GLS | 6,08</td>        
                <td> 14,7 kg</td>        
                <td> 39,97 €</td>        
                <td> 34,64</td>        
                <td> 4,70 €</td>        
                <td> 6 %</td>        
                <td> 40 Stk.</td>        
                <td> eBay Artikel</td>   
            </tr>
            
            <tr class="hover">
                <td ><a href="#"><img class="icon-setting" src="../image/icon-settings.png" /></a></td>
                <td>eBay Verpackung-berlin</td>    
                <td>900001-001</td>    
                <td>1 Gelisteter Artikel von eBay</td>        
                <td>Hersteller Muster</td>        
                <td> 546546546546</td>        
                <td> 14,99 €</td>        
                <td> 7 %</td>        
                <td> GLS | 6,08</td>        
                <td> 14,7 kg</td>        
                <td> 39,97 €</td>        
                <td> 34,64</td>        
                <td> 4,70 €</td>        
                <td> 6 %</td>        
                <td> 40 Stk.</td>        
                <td> eBay Artikel</td>   
            </tr>
        </table>
	</body>
</html>



<?php
// include("../business-logic/mProducts.php");
?>
























