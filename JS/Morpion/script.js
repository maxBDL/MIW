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


    var divJoueur1 = document.createElement('div');
    var = document.create




    //Création du bouton rejouer
    var buttonPlay = document.createElement('button');
    var buttonPlayText = document.createTextNode('Rejouer');
    buttonPlay.appendChild(buttonPlayText);

    //Création du bouton nouvelle partie
    var buttonNew = document.createElement('button');
    var buttonNewText = document.createTextNode('Nouvelle Partie')
    buttonNew.appendChild(buttonNewText);

    //Ajout des différents éléments
    interface.appendChild(titre);
    interface.appendChild(buttonPlay);
    interface.appendChild(buttonNew);
}

function affichJeu(){
    affichGrille();
    affichInterface();
}