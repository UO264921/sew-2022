class Archivos {
	constructor() {
	}
	leerArchivoTexto(files) {
		var archivo = files[0];
		var nombre = document.querySelector("section:nth-child(2)>p:nth-child(4)");
		var tamano = document.querySelector("section:nth-child(2)>p:nth-child(5)");
		var tipo = document.querySelector("section:nth-child(2)>p:nth-child(6)");
		var ultima = document.querySelector("section:nth-child(2)>p:nth-child(7)");
		var areaVisualizacion = document.querySelector("section:nth-child(2)>p:nth-child(8)");
		nombre.innerText = "Nombre del archivo: " + archivo.name;
		tamano.innerText = "Tamaño del archivo: " + archivo.size + " bytes"; 
		tipo.innerText = "Tipo del archivo: " + archivo.type;
		ultima.innerText = "Fecha de la última modificación: " + archivo.lastModifiedDate;
		areaVisualizacion.innerText = "";
		var lector = new FileReader();
		lector.onload = function (evento) {
			areaVisualizacion.innerText = lector.result;
		}      
		lector.readAsText(archivo);
	}
}
var archivos = new Archivos();