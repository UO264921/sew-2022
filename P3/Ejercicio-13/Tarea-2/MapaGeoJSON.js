class Mapa {
	constructor() {
	}

	initMap() {
		var centro = {lat: 40.418889, lng: -3.691944};
		this.mapa = new google.maps.Map(document.querySelector('article'),{zoom: 6,center:centro});
	}

	cargarMapa(files) {
		var archivo = files[0];
		var contenido = "";
		var lector = new FileReader();
		lector.onload = function (evento) {
			contenido = lector.result;
			var geoObject = JSON.parse(contenido);
			var features = geoObject.features;
			var puntos = [];
			for (let i = 0; i < features.length; i++) {
				let c0 = features[i].geometry.coordinates[0];
				let c1 = features[i].geometry.coordinates[1];
				let punto = {lat: parseFloat(c1), lng: parseFloat(c0)};
				puntos.push(punto);
				var centro = {lat: 40.418889, lng: -3.691944};
				this.mapa = new google.maps.Map(document.querySelector('article'),{zoom: 6,center:centro});
			}
			for (const c of puntos){
				var dibujar = new google.maps.Marker({
					position: c,
					mapa,
					title: "Lugar"
				});
				dibujar.setMap(this.mapa);
			}
		}      
		lector.readAsText(archivo);
	}
}
var mapa = new Mapa();
var mapaDinamicoGoogle = new Object();
mapaDinamicoGoogle.initMap = mapa.initMap;