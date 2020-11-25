# Les directives pour commandes les éléments

> Une directive est une sorte d'argument spécial que l'on adosse à des élements ou composants, qui affecte **réactivement** des effets au DOM dès que la valeur de ladite directive est altéréé.

On peut classer les directives en 5 catégories :
* [ Interpolation ](./exemples/interpolation.html)
* [le rendu conditionnel](./exemples/rendu_conditionnel.html)
* [le rendu de liste](./exemples/rendu_liste.html)
* [Gestion des évènements](gestion-des-évènements)
* [les liaisons](#les-directives-de-liaison-(champs-de-formulaire))

| Interpolation | Rendu conditionnel | Rendu de liste | Gestion d'évènements | Liaison           |
| -             | -                  | -              | -                    | -                 |
| v-text        | v-show             | v-for (:key)   | v-on (abrégé @)      | v-bind (abrégé :) |
| v-html        | v-if               |                |                      | v-model           |
| v-pre         | v-else             |                |                      |                   |
| v-cloak       | v-else-if          |                |                      |                   |
| v-once        |                    |                |                      |                   |

On peut aussi associer les directives et le arguments html, en prefixant l'argument par '**:**' ex:
```html
<button :class"var_class">Coucou</button>
```

-------------------------------------------------------------------------------------------------------------
Gestion des évènements
-------------------------------------------------------------------------------------------------------------

### Les évènements => les évènements du DOM
* click
* submit
* scroll
* keyup

### Les modificateurs d'évènements

| Modificateur | Description                                                                |
| :----------: | -------------------------------------------------------------------------- |
| .stop         | stopPropagation()                                                          |
| .prevent      | preventDefault()                                                           |
| .self         | l'évènement ce déclenche sur l'élément précis, et non ses enfants          |
| .once         | l'évènement ne se déclenche qu'une seule fois                              |
| .exact        | l'évènement ne se déclenche que sur la définition exacte des modificateurs |
| .passive      | optimisation de l'évènement scroll en tactile                              |

```html
<!-- la propagation de l'évènement `click` sera stoppée -->
<a v-on:click.stop="counter += 1"></a>

<!-- l'évènement `submit` ne rechargera plus la page -->
<form v-on:submit.prevent="aLaValidation"></form>

<!-- les modificateurs peuvent être chainés -->
<a v-on:click.stop.prevent="monActionBis(var1, 'chaine_A')"></a>
```

### Les modificateurs pour la souris

* .left
* .middle
* .right

### Les modificateurs de code des touches

* .enter
* .tab
* .delete
* .esc
* .space
* .up
* .down
* .left
* .right

### Les modificateurs système

* .ctrl
* . alt
* . shift
* . meta

###  Les modificateurs perso
```html
<!--déclaration -->
Vue.config.keyCodes.f1 = 112

<!--utilisation-->
<input type="text" @keyup.f1="toucheF1" />
```

### Gestion des évènements : Methods - les fonctions de traitement
```js
var vm = new Vue({
	el: '#app',
	data: {
		maVar = "toto"
	},
	methods: {
		methodeUne(){
			// action sans retour
		},
		methodeDeux(){
			// action avec retour
			return 'Boom';
		},
		methodeTrois(p){
			// action avec 1 paramètre
		},
		methodeQuatre(p){
			// action avec 1 paramètre et retour
			return 'Boom_' + p;
		},
		methodeThis(){
			// le contexte courant est atteignable avec le mot-clé **this**
			console.log('standard : ' + this);
			console.log('this.maVar'); // affiche : toto
		},
		methodeThisFlechee : () => {
			// this -> nouveau contexte !!
			console.log('fleche : ' + this)
			console.log('this.maVar'); // N'AFFICHE PAS : toto
		}
	}
})
```
#### Mauvais code
```js
Method2: () => {this.maVar} // ERR
```
#### Bon code
```js
Method1: function(){ this.maVar } // OK
Method1(){ this.maVar } // OK
```

-------------------------------------------------------------------------------------------------------------
 Les directives de liaison (champs de formulaire)
-------------------------------------------------------------------------------------------------------------

**v-model** : création d'une liaison de données bidirectionnelles sur les champs du formulaire
> **v-model** ne prend pas en compte la valeur initiale des attributs **value**, **checked**, **selected**
> Il faut déclarer la valeur initiale dans l'option :**data**

**exemples: [liaison.js](./exemples/liaisons.html)**

## Liaisons des attributs value
```html
<!-- `picked` sera une chaine de caractères "a" quand le bouton radio sera sélectionné -->
<input type="radio" v-model="picked" value="a">

<!-- `toggle` est soit true soit false -->
<input type="checkbox" v-model="toggle">

<!-- `selected` sera une chaine de caractères "abc" quand la première option sera sélectionnée -->
<select v-model="selected">
	<option value="abc">ABC</option>
</select>
```

### Checkbox
```html
<input
	type="checkbox"
	v-model="toggle"
	true-value="oui"
	false-value="non"
>
```
```js
// lorsque c'est coché :
vm.toggle === 'oui'
// lorsque que c'est décoché :
vm.toggle === 'non'
```

### Radio
```html
<input type="radio" v-model="pick" v-bind:value="a">
```
```js
// lorsque c'est coché :
vm.pick === vm.a
```

### Options de select
```html
<select v-model="selected">
	<!-- objet littéral en ligne -->
	<option v-bind:value="{ number: 123 }">123</option>
</select>
```
```js
// lorsque c'est sélectionné :
typeof vm.selected // => 'object'
vm.selected.number // => 123
```
