<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/table-stylesheet.css">
		<link rel="icon" href="../image/icon.jpg">
		<script type="text/javascript">
        
        </script>
		<title>Produkte verwalten</title>
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
                <table>
                    <tr id="table-header">
                        <th ></th>
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
                        <th><img id="pic-lupe" src="../image/icon-lupe.png"></th>
                    </tr>
                    <!-- bis hier die überschriften von der Tabelle -->
                    <!-- ab hier die Filter funktion und soll ausgeblendet werden! -->
                    <!-- ***************** FILTER **************  -->
                    <tr id="table-filter">
                        <th>
                        
                        </th>
                        
                        <th>
                            <div class="hd-tb-plattform">
                                <select class="dropdown">
                                    <option>---</option>
                                    <option>eBay Verpacking_com</option>
                                    <option>eBay Verpackung-Berlin</option>
                                    <option>Amazon</option>
                                    <option>real.de</option>
                                    <option>Rakuten</option>
                                    <option>Webshop Verpacking</option>
                                </select>
                            </div>
                        </th>
                        
                        <th>
                            <div id="artikelnummer">
                                <input type="text" name="artikelnummer" placeholder="Artikelnummer">
                            </div>    
                        </th>
                        
                        <th>
                            <div id="artikelname">
                                <input type="text" name="artikelname" placeholder="Artikelname">
                            </div> 
                        </th>
                        
                        <th>
                            <div id="hersteller">
                                <input type="text" name="datalist-hersteller" list="datalist-hersteller" placeholder="Hersteller">
                                <datalist id="datalist-hersteller">
                                    <option value="Herlitz"></option>
                                    <option value="Staedtler"></option>
                                    <option value="Brennenstuhl"></option>
                                    <option value="Schneider"></option>
                                </datalist>
                            </div>
                        </th>
                        
                        <th>
                            <div id="plattform-id">
                                <input type="text" name="plattform-id" placeholder="Plattform-ID">
                            </div>
                        </th>
                        
                        <th>
                            <div id="ek-netto">
                                <select class="dropdown">
                                    <option>---</option>
                                    <option>aufsteigend</option>
                                    <option>absteigend</option>
                                </select>
                            </div>
                        </th>
                        
                        <th>
                            <div id="mehrwertsteuer">
                                <select class="Dropdown">
                                    <option>---</option>
                                    <option>7 %</option>
                                    <option>19 %</option>
                                </select>
                            </div>    
                        </th>
                        
                        <th>
                            <div id="versandklasse">
                                <select class="dropdown">
                                    <option>---</option>
                                    <option>Großbrief | 1,20€</option>
                                    <option>Maxibrief | 2,15€</option>
                                    <option>GLS | 3,26€</option>
                                    <option>GLS | 5,90€</option>
                                    <option>GLS | 10,55€</option>
                                </select>
                            </div>
                        </th>
                        
                        <th>
                            <div id="gewicht">
                                 <select class="dropdown">
                                        <option>---</option>
                                        <option>aufsteigend</option>
                                        <option>absteigend</option>
                                </select>    
                            </div>
                        </th>    
                            
                        <th>
                            <div id="nullpreis">
                                 <select class="dropdown">
                                        <option>---</option>
                                        <option>aufsteigend</option>
                                        <option>absteigend</option>
                                </select>    
                            </div>
                        </th>
                        
                        <th>
                           <div id="verkaufspreis">
                                <select class="dropdown">
                                    <option>---</option>
                                    <option>aufsteigend</option>
                                    <option>absteigend</option>
                                </select>
                            </div>
                        </th>
                        
                        <th>
                            <div id="marge-euro">
                                <select class="dropdown">
                                    <option>---</option>
                                    <option>aufsteigend</option>
                                    <option>absteigend</option>
                                </select>    
                            </div>
                        </th>
                        
                        <th>
                            <div id="marge-prozent">
                               <select class="dropdown">
                                    <option>---</option>
                                    <option>aufsteigend</option>
                                    <option>absteigend</option>
                                </select>       
                            </div>
                        </th>
                        
                        <th>
                            <div id="bestand">
                                <select class="dropdown">
                                    <option>---</option>
                                    <option>aufsteigend</option>
                                    <option>absteigend</option>
                                </select>    
                            </div>
                        </th>
                        
                        <th>
                            <div id="produktgruppe">
                            <input type="text" name="datalist-produktgruppe" list="datalist-produktgruppe">
                                <datalist id="datalist-produktgruppe">
                                    <option value="Faltkartons"></option>
                                    <option value="Luftpolsterfolie"></option>
                                    <option value="Klebeband"></option>
                                    <option value="Luftpolstertaschen"></option>
                                    <option value="Maxibriefkartons"></option>
                                    <option value="Großbriefkartons"></option>
                                    <option value="Büro-& Schreibwaren"></option>
                                </datalist>    
                            </div>
                        </th>
                    </tr>
                    <!-- bis hier die Filter funktion und soll ausgeblendet werden! --> 
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>Amazon</td>        
                        <td>SKU-VON-AMZN</td>        
                        <td>hier ein test mit viel zu vielen zeichen !!!hier ein test mit viel zu vielen zeichen !!!hier ein test mit viel zu vielen zeichen !!!</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>Amazon</td>        
                        <td>SKU-VON-AMZN</td>        
                        <td>hier ein test mit viel zu vielen zeichen !!!hier ein test mit viel zu vielen zeichen !!!hier ein test mit viel zu vielen zeichen !!!</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>Amazon</td>        
                        <td>SKU-VON-AMZN</td>        
                        <td>hier ein test mit viel zu vielen zeichen !!!hier ein test mit viel zu vielen zeichen !!!hier ein test mit viel zu vielen zeichen !!!</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
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
                    <tr class="hover-content">
                        <td><a href="settings.php" target="_blank"><img class="artikel-setting-button" name="artikel-setting" alt="artikel-setting" title="Artikel bearbeiten" src="../image/einstellungsbutton.png" /></a></td>  
                        <td>eBay</td>        
                        <td>ARTNRVONEB</td>        
                        <td>1 Gelisteter Artikel von eBay</td>        
                        <td>Musterhersteller</td>        
                        <td>ebay PF ID</td>        
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
                </table>
            </div>
        </div>
		
	</body>
</html>


























