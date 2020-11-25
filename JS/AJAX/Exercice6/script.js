function Xhr(){
    let obj = null;
    try{
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    }catch (Error){
        try{ obj = new ActiveXObject("MSXML2.XMLHTTP");
        }catch(Error){
            try{ obj = new XMLHttpRequest();
            }catch (Error){
                alert('Impossible de creer l objet XMLHttpRequest');
            }
        }
    }
    return obj;
}

var categorie = document.getElementById('categorie');
var produit = document.getElementById('produit');



function cat_ajax(){
    let req = Xhr();
    req.onreadystatechange= function (){
        if (this.readyState == this.DONE){
            getCategorie(this.responseXML);
        }
    };
    req.open("POST", "cat.php", true);
    req.send(null);
}

/*function prod_ajax(){
    let req = Xhr();
    req.onreadystatechange= function (){
        if (this.readyState == this.DONE){
            getProduit(this.responseXML);
        }
    };
    req.open("POST", "prod.php?codeCat="+codeCat, true);
    req.send(null);
}*/




/*function getProduit(prod){
    var numPro = prod.getElementsByTagName("numPro");
    var libPro = prod.getElementsByTagName("libPro");
    var codeCat = prod.getElementsByTagName("codeCat");

    var options = document.createElement('option');
    for (let i = 0; i < .length; i++) {

    }
}*/

function getCategorie(cat){

    var codeCat = cat.getElementsByTagName("codeCat");
    var libCat = cat.getElementsByTagName("libCat");
    var options = '<option value="null">Selectionner un catégorie</option>';
    for (let i = 0; i < libCat.length; i++) {
        options += '<option value="'+codeCat[i].textContent+'">'+libCat[i].textContent+'</option>';
    }
    categorie.innerHTML += options;
}