window.onload = function () {	
	
	var items = document.getElementsByClassName('btnEdit');
	for (var i = 0; i < items.length; i++) {
	  items[i].addEventListener('click', openDialog);
	  
	}

	function openDialog(e) {		
		
		var idVersanklasse = this.value;
		window.open("../sites/versandklassen-edit.php?idVersanklasse=" + idVersanklasse, "", "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=500,left = 710,top = 140");
	}
}