console.log(Vue);

// Définition d'un nouveau composant appelé `button-counter`
Vue.component('button-counter', {
	data: function () {
		return {
			count: 0
		};
	},
	template: '<button v-on:click="count++">Vous m\'avez cliqué {{ count }} fois.</button>'
});

console.log(Vue.component('button-counter'));

var vm = new Vue({
	el: '#components-demo'
});
