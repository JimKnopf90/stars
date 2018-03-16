<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/admin-stylesheet.css">
		<link rel="stylesheet" type="text/css" href="../css/admin-table-stylesheet.css">
		<link rel="icon" href="../admin-image/stars-logo.png">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jequery.min.js">
        </script>
		<title>StaRs | Adminbereich</title>
	</head>
	<body>
        <header>
            <a href="admin-startseite.php">
                <img id="stars-logo" src="../admin-image/stars-logo.png" />
            </a>
            <div class="nav-bar">
                
                <ul>                
                    <li>
                        <button type="button" class="active">
                            Übersicht
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Bearbeiten
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Hinzufügen
                        </button>
                    </li>                    
                </ul>    
            </div>
        </header>
        
        <div class="sidebar">
            <ul>                                
                <li>
                    <a class="btnSidebar" href="admin-startseite.php">
                        <button type="button" class="inactive">
                            Dashboard
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-startseite.php">
                        <button type="button" class="inactive">
                            Benutzer
                        </button>
                    </a>
                </li>

                <li>
                    <a class="btnSidebar" href="#">
                        <button type="button" class="active">
                            Versandklassen
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="#">
                        <button type="button" class="inactive">
                            Export
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="#">
                        <button type="button" class="inactive">
                            Newsfeed
                        </button>
                    </a>
                </li>

                <li>
                    <a class="btnSidebar" href="#">
                        <button type="button" class="inactive">
                            Sonstiges
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="#">
                        <button type="button" class="inactive">
                            Design
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-login.php">
                        <button type="button" class="logout" >
                            Logout
                        </button>
                    </a>
                </li>
            </ul>
        </div>  
        <div class="content">
            <table id="table-versandklassen">
                <tr id="table-header">
                    <th class="versandklasse">Versandklasse</th>
                    <th class="versandkosten">Versandkosten</th>
                    <th class="gewicht">max. Gewicht</th>
                    <th class="masse">max. Maße</th> <!-- zur übersicht -->
                </tr>
                
                <tr class="table-tr-td">
                    <td class="versandklasse">Versandklasse X</td>
                    <td class="versandkosten">1,20 €</td>
                    <td class="gewicht">0,500 kg</td>
                    <td class="masse">300 x 50 x 50 mm</td> <!-- zur übersicht -->
                </tr>
                
                <tr class="table-tr-td">
                    <td class="versandklasse">Versandklasse Y</td>
                    <td class="versandkosten">2,15 €</td>
                    <td class="gewicht">1,000 kg</td>
                    <td class="masse">350 x 210 x 20 mm</td> <!-- zur übersicht -->
                </tr>
                
                <tr class="table-tr-td">
                    <td class="versandklasse">Fester Wert</td>
                    <td class="versandkosten">editierbar</td>
                    <td class="gewicht">editierbar</td>
                    <td class="masse">editierbar</td> <!-- zur übersicht -->
                </tr>
                
            </table>    
        </div>
        
        
        <!-- <img class="btn" src="../admin-image/homebutton.png" /> -->
        
    </body>
</html>