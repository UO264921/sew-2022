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
}
var miPosicion = new Geolocalizacion();