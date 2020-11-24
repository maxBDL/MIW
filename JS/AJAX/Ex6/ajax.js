function Xhr() {
  // création d'un requête HTTP en fonction du navigateur
  let obj = null;
  try {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (Error) {
    try {
      obj = new ActiveXObject("MSXML2.XMLHTTP");
    } catch (Error) {
      try {
        obj = new XMLHttpRequest();
      } catch (Error) {
        alert(" Impossible de créer l'objet XMLHttpRequest");
      }
    }
  }
  return obj;
}
function ajaxCategorie() {
  let req = Xhr();

  req.onreadystatechange = function () {
    if (this.readyState == 4) {
      let categorie = JSON.parse(req.responseText);

      let select = document.querySelector("#select_categorie");

      select.onchange = function () {
        ajaxProduit(this.value);
      };

      categorie.forEach((element) => {
        option = document.createElement("option");
        option.append(element.libCat);
        option.value = element.codeCat;
        select.appendChild(option);
      });
    }
  };
  req.open("GET", "config.php", true); // false pour synchrone et true pour asynchrone
  req.send(null);
}

function ajaxProduit(v) {
  // console.log(v);
  let req = Xhr();

  req.onreadystatechange = function () {
    if (this.readyState == 4) {
      let produits = req.responseXML;
      produits = produits.querySelectorAll("produit");
      let select = document.querySelector("#select_produit");
      console.log(req);

      select.innerHTML = "";

      produits.forEach((produit) => {
        option = document.createElement("option");
        option.append(produit.innerHTML);
        select.appendChild(option);
      });
    }
  };
  req.open("GET", `config2.php?codeCat=${v}`, true); // false pour synchrone et true pour asynchrone
  req.send(null);
}
