<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/admin-stylesheet.css">
		<link rel="stylesheet" type="text/css" href="../css/admin-table-stylesheet.css">
		<link rel="icon" href="../admin-image/stars-logo.png">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jequery.min.js"></script>
		<script src="../js/versandklassen.js" type="text/javascript"></script>        
		<title>StaRs | Artikel bearbeiten</title>
	</head>
	<body>	
      <div id="displayblock">
      	 <?php  
         $idVersandklasse = $_GET['idVersanklasse'];
         include("../business-logic/mLoadVersandklassEdit.php");	
	           ?>       
      </div>
        
 
    </body>
</html>