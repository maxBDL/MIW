<!DOCTYPE html>
<html lang="frs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Title</title>
    <!--<script src="biblio.js"></script>-->
</head>
<script>
    function Xhr() {
        let xhr = null;
        if (window.XDomainRequest) {
            xhr = new XDomainRequest();
        } else if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            alert("Votre navigateur ne gère pas l'AJAX cross-domain !");
        }
        return xhr;
    }

    displayDep =()=>{
        let req = new Xhr();
        req.onreadystatechange = function() {
            if(this.readyState == this.DONE ) {
                if (this.status == 200 ){
                    makeListDep(this);
                }
                else
                    throw new Error(" impossible chager les catégories")
            }
        }
        req.open("GET", "listDepartements.php", true);
        req.send(null);
    }

    makeListDep = (xhr) => {
        let dataDep = JSON.parse(xhr.responseText);

        let selectDep = document.getElementById('selectDep');
        let optionDep = document.createElement('option');
        let optionTextDep = document.createTextNode("Département ...");
        optionDep.append(optionTextDep);
        selectDep.appendChild(optionDep);

        for (let i = 0; i < dataDep.length; i++) {
            let optionsDep = document.createElement('option');
            let optionsTextDep = document.createTextNode(dataDep[i].departement_slug.charAt(0).toUpperCase() + dataDep[i].departement_slug.slice(1));
            optionsDep.value = dataDep[i].departement_code;
            optionsDep.append(optionsTextDep);
            selectDep.appendChild(optionsDep);
        }

        selectDep.onchange = () =>{
            displayVilles(selectDep);
        }
    }

    displayVilles = (element) =>{
        let elmValue =  element.value;
        console.log(elmValue);
        if ( elmValue !=0) {
            let req = new Xhr();
            req.onreadystatechange = function () {
                if (this.readyState == this.DONE) {
                    if (this.status == 200) {
                        makeListVilles(this);
                    } else
                        throw new Error(" impossible chager les catégories")
                }
            }
            req.open("GET", "listVilles.php?dep="+elmValue, true);
            req.send(null);
        }
    }

    makeListVilles = (xhr) =>{
        let dataVilles = JSON.parse(xhr.responseText);
        console.log(dataVilles);
        let selectVilles = document.getElementById('selectVille');
        let optionVilles = document.createElement('option');
        let optionTextVilles = document.createTextNode("Ville ...");
        optionVilles.append(optionTextVilles);
        selectVilles.appendChild(optionVilles);

        for (let i = 0; i < dataVilles.length; i++) {
            let optionsVilles = document.createElement('option');
            let optionsTextVilles = document.createTextNode(dataVilles[i].ville_nom_simple.charAt(0).toUpperCase() + dataVilles[i].ville_nom_simple.slice(1));
            optionsVilles.value = dataVilles[i].ville_code_postal;
            optionsVilles.append(optionsTextVilles);
            selectVilles.appendChild(optionsVilles);
        }

        /*selectDep.onchange = () =>{
            displayVilles(selectDep.value);
        }*/
    }
    onload = displayDep;
</script>

<body>
<div id="container_select">
    <select id="selectDep"></select>
    <select id="selectVille"></select>
</div>
<div id="container_meteo">

</div>
</body>
</html>
