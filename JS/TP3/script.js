let carte = L.map('maCarte', {center: [46.3630104, 2.9846608],zoom: 5});
/* On aurait aussi pu écrire
let carte = L.map('maCarte').setView([46.3630104, 2.9846608],5 );
*/
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
/*let marker = L.marker([44.566667,6.083333]);
marker.addTo(carte);*/

let villes= {
    "Gap": [44.566667, 6.083333],
    "Nice": [43.696036, 7.265592],
    "Paris": [48.856614, 2.352221]
}
marker = L.marker([0,0]);

/*function afficheMarker(){
    marker = L.marker([villes["Gap"][0],villes["Gap"][1]]);
    marker.addTo(carte);
    marker2 = L.marker([villes["Nice"][0],villes["Nice"][1]]);
    marker2.addTo(carte);
    marker3 = L.marker([villes["Paris"][0],villes["Paris"][1]]);
    marker3.addTo(carte);
    button = document.getElementById('btnM').setAttribute("onclick","effaceMarker()");
}

function effaceMarker(){
    carte.removeLayer(marker);
    carte.removeLayer(marker2);
    carte.removeLayer(marker3);
    button = document.getElementById('btnM').setAttribute("onclick","afficheMarker()");
}*/

/*function effaceVille(){
    var marker = L.marker([villes["Gap"][0],villes["Gap"][1]]);
    carte.removeLayer(marker);
    var marker2 = L.marker([villes["Nice"][0],villes["Nice"][1]]);
    carte.removeLayer(marker2);
    var marker3 = L.marker([villes["Paris"][0],villes["Paris"][1]]);
    carte.removeLayer(marker3);
}*/

function afficheVille(){
    select = document.getElementById("ville").value;
    var long = select.split(":")[0];
    var lat = select.split(":")[1];
    marker = L.marker([long,lat]);
    marker.addTo(carte);
    carte.setView([long, lat],15);
}


