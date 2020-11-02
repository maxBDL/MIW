var tProduit = new Array();

//tableau des produits
tProduit = [
    {"num" : 0, "nom" : "Sélectionner un produit", "prix" : null},
    {"num" : 1, "nom" : "Crosse de Hockey", "prix" : 150},
    {"num" : 2, "nom" : "Casque joueur", "prix" : 50},
    {"num" : 3, "nom" : "Plastron gardin", "prix" : 179}
];

/* $(n) : raccourci pour atteindre un noeud HTML                                           */
$ = (n)=>{return document.getElementById(n)};


//fonction permettant d'afficher le produit n à l'ecran (nom + prix + quantité
function display(n, id) {
    $("prix"+id).value = tProduit[n].prix;
    $("quant"+id).value = 0;
    displayMt();
}

//fonction permettant d'augmenter la quantité du produit si celui-ci a deja été défini, sinon rien ne se passe en cliquant
function more(n){
    var num = 0;
    if ($("quant"+n).value  >= num.toString()){
        $("quant"+n).value++;
        displayMt()
    }
}

//fonction permettant de diminuer la quantité du produit si celui-ci a deja été défini,sinon si la quantité est = à 0 on appel la fonction del(n), sinon rien ne se passe en cliquant
function less(n){
    var num = 0;
    if ($("quant"+n).value > num.toString()){
        $("quant"+n).value--;
        displayMt();
    }else if($("quant"+n).value == num.toString()){
        del(n);
    }
}

//fonction permettant de remettre la ligne a des valeurs par défaut
function del(n){
    $("liste"+n).value = $("liste"+n).options[0].text;
    $("prix"+n).value = "";
    $("quant"+n).value = "";
    displayMt()
}


//fonction appelé grace aux différents boutons, et permettant de calculer les différents montants
function displayMt(){
    var mtHT = $("prix1").value * $("quant1").value + $("prix2").value * $("quant2").value + $("prix3").value * $("quant3").value;
    $("mtht").value = mtHT;
    var mtTVA = mtHT * 0.196;
    $("mttva").value = mtTVA;
    var mtTTC = mtHT + mtTVA;
    $("mtttc").value = mtTTC;
}

function validateCmd() {
    //fonction vérifiant si au moins 1 article a été selectionné, si la quantité est nulle ou = a 0 renvoie une alerte
    if (($("quant1").value == "" || $("quant1").value == "0") && ($("quant2").value == "" || $("quant2").value == "0") && ($("quant3").value == "" || $("quant3").value == "0")) {
        alert("Veuillez choisir au moins un produit");
        return false;
    }else {
        return true;
    }
}

//fonction appelé dès le chargement de la page et affichant le formulaire
function displayForm(){
    var ch = '<form onsubmit="return validateCmd()">\n' +
        '        <fieldset>\n' +
        '            <legend>Identification</legend>\n' +
        '            <label for="nom">Nom: </label>\n' +
        '            <input id="nom" type="text" name="nom" required autofocus>\n' +
        '            <label for="prenom">Prenom: </label>\n' +
        '            <input id="prenom" type="text" name="prenom" required><br>\n' +
        '            <label for="mail">Mail: </label>\n' +
        '            <input id="mail" type="email" pattern="^[A-zÀ-ú0-9]+([-_.]?[A-zÀ-ú0-9])*@[A-zÀ-ú0-9]+[.][a-z0-9]{2,4}$" name="mail" required><br><!--Changer le pattern-->\n' +
        '            <label for="code">Code Postale: </label>\n' +
        '            <input id="code" type="number" min="1000" max="98890" name="code" required><!--Changer le pattern--><!--Max et Min basée sur le fichier: https://www.data.gouv.fr/fr/datasets/base-officielle-des-codes-postaux/-->\n' +
        '            <label for="ville">Ville: </label>\n' +
        '            <input id="ville" type="text" name="ville" required><br>\n' +
        '            <label for="adresse">Adresse</label>\n' +
        '            <input id="adresse" type="text" name="adresse" required>\n' +
        '            <label for="numTel">Téléphone</label>\n' +
        '            <input id="numTel" type="text" pattern="^0[1-9]([\\s][0-9]{2}){4}" title="xx xx xx xx xx" name="telephone" required><!--Changer le pattern-->\n' +
        '        </fieldset>\n' +
        '        <fieldset>\n' +
        '            <legend>Sélection des produits</legend>\n' +
        '            <table>\n' +
        '                <thead>\n' +
        '                    <tr>\n' +
        '                        <th>Référence</th>\n' +
        '                        <th>Prix</th>\n' +
        '                        <th>Quantité</th>\n' +
        '                    </tr>\n' +
        '                </thead>\n' +
        '                <tbody>\n' +
        '                    <tr>\n' +
        '                        <td><select name="liste1" id="liste1"></select></td>\n' +
        '                        <td><input type="text" name="prix1" id="prix1" disabled></td>\n' +
        '                        <td><input type="text" name="quant1" id="quant1" disabled></td>\n' +
        '                        <td><input type="button" id="bt1" value="+"></td>\n' +
        '                        <td><input type="button" id="bt2" value="-"></td>\n' +
        '                        <td><input type="button" id="bt3" value="x"></td>\n' +
        '                    </tr>\n' +
        '                    <tr>\n' +
        '                        <td><select name="liste2" id="liste2"></select></td>\n' +
        '                        <td><input type="text" name="prix2" id="prix2" disabled></td>\n' +
        '                        <td><input type="text" name="quant2" id="quant2" disabled></td>\n' +
        '                        <td><input type="button" id="bt4" value="+"></td>\n' +
        '                        <td><input type="button" id="bt5" value="-"></td>\n' +
        '                        <td><input type="button" id="bt6" value="x"></td>\n' +
        '                    </tr>\n' +
        '                    <tr>\n' +
        '                        <td><select name="liste3" id="liste3"></select></td>\n' +
        '                        <td><input type="text" name="prix3" id="prix3" disabled></td>\n' +
        '                        <td><input type="text" name="quant3" id="quant3" disabled></td>\n' +
        '                        <td><input type="button" id="bt7" value="+"></td>\n' +
        '                        <td><input type="button" id="bt8" value="-"></td>\n' +
        '                        <td><input type="button" id="bt9" value="x"></td>\n' +
        '                    </tr>\n' +
        '                </tbody>\n' +
        '            </table>\n' +
        '        </fieldset>\n' +
        '        <fieldset>\n' +
        '            <legend>Montants</legend>\n' +
        '            <table>\n' +
        '                <tbody>\n' +
        '                    <tr>\n' +
        '                        <td>Montant HT: </td>\n' +
        '                        <td><input type="text" name="mtht" id="mtht" disabled></td>\n' +
        '                    </tr>\n' +
        '                    <tr>\n' +
        '                        <td>Montant TVA (19.6%): </td>\n' +
        '                        <td><input type="text" name="mttva" id="mttva" disabled></td>\n' +
        '                    </tr>\n' +
        '                    <tr>\n' +
        '                        <td>Montant TTC: </td>\n' +
        '                        <td><input type="text" name="mtttc" id="mtttc" disabled></td>\n' +
        '                    </tr>\n' +
        '                </tbody>\n' +
        '            </table>\n' +
        '        </fieldset>\n' +
        '        <button type="submit">Validation</button>\n' +
        '        <button type="reset">Reset</button>\n' +
        '    </form>';
    document.getElementsByTagName("body")[0].innerHTML=ch;
    init();
}

//fonction affichant toute les listes et appelant les listeners
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

    //Listener de la liste n°1
    $("liste1").onchange = function () {
        display(this.selectedIndex, "1");
    }
    //Listener du + de la premiere ligne
    $("bt1").onclick = function () {
        more("1");
    }
    //Listener du - de la premiere ligne
    $("bt2").onclick = function () {
        less("1");
    }
    //Listener du x de la premiere ligne
    $("bt3").onclick = function () {
        del("1");
    }



    //Listener de la liste n°2
    $("liste2").onchange = function () {
        display(this.selectedIndex, "2");
    }
    //Listener du + de la deuxieme ligne
    $("bt4").onclick = function () {
        more("2")
    }
    //Listener du - de la deuxieme ligne
    $("bt5").onclick = function () {
        less("2")
    }
    //Listener du x de la deuxieme ligne
    $("bt6").onclick = function () {
        del("2");
    }


    //Listener de la liste n°3
    $("liste3").onchange = function () {
        display(this.selectedIndex, "3");
    }
    //Listener du + de la troisieme ligne
    $("bt7").onclick = function () {
        more("3")
    }
    //Listener du - de la troisieme ligne
    $("bt8").onclick = function () {
        less("3")
    }
    //Listener du x de la troisieme ligne
    $("bt9").onclick = function () {
        del("3");
    }
}

onload = displayForm;