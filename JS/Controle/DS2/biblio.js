
/*EXERCICE 1*/
Array.prototype.min= function(){
    var min = this[0];
    for (let i = 0; i <= this.length-1; i++) {

        if (typeof(this[i]) == "number" ){
            if (this[i] <= min){
                min = this[i];
            }
        }else{
            return "Le tableau ne contient pas que des entiers";
        }
    }
    return min;
}

Array.prototype.max= function(){
    var max =this[0];
    for (let j = 0; j <= this.length-1; j++) {
        if (typeof(this[j]) == "number"){
            if (this[j] >= max){
                max = this[j];
            }
        }else{
            return "Le tableau ne contient pas que des entiers";
        }
    }
    return max;
}

Array.prototype.avg= function(){
    var somme = 0;
    for (let k = 0; k <= this.length-1; k++) {
        if (typeof(this[k]) == "number"){
            somme += this[k];
        }else{
            return "Le tableau ne contient pas que des entiers";
        }
    }
    return (somme/this.length).toFixed(2);
}

/*t = [12, 56, 78, -12, 789];
w=[12, 56, '78','-12', '789'];
z = [12, 45,"se" ,456];

console.log("T");
console.log(t.min());
console.log(t.max());
console.log(t.avg());

console.log("W");
console.log(w.min());
console.log(w.max());
console.log(w.avg());

console.log("z");
console.log(z.min());
console.log(z.max());
console.log(z.avg());*/
/*FIN EXERCICE 1*/