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
			let parser = new DOMParser();
			let xmlDoc = parser.parseFromString(contenido, "text/xml");
			var puntos = [];
			for (const item of xmlDoc.getElementsByTagName('coordinates')) {
				let coordinates = item.textContent.split("\n");
				for (const coordinatesPair of coordinates) {
					let coordinate = coordinatesPair.split(",");
					if (coordinate[0] != "") {
						let punto = {lat: parseFloat(coordinate[1]), lng: parseFloat(coordinate[0])};
						puntos.push(punto);
					}
				}
			}
			var lugares = [];
			for (const l of xmlDoc.getElementsByTagName('description')) {
				lugares.push(l);
			}

			var centro = {lat: 40.418889, lng: -3.691944};
			this.mapa = new google.maps.Map(document.querySelector('article'),{zoom: 6,center:centro});
			var i = 0;
			for (const c of puntos){
				var dibujar = new google.maps.Marker({
					position: c,
					mapa,
					title: lugares[i].innerHTML
				});
				dibujar.setMap(this.mapa);
				i++;
			}
		}      
		lector.readAsText(archivo);
	}
}
var mapa = new Mapa();
var mapaDinamicoGoogle = new Object();
mapaDinamicoGoogle.initMap = mapa.initMap;