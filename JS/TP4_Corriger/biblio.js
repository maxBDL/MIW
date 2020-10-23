/*******************************************************************************************************/
/* $(n)                  : raccourci pour atteindre un noeud HTML                                      */
/* nombre(x)             : détermine si un paramètretre donné x est un nombre                          */
/* nombrePositif(x)             : détermine si un paramètretre donné x est un nombre positif           */
/* nombreEntierPositif(x): détermine si un paramètre donné x est  un nombre entier  positif ou nul     */
/* pair(x)               : détermine si un paramètre x est un nombre entier naturel pair ou impair     */
/* arrondi (x,n)         : retourne le paramètre donné x arrondi n chiffres aprés la virgule           */
/* nbOccurences(c,ch)    : retourne le nombre de fois ou la chaine c apparaît dans la chaine ch        */
/* nbOccurencesBis(c,ch) : retourne le nombre de fois ou la chaine c apparaît dans la chaine ch(Ex Rg) */
/* substitue(c1, c2, c)  : remplace la chaine c1 par la chaine c2 dans la chaine c                     */
/* substitueBis(c1, c2,c): remplace la chaine c1 par la chaine c2 dans la chaine c (exp reg)           */
/* compresse(c,sup)      : supprime toutes les occurences de la chaine sup dans la chaine c            */
/* error(n)              : affiche un message d'erreur en fonction d'un numéro donné n                 */
/* surfCarre(c)          : retourne la surface d'un carré de côté c                                    */
/* surfRect(c,l)         : retourne la surface d'un rectangle de largeur c et de longueur l            */
/* surfCercle(r)         : retourne la surface d'un cercle de rayon r                                  */
/* saisieMDP() :         : retourne true si le mot de passe est correct ou false dans le cas contraire */
/* datJjMmAaaa(d)        : retourne true si la date d est au format jj/mm/aaaa sinon false             */
/* jour(d)               : retourne le jour de la semaine correspondant à une date                     */
/* maxi()                : retourne la plus grande valeur numérique passée en paramètre                */
/* reverse()             : Méthode ajoutée à String pour inverser les caractères d'une chaine          */
/*******************************************************************************************************/ 


/* $(n)             : raccourci pour atteindre un noeud HTML                                           */
$ = (n)=>{return document.getElementById(n)};


/* nombre(x)             : détermine si un paramètretre donné x est un nombre                          */
function nombre(x){
              let reg = /^[+-]?((\d+\.?\d*)|(\d*\.?\d+))$/   ;          
              return reg.test(x);
              // return /^[+-]?((\d+\.?\d*)|(\d*\.?\d+))$/.test(x) ;
} 

/* Ecriture avec une fonction fléchée
nombre = (x) => {return /^[+-]?((\d+\.?\d*)|(\d*\.?\d+))$/.test(x)} */

/* nombrePositif(x)             : détermine si un paramètretre donné x est un nombre positif            */
function nombrePositif(x){
              let reg = /^[+]?((\d+\.?\d*)|(\d*\.?\d+))$/   ;          
              return reg.test(x);
              // return /^[+]?((\d+\.?\d*)|(\d*\.?\d+))$/.test(x) ;
} 

/* nombreEntierPositif(x): détermine si un paramètre donné x est  un nombre entier  positif ou nul     */
 function nombreEntierPositif(x){
         return  (nombre(x) && Math.round(x)==x && x>=0);
         //return /^[+]?\d*$/.test(x) ;
}
/* Ecriture avec une fonction fléchée  

nombreEntierPositif = (x)=>{return  (nombre(x) && Math.round(x)==x && x>=0);} */

function pair(x){
         return (nombreEntierPositif(x) && x%2==0);
}

function arrondi(x,n){
         return ((Math.round(x*Math.pow(10,n))))/(Math.pow(10,n));
}

// Remarque s: 
//il existe la méthode toFixed(n) de Number qui donne un meilleur résultat
// Exemple si x = 12.3    arrondi(x,3) donne 12.3   et    x.toFixed(3) donne 12.300
// On peut ajouter la fonction arrondi à l'ojet Math  de la manière suivante: 
// Math.arrondi= function(x,n){ return (Math.round(x*Math.pow(10,n)))/(Math.pow(10,n));}
// On peut ajouter la méthode arrondi à la classe Number de la manière suivante: 
// Number.prototype.arrondi=function(n){return (Math.round(this*Math.pow(10,n)))/(Math.pow(10,n));}

function nbOccurences(c,ch){
         return ch.split(c).length - 1;
}
//On peut ajouter la méthode nbOccurences à la classe String de la manière suivante : 
//String.prototype.nbOccurences=function(c){return this.split(c).length - 1;}


function nbOccurencesBis(c,ch){
         let reg = new RegExp(c,"g");     // la notation avec new permet d'intégrer des variables dans le pattern
         return ch.match(reg)?ch.match(reg).length:0;
}

function compresse(c,sup){
	let reg = new RegExp(sup,"g");
	return c.replace(reg,sup)
}

function substitue(c1, c2, c){
         return c.split(c1).join(c2);
}

function substitueBis(c1, c2, c){
         var reg = new RegExp(c1,"g")
         return c.replace(reg,c2);
		 // return c.replace(new RegExp(c1,"g"),c2)
}

function error(n){

  switch (n){
      case 1  : alert("Veuillez tapez un nombre entier positif SVP");break;
      case 2  : alert("Veuillez tapez un nombre SVP");break;
      case 3  : alert("Erreur de saisie , valeur non conforme");break;
      case 4  : alert("Date non valide ");break;
      default : alert("ERREUR");break;
  }
}

function surfCarre(c){
        return c * c;
}

function surfRect(c,l){
        return c * l;
}

function surfCercle(r){
        return Math.PI * Math.pow(r,2);
}

function saisieMDP(mp){
    return prompt("votre mot de passe SVP")==mp ;
}

function datJjMmAaaa(d){
    let j, m, a, b1 ;
    let nbJours = [31,28,31,30,31,30,31,31,30,31,30,31];
	
	if (d.split("/").length != 3 ) {console.log(" La date est au mauvais format"); return false;}
	
    j = d.split("/")[0];    m=d.split("/")[1];     a=d.split("/")[2];

	if (!nombreEntierPositif(j) || j==0 || !nombreEntierPositif(m) || m==0 || m>12 || !nombreEntierPositif(a) || a==0 || a.length!=4  ) {console.log(" La date contient des valeurs incorrectes"); return false;}
    
    // Définition du dernier jour de février
    // Année bissextile si annnée divisible par 4 et que ce n'est pas un siècle, ou bien si divisible par 400

    if ((a%4 == 0 && a%100 !=0) || a%400 == 0) nbJours[1] = 29;

    return ( j<= nbJours[m-1] );
}

function jour(d){   // d: paramètre de type date date au format jj/mm/aaaa

    let j = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

    let da = d.split("/").reverse().join("/")        // d :est maintenant au format aaaa/mm/jj
    da = new Date(da);                               // d : date  au format aaaa/mm/jj
    return(j[da.getDay()])
}


 function maxi(){
              let i, n, max  ;
              
              n = arguments.length ;
              
              if (n==0) throw new Error (" la liste des paramètres est vide");
              
              max = arguments[0];
              
              for (i=0;i < n;i++){
                   if (!nombre(arguments[i])) throw new Error (arguments[i] + " n'est pas un nombre");
                   if (arguments[i]>max) max=arguments[i];
              }
			 
              return max;    
}

String.prototype.reverse=function(){return this.split("").reverse().join("")}