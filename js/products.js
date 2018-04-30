window.onload = function () {

    var item;
    var items;
    var table;
    var plattform;
    var artikelnummer;
    var artikelname;
    var hersteller;
    var plattformid;
    var eknetto;
    var mwst;
    var versandklasse;
    var gewicht;
    var nullpreis;
    var vkpreis;
    var margeeuro;
    var margeprozent;
    var bestand;



    items = document.getElementsByClassName('btnEdit');
    for (var i = 0; i < items.length; i++) {
        items[i].addEventListener('click', openDialog);

    }

    item = document.getElementById('th-marge-euro');

    item.onclick = function(){
        if (item.timer){
            clearTimeout(item.timer);
            item.timer = null;
            changeOrder(item, "DESC");
        }
        else{
            item.timer = setTimeout(function(){
                item.timer = null;
                changeOrder(item, "ASC");
            },300);
        }
    }


	function openDialog(e) {
		
		//TR: Ermitteln der Versandklasse
		table = document.getElementsByTagName("tbody")[0];
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
	
	function changeOrder(e, orderStatus) {

        plattform = document.getElementById('txt-plattform').value;
        artikelnummer = document.getElementById('txt-artikelnummer').value;
        artikelname = document.getElementById('txt-artikelname').value;
        hersteller = document.getElementById('txt-hersteller').value;
        plattformid = document.getElementById('txt-plattformid').value;
        eknetto = document.getElementById('txt-eknetto').value;
        mwst = document.getElementById('txt-mwst').value;
        versandklasse = document.getElementById('txt-versandklasse').value;
        gewicht  = document.getElementById('txt-gewicht').value;
        nullpreis  = document.getElementById('txt-nullpreis').value;
        vkpreis  = document.getElementById('txt-vkpreis').value;
        margeeuro  = document.getElementById('txt-margeeuro').value;
        margeprozent  = document.getElementById('txt-margeprozent').value;
        bestand  = document.getElementById('txt-bestand').value;


        window.location.href = "../sites/products.php?txt-plattform=&txt-artikelnummer=" + artikelnummer + "&txt-artikelname=&txt-hersteller=&txt-plattformid=&" +
            "txt-eknetto=&txt-mwst=&txt-versandklasse=&txt-gewicht=&txt-nullpreis=&txt-vkpreis=&txt-margeeuro=&txt-margeprozent=&txt-bestand=&sort=" + e.id + "&sortStatus=" + orderStatus;
    }


};