window.onload = function () {	
		
	var items = document.getElementsByClassName('btnEdit');
	for (var i = 0; i < items.length; i++) {
	  items[i].addEventListener('click', openDialog);
	  
	}

	function openDialog(e) {
		
		//TR: Ermitteln der Versandklasse
		var table = document.getElementsByTagName("tbody")[0];
		e = e || window.event;
	    var idVersanklasse = [];
	    var target = e.srcElement || e.target;
	    while (target && target.nodeName !== "TR") {
	        target = target.parentNode;
	    }
	    if (target) {
	        var cells = target.getElementsByTagName("td");	       
	        idVersanklasse.push(cells[8].innerHTML);	        
	    }	   
		
		window.open("../sites/versandklassen-edit.php?idVersanklasse=" + idVersanklasse, "", "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=500,left = 710,top = 140");
	}
	
	
}