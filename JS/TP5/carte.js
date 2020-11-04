class Carte {
    constructor(num, coul, img) {
        this.numero = num;
        this.couleur = coul;
        this.image = img;
    }
    afficheCarte(){$("image").src = "carte/"+this.image+".GIF";}
}

/* $(n) : raccourci pour atteindre un noeud HTML                                           */
$ = (n)=>{return document.getElementById(n)};


function init(){
    var chNum = '<option>Sélectionner une valeur</option>';
    for (let i = 1; i < 14; i++) {
        switch (i){
            case 1:
                chNum += '<option value='+i+'>As</option>';
                break;
            case 11:
                chNum += '<option value='+i+'>Valet</option>';
                break;
            case 12:
                chNum += '<option value='+i+'>Dame</option>';
                break;
            case 13:
                chNum += '<option value='+i+'>Roi</option>';
                break;
            default:
                chNum += '<option value='+i+'>'+i+'</option>';
        }
    }

    var chCoul = '<option>Sélectionner une couleur</option>';
    chCoul += '<option value="P">Pique</option>';
    chCoul += '<option value="C">Carreau</option>';
    chCoul += '<option value="H">Coeur</option>';
    chCoul += '<option value="T">Trêfle</option>';

    $("numero").innerHTML = chNum;
    $("couleur").innerHTML = chCoul;
}

function validate(){
    if ($("numero").value == "Sélectionner une valeur" && $("couleur").value == "Sélectionner une couleur"){
        alert("Veuillez choisir une couleur et un numéro");
        return false;
    }else if($("numero").value == "Sélectionner une valeur"){
        alert("Veuillez choisir un numéro");
        return false;
    }else if($("couleur").value == "Sélectionner une couleur"){
        alert("Veuillez choisir une couleur");
        return false;
    }else{
        let num = $("numero").value.toString();
        let coul = $("couleur").value.toString();
        let carte = new Carte(num, coul, num+coul);
        carte.afficheCarte();
    }
}

onload = init;