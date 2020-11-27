<html>
<head>
<title></title>

<script type="text/javascript">

// fonction permettant de créer d'un requete HTTP en fonction du navigateur

Xhr=()=>{
		   var obj = null;
		   try { obj = new ActiveXObject("Microsoft.XMLHTTP");}
			 catch(Error) { try { obj = new ActiveXObject("MSXML2.XMLHTTP");}
			   catch(Error) { try { obj = new XMLHttpRequest();}
				  catch(Error) { alert(' Impossible de créer l\'objet XMLHttpRequest')}
							}
						  }
		   return obj;
		};

		
// fonction permettant de rechercher  les catégories dans la base de données		
displayCategorie=()=>{

		let req = Xhr();  // création d'un objet de type XMLHttpRequest

		document.getElementById("loading").src = "images/sablier.gif";  // sablier pour l'attente

		req.onreadystatechange = function() { 
				if(this.readyState == this.DONE ) {
								if (this.status == 200 ){
									makeListCategorie(this);
									document.getElementById("loading").removeAttribute("src");
								}
								else
									throw new Error(" impossible chager les catégories")
				}	
			}
 		req.open("GET", "listeCategories.php?cache="+new Date().getTime(), true);
		req.send(null);		
}

// Création de la liste déroulante contenant les catégories de produit (A partir d'un fichier XML)
makeListCategorie=(xhr)=>{

		let oData=xhr.responseXML;   // récupération du fichier xlm contenant les produits
		
		let oSelect= document.getElementById("categorieSelect"); // positionnement sur le premier select

        let oOptions = oData.getElementsByTagName("option");    // Stockage des categories dans le tableau oOptions

        for(let i=0;i<oOptions.length;i++) { // génération de la première liste déroulante 
		
						let t=document.createTextNode(oOptions[i].firstChild.data);
						// Ou let t=document.createTextNode(oOptions[i].textContent);
						
						let n=document.createElement("option");
						n.value=oOptions[i].getAttribute("value")
						n.appendChild(t);
						oSelect.appendChild(n);
        }

        //Mise en place d'un écouteur
        oSelect.onchange =()=>{displayProduit(oSelect)}
};

// fonction permettant de rechercher  les produits d'une catégorie dans la base de données	
displayProduit=(oElem)=>{

        let value =  oElem.value; 
		
		document.getElementById("loading").src = "images/sablier.gif";

		if ( value !=0){		
			let req = Xhr();  
			req.onreadystatechange = function() { 
					if(this.readyState == this.DONE && this.status == 200 ) { 
									makeListProduit(this);
									document.getElementById("loading").removeAttribute("src");
					} 
					if (this.readyState == this.DONE && this.status != 200) alert("problème de connexion")
				}
			req.open("GET", "listeProduits.php?codeCat=" + encodeURIComponent(value) + "&cache=" +new Date().getTime(), true);
			req.send(null);
		}
		else {
			let oSelect= document.getElementById("produitsSelect");
			oSelect.innerHTML="";  // on vide la liste déroulante
			document.getElementById("loading").removeAttribute("src");
		}

};
// Fonction permettant de créer la liste déroulante contenant les  produits (A partir d'un fichier JSon)
makeListProduit=(xhr)=>{

		let oData=JSON.parse(xhr.responseText);
		//Ou let oData=eval("("+xhr.responseText+")");   // récupération du JSON contenant les produits		

		let oSelect= document.getElementById("produitsSelect");
		
		oSelect.innerHTML="";  // on vide la liste déroulante

        for(let i=0;i<oData.length;i++) { // génération de la deuxième liste déroulante 
		
						let t=document.createTextNode(oData[i].libPro);
						let n=document.createElement("option");
						n.value=oData[i].numPro
						n.appendChild(t);
						oSelect.appendChild(n);
        }
};			

onload=displayCategorie;

//-->
</script>
</head>

<body>
	<fieldset>
	        <legend>Double listes liées</legend>
	        <div id="affichage">
	                        <select id="categorieSelect"></select>
							<select id="produitsSelect"></select><img id="loading"/>
	        </div>
	</fieldset>
</body>
