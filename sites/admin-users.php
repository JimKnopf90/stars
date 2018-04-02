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
            <a href="admin-startseite.php">
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
                            Bearbeiten
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Hinzufügen
                        </button>
                    </li> 
                    
                    <li>
                        <button type="button" class="inactive">
                            Rechte
                        </button>
                    </li>
                </ul>    
            </nav>
        </header>
        
        <div class="sidebar">
            <ul>                                
                <li>
                    <a class="btnSidebar" href="admin-startseite.php">
                        <button id="dashboard" type="button" class="inactive">
                            Dashboard
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="admin-users.php">
                        <button id="user" type="button" class="active">
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
                    <a class="btnSidebar" href="#">
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
                    <th>Benutername</th>
                    <th>E-Mail</th>
                    <th>Vorname</th>
                    <th>Name</th>
                    <th>Rolle</th>
                    <th>Optionen</th>
                </tr>
                <tr>
                    <td>JimKnopf</td>
                    <td>JimKnopf@test.de</td>
                    <td>Timm</td>
                    <td>Reichert</td>
                    <td>Superadmin</td>
                    <td>Bearbeiten - Löschen</td>
                </tr>
                <tr>
                    <td>CapslockJesus</td>
                    <td>d.reichert@verpacking.com</td>
                    <td>Daniel</td>
                    <td>Reichert</td>
                    <td>Superadmin</td>
                    <td>Bearbeiten - Löschen</td>
                </tr>
            </table>           
        </div>
        <!-- <img class="btn" src="../admin-image/homebutton.png" /> -->
        
    </body>
</html>