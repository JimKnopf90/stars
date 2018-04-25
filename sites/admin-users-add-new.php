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
                        <a href="admin-users.php">
                            <button type="button" class="inactive">
                                Benutzerübersicht
                            </button>
                        </a>
                    </li>
                    
                    <li>
                        <a href="admin-users-add-new.php">
                            <button type="button" class="active">
                                Hinzufügen
                            </button>
                        </a>
                    </li> 
                    
                    <li>
                        <a href="admin-rights.php">
                            <button type="button" class="inactive">
                                Rechte
                            </button>
                        </a>
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
            <div id="content-new-user">
                <span id="new-user">Neuen Benutzer hinzufügen</span>
                
                <div id="input-new-user">
                    
                    <form class="inputs" action="../business-logic/mCreateUser.php" method="post">
                        <div>
                            <label for="username"><span class="prelabel">Benutzername:</span></label>
                            <input type="text" name="username" id="username" required="required">
                        </div>
                        <div>
                            <label for="vorname"><span class="prelabel">Vorname:</span></label>
                            <input type="text" name="forename" id="vorname" required="required">
                        </div>
                        <div>
                            <label for="nachname"><span class="prelabel">Nachname:</span></label>
                            <input type="text" name="lastname" id="nachname" required="required">
                        </div> 
                        
                        <div>
                            <label for="email"><span class="prelabel">E-Mail:</span></label>
                            <input type="text" name="mail" id="email" required="required">
                        </div>
                        
                        <div>
                            <label for="password"><span class="prelabel">Passwort:</span></label>
                            <input type="password" name="password" id="password" required="required">
                        </div>                       
                        <div>
                            <label for="user-role"><span class="prelabel">User Rolle:</span></label>
                            <select name="user-role" required="required">
                                <option></option>
                                <option>Administrator</option>
                                <option>Normal</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" id="add-user">Anlegen</button>
                            <button type="reset" id="content-reset">Löschen</button>
                        </div>
                        
                    </form>
                    
                </div>   
                    
            </div>
        </div>
        <!-- <img class="btn" src="../admin-image/homebutton.png" /> -->
        
    </body>
</html>
<?php
} else {
    header("Location: ../sites/admin-login.php"); 
}
?>