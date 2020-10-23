
function insere(ch){
    for (let i = 0; i < tab.length; i++) {
        if (tab[i] > ch){
            tab.splice(i, 1, ch);
            return tab;
        }else if(i == tab.length-1){
            tab.push(ch);
            return tab
        }
    }
}

function insere2(ch){
    let temp;
    let nb = t.length;
    let i = nb;
    t[nb] = ch;
    while (i > 0  && t[i]<t[i-1]){
        temp = t[i];
        t[i] = t[i-1];
        t[i-1]= temp;
        i--;
    }
    console.log(t);
}

var t = ['bapt', 'cedric', 'didier', 'luc'];
var ch= 'eric';


insere2(ch);