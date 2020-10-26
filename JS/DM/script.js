var tProduit = new Array();

tProduit = [
    {"num" : 0, "nom" : "Sélectionner un produit", "prix" : 150},
    {"num" : 1, "nom" : "Crosse de Hockey", "prix" : 150},
    {"num" : 2, "nom" : "Casque joueur", "prix" : 50},
    {"num" : 3, "nom" : "Plastron gardin", "prix" : 179}
];

/* $(n) : raccourci pour atteindre un noeud HTML                                           */
$ = (n)=>{return document.getElementById(n)};


/* fonction permettant d'afficher le produit n à l'ecran */
function display(n, id) {
    $("prix"+id).value = tProduit[n].prix;
    $("quant"+id).value = 0;
}

function more(n){
    var num = 0;
    if ($("quant"+n).value  >= num.toString()){
        $("quant"+n).value++;
        displayMt()
    }
}

function less(n){
    var num = 0;
    if ($("quant"+n).value > num.toString()){
        $("quant"+n).value--;
        displayMt();
    }
}

function del(n){
    $("liste"+n).value = tProduit[0].nom;
    $("prix"+n).value = "";
    $("quant"+n).value = "";
    displayMt()
}

function displayMt(){
    var mtHT = $("prix1").value * $("quant1").value + $("prix2").value * $("quant2").value + $("prix3").value * $("quant3").value;
    $("mtht").value = mtHT;
    var mtTVA = mtHT * 0.196;
    $("mttva").value = mtTVA;
    var mtTTC = mtHT + mtTVA;
    $("mtttc").value = mtTTC;
}

function init() {
    var ch = `<option>Selectionner un produit</option>`;   // chaine contenant les options du select
    for (var i = 1; i <= tProduit.length-1 ; i++) {
        ch += `<option> ${tProduit[i].nom}</option>`;
    }
    $("liste1").innerHTML = ch;
    $("liste2").innerHTML = ch;
    $("liste3").innerHTML = ch;
    // ATTENTION ne jamais modifier la propiété innerHTML avec une information saisie par l'internaute
    listeners();
}

/* mise en place des écouteurs */
function listeners() {
    //Listener de la premiere ligne
    $("liste1").onchange = function () {
        display(this.selectedIndex, "1");
    }

    $("bt1").onclick = function () {
        more("1");
    }

    $("bt2").onclick = function () {
        less("1");
    }

    $("bt3").onclick = function () {
        del("1");
    }



    //Listener de la deuxième ligne
    $("liste2").onchange = function () {
        display(this.selectedIndex, "2");
    }

    $("bt4").onclick = function () {
        more("2")
    }

    $("bt5").onclick = function () {
        less("2")
    }

    $("bt6").onclick = function () {
        del("2");
    }


    //Listener de la deuxième ligne
    $("liste3").onchange = function () {
        display(this.selectedIndex, "3");
    }

    $("bt7").onclick = function () {
        more("3")
    }

    $("bt8").onclick = function () {
        less("3")
    }

    $("bt9").onclick = function () {
        del("3");
    }
}

onload = init;