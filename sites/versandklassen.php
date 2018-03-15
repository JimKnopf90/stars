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
        <script>
	function kb_source_2_target() {
		$.get('source.html', function(data) {
			$('#target').html(data);	
		})
	}
</script>
		<title>StaRs | Adminbereich</title>
	</head>
	<body>
        <header>
            <!-- <div class="logo">
                <a href="admin-startseite.php">
                    <img id="stars-logo" src="../admin-image/stars-logo.png" />
                </a>   
            </div> -->
            
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
                    
                </ul>    
            </div>
        </header>
        
        <div class="sidebar">
            <ul>                                
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
            <table>
                <tr>
                    <th>Versandklasse</th>
                    <th>Kosten</th>
                    <th>Maximale Maße (L x B x H)</th>
                    <th>Maximales Gewicht</th>
                </tr>
                <tr>
                    <td>Versandklasse X</td>
                    <td>
                        <input class="editable-input" type="text" name="preis" />
                    </td>
                    <td>350 x 250 x 20 mm</td>
                    <td>0,500 kg</td>
                    <td>
                        <button class="btnSafe" type="submit" name="speichern" value="safe">
                            Speichern
                        </button>
                    </td>
                </tr
                
                <tr>
                    <td>Versandklasse X</td>
                    <td>
                        <input class="editable-input" type="text" name="preis" />
                    </td>
                    <td>350 x 250 x 20 mm</td>
                    <td>1,000 kg</td>
                    <td>
                        <button class="btnSafe" type="submit" name="speichern" value="safe">
                            Speichern
                        </button>
                    </td>
                </tr> 
                
                
            </table>    
        </div>
        
        
        <!-- <img class="btn" src="../admin-image/homebutton.png" /> -->
        
    </body>
</html>