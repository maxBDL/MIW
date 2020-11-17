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
function recup(r){
    let items = r.getElementsByTagName("donnee");
    //on fait juste une boucle sur chaque élément "donnee" trouvé
    for (i=0;i<items.length;i++)
    {
        alert (items[i].firstChild.data);
    }
}
function ajax() {
    let req = Xhr();
    req.onreadystatechange = function () {
        if (this.readyState == this.DONE) recup(this.responseXML)
    };
    //on chargee le fichier reponse.xml
    req.open("GET", "reponse.xml", true); // true pour Asynchrone
    recup("reponse.xml");

    req.send(null);
}