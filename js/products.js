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

    plattform = document.getElementById('th-plattform');
    plattform.addEventListener('click', sort);
    artikelnummer = document.getElementById('th-artikelnummer');
    artikelnummer.addEventListener('click', sort);
    artikelname = document.getElementById('th-artikelname');
    artikelname.addEventListener('click', sort);
    hersteller = document.getElementById('th-hersteller');
    hersteller.addEventListener('click', sort);
    plattformid = document.getElementById('th-plattform-id');
    plattformid.addEventListener('click', sort);
    eknetto = document.getElementById('th-ek-netto');
    eknetto.addEventListener('click', sort);
    mwst = document.getElementById('th-mehrwertsteuer');
    mwst.addEventListener('click', sort);
    versandklasse = document.getElementById('th-versandklasse');
    versandklasse.addEventListener('click', sort);
    gewicht  = document.getElementById('th-gewicht');
    gewicht.addEventListener('click', sort);
    nullpreis  = document.getElementById('th-nullpreis');
    nullpreis.addEventListener('click', sort);
    vkpreis  = document.getElementById('th-vk-preis');
    vkpreis.addEventListener('click', sort);
    margeeuro  = document.getElementById('th-marge-euro');
    margeeuro.addEventListener('click', sort);
    margeprozent  = document.getElementById('th-marge-prozent');
    margeprozent.addEventListener('click', sort);
    bestand  = document.getElementById('th-bestand');
    bestand.addEventListener('click', sort);


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

	function sort(e) {

        if(e.currentTarget.id == 'th-vk-preis')
        {
            item = document.getElementById('th-vk-preis');
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

        if(e.currentTarget.id == 'th-marge-euro')
        {
            item = document.getElementById('th-marge-euro');
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
        if(e.currentTarget.id == 'th-marge-prozent')
        {
            item = document.getElementById('th-marge-prozent');
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
        if(e.currentTarget.id == 'th-bestand') {
            item = document.getElementById('th-bestand');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-nullpreis') {
            item = document.getElementById('th-nullpreis');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-gewicht') {
            item = document.getElementById('th-gewicht');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-versandklasse') {
            item = document.getElementById('th-versandklasse');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-mehrwertsteuer') {
            item = document.getElementById('th-mehrwertsteuer');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-ek-netto') {
            item = document.getElementById('th-ek-netto');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-plattform-id') {
            item = document.getElementById('th-plattform-id');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-hersteller') {
            item = document.getElementById('th-hersteller');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-artikelname') {
            item = document.getElementById('th-artikelname');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-artikelnummer') {
            item = document.getElementById('th-artikelnummer');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }
        if(e.currentTarget.id == 'th-plattform') {
            item = document.getElementById('th-plattform');
            if (item.timer) {
                clearTimeout(item.timer);
                item.timer = null;
                changeOrder(item, "DESC");
            }
            else {
                item.timer = setTimeout(function () {
                    item.timer = null;
                    changeOrder(item, "ASC");
                }, 300);
            }
        }

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


        window.location.href = "../sites/products.php?txt-plattform=" + plattform + "&txt-artikelnummer=" + artikelnummer + "&txt-artikelname=" + artikelname + "&txt-hersteller=" + hersteller + "&txt-plattformid=" + plattformid + "&" +
            "txt-eknetto=" + eknetto + "&txt-mwst=" + mwst + "&txt-versandklasse=" + versandklasse + "&txt-gewicht=" + gewicht + "&txt-nullpreis=" + nullpreis + "&txt-vkpreis=" + vkpreis + "&txt-margeeuro=" + margeeuro + "&txt-margeprozent=" + margeprozent + "&txt-bestand=" + bestand + "&sort=" + e.id + "&sortStatus=" + orderStatus;
    }


};