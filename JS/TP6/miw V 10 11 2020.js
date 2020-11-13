/*****************************************************************************************************************/
/*                                                                                                               */
/*                                Bibliothèque  MIW   version:  miw V  10 11 2020.js                             */
/*                                En cours de réalisation                                                        */
/*                                Licence  Mention Mobilité - Internet & Web    (MIW)                            */
/*                                                                                                               */
/*                                IUT d'Aix-en-Provence Département GEA GAP                                      */
/*                                Site internet de la licence :                                                  */
/*    https://iut.univ-amu.fr/diplomes/licence-professionnelle-informatique-applications-mobilite-internet-web   */                                                                                                      
/*****************************************************************************************************************/

(function(){  // ief  ou fie fonction immédiatement exécutée.

/******************************************************************************************************/
/***********************  Les expressions régulières    ***********************************************/
/******************************************************************************************************/ 
		Reg = {	        // objet contenant des expressions régulières à améliorer et à compléter
			required 	:	/^.+/,
			alpha  		:  	/^[a-z ._-]+$/i,
			alphanum 	: 	/^[a-z0-9 ._-]+$/i,
			digitSign 	: 	/^[-+]?[0-9]+$/,
			digit		:	/^[0-9]+$/,
			nodigit 	: 	/^[^0-9]+$/,
			number 		: 	/^[-+]?(\d*\.?\d+)|(\d+\.?\d*)$/,
			email 		: 	/^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i,
			url 		: 	/^(http|https):\/\/[a-z0-9\-\.\/_]+\.[a-z]{2,3}$/i,          			
		};


/******************************************************************************************************/
/***********************  Les Raccourcis   pour le DOM  ***********************************************/
/******************************************************************************************************/


/* recherche de noeuds */

		_   = 	function(sCss)	{
					 if (document.querySelectorAll(sCss).length==0)  		return null;
		                else if (document.querySelectorAll(sCss).length==1) return document.querySelector(sCss);
					          else 											return document.querySelectorAll(sCss);
				};

		_cf = 	function()    	{return document.createDocumentFragment();};		
		
		_ct =  	function(txt,nodeInsert){ let t = document.createTextNode(txt);
											  if (nodeInsert) nodeInsert.appendChild(t);
											  return t;
										};

		_ce = 	function(el,nodeInsert) { let e = document.createElement(el);
											  if (nodeInsert) nodeInsert.appendChild(e);
											  return e;
										};

		_cn = 	function(node,attribut,style,nodeInsert){  // pour créer un noeud avec des attributs et des styles ( attributs et style sont des objets )
					let n = _ce(node);
						n.attrib(attribut);
						n.css(style);
						if (nodeInsert) nodeInsert.appendChild(n);
						return n;
				}
			
		_dn = 	function(node){                               // pour supprimer un noeud
					node.parentNode.removeChild(node);
				}
		
		// raccourcis moins utiles	
		
		_id = function(id){return document.getElementById(id)		;};
		_tn = function(tn){return document.getElementsByTagName(tn)	;};
		_n  = function(n) {return document.getElementsByName(n)		;};  

/******************************************************************************************************/
/***********************  Raccourci   pour console.log  ***********************************************/
/******************************************************************************************************/

		cl=(n)=> {return console.log(n)};
		
/*******************************************************************************************************/
/***********************  Extension de la classe Object avec la methode forEach    *********************/
/*******************************************************************************************************/
// forEach: méthode pour parcourir les propriétés d'un objet et les traiter avec une fonction callback
		Object.prototype.forEach=	function(f){                 
										for ( var i in this ){
                                            if (this.hasOwnProperty(i))	 f(i,this[i]);										
											// i: propriété   this[i]:valeur de la propriété
											//f(i,this[i]);
										}
									};
									

/******************************************************************************************************/
/***********************  Extension de toutes les classes avec la methode extend  *********************/
/******************************************************************************************************/				

Object.prototype.extend =	function(obj){
										//for( var i in obj){this[i] =  obj[i]};
		                                obj.forEach((i,j)=>{this[i] =  obj[i]})
						   };

/*  		
		String.prototype.extend =	function(obj){
										//for( var i in obj){this[i] =  obj[i]};
		                                obj.forEach((i,j)=>{this[i] =  obj[i]})
									};
		Array.prototype.extend  =	function(obj){  
										//for( var i in obj){this[i] =  obj[i]};
		                                obj.forEach((i,j)=>{this[i] =  obj[i]})
									};
		Number.prototype.extend	=	function(obj){  
										//for( var i in obj){this[i] =  obj[i]};
		                                obj.forEach((i)=>{this[i] =  obj[i]})
									};
		Node.prototype.extend	=	function(obj){  
										//for( var i in obj){this[i] =  obj[i]};
		                                obj.forEach((i)=>{this[i] =  obj[i]})
									};  */
								
/******************************************************************************************************/
/***********************  Extension de la clase String  ***********************************************/
/******************************************************************************************************/			
					  
						  
						  
		String.prototype.extend({
			
			left  		: function(n){return this.substring(0,n)},
			
			right 		: function(n){return this.substring(this.length-n)},
			
			capitalize	: function(){
							return this.charAt(0).toUpperCase() + this.substring(1).toLowerCase();
						},
			
			trim		: function(){                               // cette méthode existe déjà pour String
							return this.replace(/(^\s*|\s*$)/g,"")
						}
		});
		
		//console.log(String.prototype)
/******************************************************************************************************/
/***********************  Extension de la clase Array   ***********************************************/
/******************************************************************************************************/		
		
		Array.prototype.extend({
			merge		: function(t){ 
							for (var i =0; i< t.length;i++){
								this.push(t[i]);
							}
							//t.forEach((i)=>{this.push(t[i])})
							
							return this;
						}			
		});
/******************************************************************************************************/
/***********************  Extension de la clase Number  ***********************************************/
/******************************************************************************************************/		
		Number.prototype.extend({
			p		: function(n){ return Math.pow(this,n)}
		});		
/******************************************************************************************************/
/***********************  Extension de la clase Node    ***********************************************/
/******************************************************************************************************/		
		Node.prototype.extend({
			changeId 	: function(val){ 
							this.id=val;
							return this;
						},
			css 		: function(obj) {     // permet d'affecter au noeud les propriétés de style contenues dans l'objet obj
							for( let  i in obj){
								if (obj.hasOwnProperty(i)) this.style[i]=obj[i];
							};
							return this;
						},

			attrib 	: function(obj){         // permet d'affecter au noeud les attributs contenus dans l'objet obj		
			
			 				for( let i in obj ){
								if (obj.hasOwnProperty(i))	this.setAttribute(i,obj[i])
							}; 
							return this;
						}					
		});	

})();

 
