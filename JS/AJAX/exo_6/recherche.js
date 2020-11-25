function Xhr() {
   let obj = null;
   try {
      obj = new ActiveXObject("Microsoft.XMLHTTP");
   } catch(Error) {
      try { obj = new ActiveXObject("MSXML2.XMLHTTP");
      } catch(Error) {
         try { obj = new XMLHttpRequest();
         } catch(Error) {
            alert(' Impossible de créer l\'objet XMLHttpRequest')
         }
      }
   }
   return obj;
}

var categorie = document.getElementById('categorie');
var produit = document.getElementById('produit');

function recupCategorie(r) {

   var libCat = r.getElementsByTagName("libCat");
   var codeCat = r.getElementsByTagName("codeCat");

   var option = '';
   for (var i = 0; i < codeCat.length; i++) {
      option += '<option value="'+codeCat[i].textContent+'">'+libCat[i].textContent+'</option>';
   }

   categorie.innerHTML += option;

}

function recupProduit(r) {

   var numPro = r.getElementsByTagName("numPro");
   var libPro = r.getElementsByTagName("libPro");
   var codeCat = r.getElementsByTagName("codeCat");

   var table = document.createElement('table');
   for (var i = 0; i < numPro.length; i++) {
      var tr = document.createElement('tr');
      var td = document.createElement('td');
      td.append(libPro[i].textContent);
      tr.append(td);
      table.append(tr);
   }

   produit.innerHTML = "";
   produit.append(table);

   // // affichage des données contenues dans la base.
   // for (i=0;i<itemsnom.length;i++) {
   //    alert(itemsnom[i].firstChild.data+" : "+itemsprix[i].firstChild.data+" Euros");
   // }
   // // suppression du lien permettant l'éxécution du programme javascript
   // let n = document.getElementsByTagName("a")[0];
   // n.parentNode.removeChild(n);
   //
   // // création d'un formulaire et d'une liste déroulante
   // let nouveauFORM = document.createElement("form");
   // let nouveauSELECT = document.createElement("select");
   // // remplissage de la liste créée, avec les données extraites de la base
   // for (let i = 0; i <itemsnom.length; i++) {
   //    let nouveauOP = document.createElement("option");
   //    let nouveautexteOP = document.createTextNode(itemsnom[i].firstChild.data+" : " +
   //    itemsprix[i].firstChild.data +" Euros");
   //    nouveauOP.appendChild(nouveautexteOP)
   //    nouveauSELECT.appendChild(nouveauOP);
   // }
   // nouveauFORM.appendChild(nouveauSELECT);
   // // Ajout de la liste de sélection à la page
   // document.getElementsByTagName("body")[0].appendChild(nouveauFORM);
}

function categorie_ajax() {
   let req = Xhr();
   req.onreadystatechange= function(){
      if (this.readyState==this.DONE) {
         recupCategorie(this.responseXML)
      }
   };
   //on appelle le fichier reponse.php qui retourne le fichier xml
   req.open("GET","categorie.php", true); // true pour Asynchrone
   req.send(null);
}

function produit_ajax() {
   let req = Xhr();
   req.onreadystatechange= function(){
      if (this.readyState==this.DONE) {
         recupProduit(this.responseXML)
      }
   };
   var codeCat = categorie.value;
   //on appelle le fichier reponse.php qui retourne le fichier xml
   req.open("GET","produit.php?codeCat="+codeCat, true); // true pour Asynchrone
   req.send(null);
}
