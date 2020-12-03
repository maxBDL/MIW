<!DOCTYPE html>
<html lang="frs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
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
            document.getElementsByTagName('input')[0].innerHtml = "";
            displayVilles(selectDep);
        }
    }

    displayVilles = (element) =>{
        let elmValue =  element.value;
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

        let inputVilles = document.getElementById('selectVille');
        inputVilles.innerHTML = "";
        let dataListVille = document.createElement('datalist');
        dataListVille.id = "villes";
        dataListVille.innerHTML = "";


        for (let i = 0; i < dataVilles.length; i++) {
            let optionsVilles = document.createElement('option');
            let optionsTextVilles = document.createTextNode(dataVilles[i].ville_nom.charAt(0).toUpperCase() + dataVilles[i].ville_nom.slice(1));
            optionsVilles.value = dataVilles[i].ville_nom;
            optionsVilles.append(optionsTextVilles);
            dataListVille.appendChild(optionsVilles);
        }
        inputVilles.append(dataListVille);
        inputVilles.onchange = () =>{
            displayMeteo(inputVilles);
        }
    }

    displayMeteo = (ville) =>{
        let villeValue =  ville.value;
        if ( villeValue != null) {
            let req = new Xhr();
            req.onreadystatechange = function () {
                if (this.readyState == this.DONE) {
                    if (this.status == 200) {
                        makeMeteo(this);
                    } else {
                        throw new Error(" impossible chager les catégories");
                        /*let body = document.getElementsByTagName('body')[0];
                        let content = document.getElementById('container_meteo');
                        content.innerHTML = "";
                        let erreur = document.createElement('h1');
                        let erreurText = document.createTextNode("Impossible de charger la page demandée");
                        erreur.append(erreurText);
                        body.appendChild(erreur);*/
                    }
                }
            }
            req.open("GET", "http://api.openweathermap.org/data/2.5/weather?q="+villeValue+"&appid=c4aa39fa1bfe493535e5d28c061d3e1c&lang=fr&units=metric", true);
            req.send(null);
        }
    }

    makeMeteo = (xhr) =>{
        let dataMeteo = JSON.parse(xhr.responseText);

        let content = document.getElementsByClassName('content')[0];

        let divMeteo = content.childNodes[1];
        //console.log(divMeteo)
        divMeteo.innerHTML = "";

        let h1Meteo = document.createElement('h1');
        let h1TextMeteo = document.createTextNode(dataMeteo.name+", "+dataMeteo.sys.country);
        h1Meteo.append(h1TextMeteo);
        divMeteo.appendChild(h1Meteo);

        let icon = document.createElement('img');
        icon.src = "http://openweathermap.org/img/wn/"+dataMeteo.weather[0].icon+".png";
        icon.alt = dataMeteo.weather[0].description;
        divMeteo.appendChild(icon);

        let h2Meteo = document.createElement('h2');
        let h2TextMeteo = document.createTextNode(dataMeteo.main.temp+" °C");
        h2Meteo.append(h2TextMeteo);
        divMeteo.appendChild(h2Meteo);

        let pDesc = document.createElement('p');
        let pDescText = document.createTextNode( dataMeteo.weather[0].description);
        pDesc.append(pDescText);
        divMeteo.appendChild(pDesc);

        var date = new Date(dataMeteo.dt * 1000);
        let pUpdate = document.createElement('p');
        let pUpdateText = document.createTextNode("Mis à jour le: "+ ("0" + date.getDay()).substr(-2) + "/" + date.getMonth() + "/" + date.getFullYear() + " à " + date.getHours()  + ":" + ("0" + date.getMinutes()).substr(-2) + ":" + ("0" + date.getSeconds()).substr(-2));
        pUpdate.append(pUpdateText);
        divMeteo.appendChild(pUpdate);


        //Creation du tableau
        let table = document.createElement('table');

        //Ligne vent
        let trWind = document.createElement('tr');
        let tdWindTitle = document.createElement('td');
        let tdWindTitleText = document.createTextNode("Vent");
        let tdWindContent = document.createElement('td');
        let tdWindContentSpeed = document.createTextNode(dataMeteo.wind.speed + " m/s");
        let brWind = document.createElement('br');
        let tdWindContentSpeedDir = document.createTextNode(toTextualDescription(dataMeteo.wind.deg) + "( " + dataMeteo.wind.deg + " °)");
        tdWindContent.appendChild(tdWindContentSpeed);
        tdWindContent.appendChild(brWind);
        tdWindContent.appendChild(tdWindContentSpeedDir);
        tdWindTitle.append(tdWindTitleText);
        trWind.appendChild(tdWindTitle);
        trWind.appendChild(tdWindContent);
        table.appendChild(trWind);

        //Ligne nuage
        let trCloud = document.createElement('tr');
        let tdCloudTitle = document.createElement('td');
        let tdCloudTitleText = document.createTextNode("Nuages");
        let tdCloudContent = document.createElement('td');
        let tdCloudContentText = document.createTextNode(dataMeteo.weather[0].description);
        tdCloudContent.appendChild(tdCloudContentText);
        tdCloudTitle.append(tdCloudTitleText);
        trCloud.appendChild(tdCloudTitle);
        trCloud.appendChild(tdCloudContent);
        table.appendChild(trCloud);


        //Ligne pression
        let trPression = document.createElement('tr');
        let tdPressionTitle = document.createElement('td');
        let tdPressionTitleText = document.createTextNode("Pression");
        let tdPressionContent = document.createElement('td');
        let tdPressionContentText = document.createTextNode(dataMeteo.main.pressure + " hpa");
        tdPressionContent.append(tdPressionContentText);
        tdPressionTitle.append(tdPressionTitleText);
        trPression.appendChild(tdPressionTitle);
        trPression.appendChild(tdPressionContent);
        table.appendChild(trPression);

        //Ligne humidité
        let trHumidity = document.createElement('tr');
        let tdHumidityTitle = document.createElement('td');
        let tdHumidityTitleText = document.createTextNode("Humidité");
        let tdHumidityContent = document.createElement('td');
        let tdHumidityContentText = document.createTextNode(dataMeteo.main.humidity + " %");
        tdHumidityContent.append(tdHumidityContentText);
        tdHumidityTitle.append(tdHumidityTitleText);
        trHumidity.appendChild(tdHumidityTitle);
        trHumidity.appendChild(tdHumidityContent);
        table.appendChild(trHumidity);

        //Ligne pluie
        let trRain = document.createElement('tr');
        let tdRainTitle = document.createElement('td');
        let tdRainTitleText = document.createTextNode("Pluie");
        let tdRainContent = document.createElement('td');
        if (typeof dataMeteo.rain !== 'undefined' ){
            var tdRainContentText = document.createTextNode(dataMeteo.rain);
        }else{
            var tdRainContentText = document.createTextNode("Pas de données");
        }
        tdRainContent.append(tdRainContentText);
        tdRainTitle.append(tdRainTitleText);
        trRain.appendChild(tdRainTitle);
        trRain.appendChild(tdRainContent);
        table.appendChild(trRain);

        //Ligne levé soleil
        let trSunrise = document.createElement('tr');
        let tdSunriseTitle = document.createElement('td');
        let tdSunriseTitleText = document.createTextNode("Levé de soleil");
        let tdSunriseContent = document.createElement('td');
        var leve = new Date(dataMeteo.sys.sunrise * 1000);
        let tdSunriseContentText = document.createTextNode(leve.getHours()  + ":" + ("0" + leve.getMinutes()).substr(-2) + ":" + ("0" + leve.getSeconds()).substr(-2));
        tdSunriseContent.append(tdSunriseContentText);
        tdSunriseTitle.append(tdSunriseTitleText);
        trSunrise.appendChild(tdSunriseTitle);
        trSunrise.appendChild(tdSunriseContent);
        table.appendChild(trSunrise);

        //Ligne levé soleil
        let trSunset = document.createElement('tr');
        let tdSunsetTitle = document.createElement('td');
        let tdSunsetTitleText = document.createTextNode("Couché de soleil");
        let tdSunsetContent = document.createElement('td');
        var couche = new Date(dataMeteo.sys.sunset * 1000);
        let tdSunsetContentText = document.createTextNode(couche.getHours()  + ":" + ("0" + couche.getMinutes()).substr(-2) + ":" + ("0" + couche.getSeconds()).substr(-2));
        tdSunsetContent.append(tdSunsetContentText);
        tdSunsetTitle.append(tdSunsetTitleText);
        trSunset.appendChild(tdSunsetTitle);
        trSunset.appendChild(tdSunsetContent);
        table.appendChild(trSunset);

        divMeteo.appendChild(table);
        displayMap(dataMeteo);
    }

    displayMap = (data) =>{
        let content = document.getElementsByClassName('content')[0];
        document.getElementsByTagName('div')[3].remove();
        let divCarte = document.createElement('div');
        divCarte.id = "maCarte";
        content.appendChild(divCarte);
        let carte = L.map('maCarte').setView([data.coord.lat, data.coord.lon],9 );
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
        let marker = L.marker([data.coord.lat, data.coord.lon]);
        marker.addTo(carte);
        var cercle=L.circle([data.coord.lat, data.coord.lon],20000);
        cercle.addTo(carte);
    }

    function  toTextualDescription(degree){
        if (degree>337.5) return 'Nord';
        if (degree>292.5) return 'Nord-Ouest';
        if(degree>247.5) return 'Ouest';
        if(degree>202.5) return 'Sud-Ouest';
        if(degree>157.5) return 'Sud';
        if(degree>122.5) return 'Sud-Est';
        if(degree>67.5) return 'Est';
        if(degree>22.5){return 'Nord-Est';}
    }

    onload = displayDep;
</script>

<body>
<div id="container_select">
    <select id="selectDep"></select>
    <input list="villes" id="selectVille"/>
</div>
<div class="content">
    <div id="container_meteo"></div>
</div>

</body>
</html>
