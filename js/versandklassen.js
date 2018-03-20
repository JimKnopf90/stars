window.onload = function () {
	
	
	document.getElementById("btnEdit").addEventListener("click", function(){
		 var idVersanklasse = document.getElementById('versandklassenID').innerText;
		window.open("../sites/versandklassen-edit.php?idVersanklasse=" + idVersanklasse, "", "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=500,left = 710,top = 140");
	});
   
  
}