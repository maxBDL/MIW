function effacer(){
    document.getElementsByName("textArea")[0].value = "";
    document.getElementsByName("text")[0].innerHTML = "";
}

function size(){
    long = document.getElementsByName("textArea")[0].value.length;
    console.log(long);
    document.getElementsByName("text")[0].innerHTML = long;
}

function verifForm(){
    var elements = document.getElementById("form").elements;
    for (let i = 1; i < elements.length-1; i++) {
        if (elements[i].value == ""){
            alert("Veuillez entrer une valeur pour: "+elements[i].name);
        }else if(i == 6 && mails(elements[i].value) == false){
            alert("Veuillez entrer une vraie adresse mail: "+elements[i].value);
        }

    }
    return false;
}

function mails(t){sg
    var reg = RegExp("[a-z0-9-_.]+@(orange|hotmail|gmail|aol)[.](com|fr|org|net)","gi");
    return reg.test(t);
}

function conversion(){
    var nb = document.getElementsByName("nb")[0].value;
    if (document.getElementsByName("conv")[0].value == "fe"){
        document.getElementsByName("resultat")[0].value = nb / 6.55957;
    }else if(document.getElementsByName("conv")[0].value == "ef"){
        document.getElementsByName("resultat")[0].value = nb * 6.55957;
    }

}
