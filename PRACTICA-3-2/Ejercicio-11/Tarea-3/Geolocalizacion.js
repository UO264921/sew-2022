class Geolocalizacion {
    constructor() {
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.errores.bind(this));
    }
    getPosicion(posicion) {
        this.longitud = posicion.coords.longitude; 
        this.latitud = posicion.coords.latitude;  
        this.altitud = posicion.coords.altitude;    
    }

    errores(error){
		switch(error.code) {
			case error.PERMISSION_DENIED:
				this.mensaje = "El usuario debe dar permisos de localización"
				break;
			case error.POSITION_UNAVAILABLE:
				this.mensaje = "No hay información de geolocalización"
				break;
			case error.TIMEOUT:
				this.mensaje = "Petición caducada"
				break;
			case error.UNKNOWN_ERROR:
				this.mensaje = "Error desconocido"
				break;
		}
	}

    getLongitud() {
        return this.longitud;
    }
    getLatitud() {
        return this.latitud;
    }
    getAltitud() {
        return this.altitud;
    }
    verTodo() {
        var ubicacion=document.querySelector("body>section>p");
        var datos='';
        datos+='<p>Longitud (grados): ' + this.longitud + '</p>'; 
        datos+='<p>Latitud (grados): ' + this.latitud + '</p>';
        datos+='<p>Altitud (metros): ' + this.altitud + '</p>';
        ubicacion.innerHTML = datos;
    }

    getMapaEstaticoGoogle(){
        var ubicacion=document.querySelector("body>section>p");

        var apiKey = "&key=AIzaSyC6j4mF6blrc4kZ54S6vYZ2_FpMY9VzyRU";
        var url = "https://maps.googleapis.com/maps/api/staticmap?";
        var centro = "center=" + this.latitud + "," + this.longitud;
        var zoom ="&zoom=15";
        var tamano= "&size=800x600";
        var marcador = "&markers=color:red%7Clabel:S%7C" + this.latitud + "," + this.longitud;
        var sensor = "&sensor=false"; 
        
        this.imagenMapa = url + centro + zoom + tamano + marcador + sensor + apiKey;
        ubicacion.innerHTML = "<section><h2>Mapa</h2><img src='" + this.imagenMapa + "'/></section>";
    }
}
var miPosicion = new Geolocalizacion();