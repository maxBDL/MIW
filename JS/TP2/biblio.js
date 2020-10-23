function nombre(n) {
    return RegExp("^[-+]?\[0-9]+\[.,]?\[0-9]*$").test(n);
}

function entierPositif(n) {
    return RegExp("^[+]?\[0-9]*$").test(n);
}

function pair(x){
    return (entierPositif(x) && (x%2) == 0 ) ? true : false;
}

function arrondi(x,n){
    return Number.parseFloat(x).toFixed(n);
}

function nbOccurences(c, ch){
    return ch.split(c).length-1;
}


function substitue(c1, c2, c){
    return c.replace(RegExp(c1 , 'gi'), c2);
}

function somme (nb1, nb2, nb3){
    return nb1+nb2+nb3;
}

function moyenne (nb1, nb2, nb3){
    return (nb1+nb2+nb3)/3;
}

function max (nb1, nb2, nb3){
    return (nb1 > nb2 && nb1 > nb3) ? nb1 : ((nb2 > nb1 && nb3 > nb2) ? nb3 : nb2 );
}

function min (nb1, nb2, nb3){
    return (nb1 < nb2 && nb1 < nb3) ? nb1 : ((nb2 < nb1 && nb3 < nb2) ? nb3 : nb2 );
}

function sommeN(n){
    return (n(n+1))/2;
}

function surfCarre(c){
    return c*c;
}

function surfRect(c,l){
    return c*l;
}

function surfCercle(r){
    return 3.14*r*r;
}

function surface(){
    calc = prompt("Quelle sur face voulez vous calculer: carre(c) rectangle(l) cercle(r)");
    while (calc != 'c' || calc != 'l' || calc != 'r'){
        calc = prompt("Quelle sur face voulez vous calculer: carre(c) rectangle(l) cercle(r)");
    }
    switch (calc) {
        case "c":
            c = prompt("cote");
            surfCarre(c);
            break;
        case "l":
            c = prompt("cote");
            l = prompt("longueur");
            surfRect(c, l);
            break;
        case "r":
            r = prompt("rayon");
            surfCercle(r);
            break;
    }
}

function mdp(ch){
    return (ch == '1234') ? window.location.href="#" : window.location.reload();
}

function carre(){
    for(let i=1; i <= 50; i++){ console.log(i*i); }
}


function inscription(){
    var nm = prompt("Nom: ");
    var pm = prompt("Prenom: ");
    var dn = prompt("Date de naissance (jj/mm/aaaa): ");
    window.location.href="inscription.html?"+"nom="+nm+"&prenom="+pm+"&dateNaiss="+dn;
    console.log(window.location.href);
}



///A RENDRE
function carre(){
    for (let i = 1; i <= 50; i++) {
        console.log(i*i);
    }
}

function nbPairs(nb1, nb2){
    nbPaire = [];
    for (let i=nb1; i <= nb2; i++){
        if (pair(i)){
            nbPaire.push(i);
        }
    }
    return nbPaire;
}

function tableDe(nb){
    table = [];
    for (let i=1; i <= 10; i++){
        table.push(i*nb);
    }
    return table;
}


function maxi(){

}
inscription();
