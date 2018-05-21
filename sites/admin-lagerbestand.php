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
            <table>
                <tr>
                <th>Kategorie</th>
                <th>Artikelnummer</th>
                <th>Artikelname</th>
                <th>Lagerbestand</th>
                </tr>
                <tr>
                    <td>
                        <select id="sel_kateg_lagerbestand">
                            <option>Alle Artikel</option>
                            <option>Faltkartons</option>
                            <option>Maxibriefkartons</option>
                            <option>Großbriefkartons</option>
                            <option>Klebeband</option>
                            <option>Büroartikel</option>
                        </select>
                    </td>
                    <td>
                        <input id="lagerbestand_art_nr" type="text">
                    </td>
                    <td>
                        <input id="lagerbestand_art_name" type="text">
                    </td>
                    <td>
                        <select id="sel_kateg_lagerbestand">
                            <option>-- Auswählen --</option>
                            <option>Höchster zuerst</option>
                            <option>Niedrigster zuerst</option>
                            <option>Nur Rückstand</option>
                        </select>
                    </td>
                </tr>
                <tr class="hover">
                    <td>Faltkartons</td>
                    <td>111</td>
                    <td>1 Faltkarton KK-30</td>
                    <td>12542</td>
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