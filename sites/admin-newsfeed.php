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
                            Übersicht
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Beitrag verfassen
                        </button>
                    </li> 
                    
                    <li>
                        <button type="button" class="inactive">
                            Beiträge bearbeiten
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Alle Beiträge
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
                    <a class="btnSidebar" href="#">
                        <button id="export" type="button" class="inactive">
                            Export
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-newsfeed.php">
                        <button id="" type="button" class="active">
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
                <div id="master-content">
                    <div id="newsfeed-content-feeds">
                        <h2>Die letzten Beiträge</h2>
                        <div class="beitrag">
                            <a href="#">
                                <h3>Beitrag #1 - Titel des Beitrags</h3>
                                <h5>Hier der Inhalt auf ca. 50 Zeichen begrenzt. ... </h5>
                                <h6>Von: Administrator - 24.04.2018</h6>
                            </a>
                        </div>

                        <div class="beitrag">
                            <a href="#">
                                <h3>Beitrag #2 - Titel auch Begrenzt</h3>
                                <h5>Wenn der Inhalt mehr als 50 Zeichen hat dann ... </h5>
                                <h6>Von: Administrator - 24.04.2018</h6>
                            </a>
                        </div>

                        <div class="beitrag">
                            <a href="#">
                                <h3>Beitrag #3 - Titel des Beitrags</h3>
                                <h5>Nur die 5 neuesten Artikel anzeigen lassen </h5>
                                <h6>Von: Administrator - 24.04.2018</h6>
                            </a>
                        </div>

                        <div class="beitrag">
                            <a href="#">
                                <h3>Beitrag #4 - Titel des Beitrags</h3>
                                <h5>Rechts neben den Beiträgen "Schnellbeitrag" </h5>
                                <h6>Von: Administrator - 24.04.2018</h6>
                            </a>
                        </div>

                        <div class="beitrag">
                            <a href="#">
                                <h3>Beitrag #5 - Titel des Beitrags</h3>
                                <h5>Hier drunter dann Button für alle Beiträge </h5>
                                <h6>Von: Administrator - 24.04.2018</h6>
                            </a>
                        </div>

                        <a href="#">
                                <button type="button" id="btn-all-posts" >
                                    Alle ansehen
                                </button>
                        </a>
                    </div>    
                    <div class="nf-divider"></div>
                    <div id="nf-content-new-feed">
                        <form action="#" method="post">
                            <ul>
                                <h2>Schnellen Beitrag veröffentlichen</h2>
                                <li>
                                    <input id="headline" type="text" placeholder="Titel des Beitrages" required="required">
                                </li>
                                <li>
                                    <textarea id="nf-content-new-feed-post" type="text" placeholder="max. 250 Zeichen" required="required"></textarea>
                                </li>
                                <li>
                                    <select id="kategorie" required="required">
                                        <option></option>
                                        <option>Wichtige Info's</option>
                                        <option>Allg. News</option>
                                        <option>Erweiterungen</option>
                                    </select>
                                     <span class="content-information">Um einen vollständigen Beitrag zu veröffentlichen klicke bitte <a href="#">HIER</a></span>
                                </li>
                                <li>
                                    <input id="btnSubmitPreview" type="button" value="Vorschau">
                                    <input id="btnSubmitContent" type="submit" value="Veröffentlichen">
                                </li>
                                <li>
                                   
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            
        </div>   
    </body>
</html>
<?php
} else {
    header("Location: ../sites/admin-login.php"); 
}
?>