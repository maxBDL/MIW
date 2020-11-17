function Xhr(){ // création d'un requête HTTP en fonction du navigateur
    let obj = null;
    try { obj = new ActiveXObject("Microsoft.XMLHTTP");}
    catch(Error) { try { obj = new ActiveXObject("MSXML2.XMLHTTP");}
    catch(Error) { try { obj = new XMLHttpRequest();}
    catch(Error) { alert(' Impossible de créer l\'objet XMLHttpRequest')}
    }
    }
    return obj;
}
function ajax()
{
    let req = Xhr(); // création d'une instance de la classe XMLHttpRequest
    // récupération du fichier reponse.txt en mode synchrone
    req.open("GET", "reponse.txt", false); // false pour synchrone
    req.send(null);
    let arrayRes = req.responseText.split(' ');
    let list = document.createElement("select");
    for (i=0; i < arrayRes.length; i++){
        let option = document.createElement("option");
        let optionText = document.createTextNode(arrayRes[i]);
        option.appendChild(optionText);
        list.appendChild(option);
    }

    document.getElementById("resultat").appendChild(list);
    document.getElementsByTagName("a")[0].style.visibility="hidden"
}
