<?php
session_start();
if(isset($_SESSION["adminusername"])) {     
    ?>
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
            <a href="admin-mainpage.php">
                <img id="stars-logo" src="../admin-image/stars-logo.png" />
            </a>        
            <nav class="nav-bar">
                        
                <ul>
                    
                    
                    <li>
                        <button type="button" class="active">
                            Bestandsübersicht
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Bestandsstatistik
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Bestandswert
                        </button>
                    </li>
                </ul>    
            </nav>
        </header>
        
        <div class="sidebar">
            <ul>                                
                <li>
                    <a class="btnSidebar" href="admin-mainpage.php">
                        <button id="dashboard" type="button" class="inactive">
                            Dashboard
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-users.php">
                        <button id="user" type="button" class="inactive">
                            Benutzer
                        </button>
                    </a>
                </li>

                <li>
                    <a class="btnSidebar" href="versandklassen.php">
                        <button id="versandklassen" type="button" class="inactive">
                            Versandklassen
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-lagerbestand.php">
                        <button id="versandklassen" type="button" class="active">
                            Lagerbestand
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="#">
                        <button id="export" type="button" class="inactive">
                            Export
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-newsfeed.php">
                        <button id="" type="button" class="inactive">
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
            <table id="lb-table">
                <tr id="lb-table-header">
                    <th>Kategorie</th>
                    <th>Artikelnummer</th>
                    <th>Artikelname</th>
                    <th>ges. Lagerbestand</th>
                    <th>in Aufträgen</th>
                    <th>verf. Lagerbestand</th>
                    <th>Bestandswert</th>
                </tr>
                <tr>
                    <td>
                        <select id="lb-table-filter-kategorie">
                            <option></option>
                            <option>Faltkartons</option>
                            <option>Großbriefkartons</option>
                            <option>Maxibriefkartons</option>
                            <option>Klebeband</option>
                        </select>
                    </td>
                    <td>
                        <input id="lb-table-filter-artikelnummer" type="text">
                    </td>
                    <td>
                        <input id="lb-table-filter-artikelname" type="text">
                    </td>
                    <td>
                        <select id="lb-table-filter-gesamter-lagerbestand">
                            <option></option>
                            <option>niedrigster</option>
                            <option>höchster</option>
                        </select>
                    </td>
                    <td>
                        <select id="lb-table-filter-auftraege">
                            <option></option>
                            <option>niedrigster</option>
                            <option>höchster</option>
                        </select>
                    </td>
                    <td>
                        <select id="lb-table-filter-verf-lagerbestand">
                            <option></option>
                            <option>niedrigster</option>
                            <option>höchster</option>
                        </select>
                    </td>
                    <td>
                        <select id="lb-table-filter-bestandswert">
                            <option></option>
                            <option>niedrigster</option>
                            <option>höchster</option>
                        </select>
                    </td>
                </tr>
                <tr class="lb-table-hover">
                    <td>Faltkartons</td>
                    <td>1234</td>
                    <td>1 Faltkarton KK-Unsichtbar</td>
                    <td>4500    Stück</td>
                    <td>200     Stück</td>
                    <td>4300     Stück</td>
                    <td>257,57€</td>
                </tr>
                <tr class="lb-table-hover">
                    <td>Faltkartons</td>
                    <td>1234</td>
                    <td>1 Faltkarton KK-Unsichtbar</td>
                    <td>4500    Stück</td>
                    <td>200     Stück</td>
                    <td>4300     Stück</td>
                    <td>257,57€</td>
                </tr>
            </table>
        </div>
        <!-- <img class="btn" src="../admin-image/homebutton.png" /> -->
        
    </body>
</html>
<?php
} else {
    header("Location: ../sites/admin-login.php"); 
}
?>