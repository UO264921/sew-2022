class Geolocalizacion {
    constructor() {
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this));
    }
    getPosicion(posicion) {
        this.longitud = posicion.coords.longitude; 
        this.latitud = posicion.coords.latitude;  
        this.altitud = posicion.coords.altitude;    
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
        datos+= this.altitud==null? '<p>Altitud (metros): No hay datos </p>': '<p>Altitud (metros): ' + this.altitud + ' </p>';
        ubicacion.innerHTML = datos;
    }
}
var miPosicion = new Geolocalizacion();