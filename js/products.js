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

    plattform = document.getElementById('spnPlattform');
    plattform.addEventListener('click', sort);
    artikelnummer = document.getElementById('spnArtikelnummer');
    artikelnummer.addEventListener('click', sort);
    artikelname = document.getElementById('spnArtikelname');
    artikelname.addEventListener('click', sort);
    hersteller = document.getElementById('spnHersteller');
    hersteller.addEventListener('click', sort);
    plattformid = document.getElementById('spnPlattform-id');
    plattformid.addEventListener('click', sort);
    eknetto = document.getElementById('spn-ek-netto');
    eknetto.addEventListener('click', sort);
    mwst = document.getElementById('spnMehrwertsteuer');
    mwst.addEventListener('click', sort);
    versandklasse = document.getElementById('spnVersandklasse');
    versandklasse.addEventListener('click', sort);
    gewicht  = document.getElementById('spnGewicht');
    gewicht.addEventListener('click', sort);
    nullpreis  = document.getElementById('spnNullpreis');
    nullpreis.addEventListener('click', sort);
    vkpreis  = document.getElementById('spn-vk-preis');
    vkpreis.addEventListener('click', sort);
    margeeuro  = document.getElementById('spn-marge-euro');
    margeeuro.addEventListener('click', sort);
    margeprozent  = document.getElementById('spn-marge-prozent');
    margeprozent.addEventListener('click', sort);
    bestand  = document.getElementById('spnBestand');
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

        if(e.currentTarget.id == 'spn-vk-preis')
        {
            item = document.getElementById('spn-vk-preis');
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

        if(e.currentTarget.id == 'spn-marge-euro')
        {
            item = document.getElementById('spn-marge-euro');
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
        if(e.currentTarget.id == 'spn-marge-prozent')
        {
            item = document.getElementById('spn-marge-prozent');
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
        if(e.currentTarget.id == 'spnBestand') {
            item = document.getElementById('spnBestand');
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
        if(e.currentTarget.id == 'spnNullpreis') {
            item = document.getElementById('spnNullpreis');
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
        if(e.currentTarget.id == 'spnGewicht') {
            item = document.getElementById('spnGewicht');
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
        if(e.currentTarget.id == 'spnVersandklasse') {
            item = document.getElementById('spnVersandklasse');
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
        if(e.currentTarget.id == 'spnMehrwertsteuer') {
            item = document.getElementById('spnMehrwertsteuer');
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
        if(e.currentTarget.id == 'spn-ek-netto') {
            item = document.getElementById('spn-ek-netto');
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
        if(e.currentTarget.id == 'spnPlattform-id') {
            item = document.getElementById('spnPlattform-id');
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
        if(e.currentTarget.id == 'spnHersteller') {
            item = document.getElementById('spnHersteller');
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
        if(e.currentTarget.id == 'spnArtikelname') {
            item = document.getElementById('spnArtikelname');
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
        if(e.currentTarget.id == 'spnArtikelnummer') {
            item = document.getElementById('spnArtikelnummer');
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
        if(e.currentTarget.id == 'spnPlattform') {
            item = document.getElementById('spnPlattform');
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