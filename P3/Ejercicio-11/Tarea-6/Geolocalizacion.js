class Geolocalizacion {
	constructor() {
	}

	initMap() {
		var oviedo = {lat: 43.5672702, lng: -5.8502461};
		var mapa = new google.maps.Map(document.querySelector("section"),{zoom: 8,center:oviedo});
		var marcador = new google.maps.Marker({position:oviedo,map:mapa});
	}

	buscar() {
		var ubicacion = {lat: parseFloat($("article>p:nth-child(1)>input").val()), lng: parseFloat($("article>p:nth-child(2)>input").val())};
		var mapa = new google.maps.Map(document.querySelector("section"),{zoom: 8,center:ubicacion});
		var marcador = new google.maps.Marker({position:ubicacion,map:mapa});
	}
}
var geo = new Geolocalizacion();
var mapaDinamicoGoogle = new Object();
mapaDinamicoGoogle.initMap = geo.initMap;