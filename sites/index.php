<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/admin-stylesheet.css">
		<link rel="icon" href="../admin-image/stars-logo.png">
		<script src="http://code.jquery.com/jquery-1.7.2.js">
        </script>
        <script type="application/javascript">
            $(document).ready(function(){
                $("#dashboard").click(function(){
                    $(.nav-bar).hide();
                });
            });
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
                            Anlegen
                        </button>
                    </li>
                    
                    <li>
                        <button type="button" class="inactive">
                            Bearbeiten
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
                    <a class="btnSidebar" href="#">
                        <button id="dashboard" type="button" class="active">
                            Dashboard
                        </button>
                    </a>
                </li>
                
                <li>
                    <a class="btnSidebar" href="#">
                        <button id="user" type="button" class="inactive">
                            Benutzer
                        </button>
                    </a>
                </li>

            </ul>
        </div>
        <!-- <img class="btn" src="../admin-image/homebutton.png" /> -->
        
    </body>
</html>














<!DOCTYPE html>
<html>
	<head>
		
        
	</head>
	<body>
        
        
        
    </body>
</html>