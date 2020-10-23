

function mdp(ch){
    return (ch == '1234') ? window.location.href="#" : window.location.reload();
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
