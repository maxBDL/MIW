function affichGrille(){
    var grille = document.getElementById('grille');
    var context = grille.getContext("2d");

    for (let x = 0; x < 501; x+=100) {
        context.moveTo(x, 0);
        context.lineTo(x, 500);
    }
    for (let y = 0; y < 501; y+=100) {
        context.moveTo(0, y);
        context.lineTo(500, y);
    }
    context.strokeStyle = "#000";
    context.stroke();
}


function affichInterface(){
    var interface = document.getElementById('interface');

    var titre = document.createElement('h1');
    var titreText = document.createTextNode('Jeu du MORPION');
    titre.appendChild(titreText);
    interface.appendChild(titre);

    for (let i = 1; i <= 2; i++) {
        var divJoueur = document.createElement('div');
        var pNom = document.createElement('p');
        var pNomText = document.createTextNode('Joueur '+i+': ');
        var inputNom = document.createElement('input');
        var pScore = document.createElement('p');
        var pScoreText = document.createTextNode('Score: ');
        var inputScore = document.createElement('input');

        pNom.appendChild(pNomText);
        divJoueur.appendChild(pNom);
        divJoueur.appendChild(inputNom);
        pScore.appendChild(pScoreText);
        divJoueur.appendChild(pScore);
        divJoueur.appendChild(inputScore);
        interface.appendChild(divJoueur);
    }




    //Création du bouton rejouer
    var buttonPlay = document.createElement('button');
    var buttonPlayText = document.createTextNode('Rejouer');
    buttonPlay.appendChild(buttonPlayText);

    //Création du bouton nouvelle partie
    var buttonNew = document.createElement('button');
    var buttonNewText = document.createTextNode('Nouvelle Partie')
    buttonNew.appendChild(buttonNewText);
    interface.appendChild(buttonPlay);
    interface.appendChild(buttonNew);

}

function affichJeu(){
    affichGrille();
    affichInterface();
}


function affichTour(tour, x, y){
    if ((tour % 2) == 0){
        var grille = document.getElementById('grille');
        var context = grille.getContext("2d");

    }else{

    }
}