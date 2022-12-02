class Meteorologia {
	constructor(){
		this.apikey = "c466e9dc4977aa2024fc0b588cbfe164";
		this.tipo = "&mode=xml";
		this.unidades = "&units=metric";
		this.idioma = "&lang=es";
	}
	cargarDatos(){
		$.ajax({
			dataType: "xml",
			url: this.url,
			method: 'GET',
			success: function(datos){

				$("h5").text((new XMLSerializer()).serializeToString(datos));
				var descripcion = $('weather',datos).attr("value");
				var ciudad = $('city',datos).attr("name");
				var temperatura = $('temperature',datos).attr("value");
				var humedad = $('humidity',datos).attr("value");
				var humedadUnit = $('humidity',datos).attr("unit");
				var presion = $('pressure',datos).attr("value");
				var presionUnit = $('pressure',datos).attr("unit");
				var velocidadViento = $('speed',datos).attr("value");
				var direccionViento = $('direction',datos).attr("value");
				var nubosidad = $('clouds',datos).attr("value");
				var visibilidad = $('visibility',datos).attr("value");
				var icono = "https://openweathermap.org/img/w/" + $('weather',datos).attr("icon") + ".png";
                    
				var stringDatos =  "<ul><li>Ciudad: " + ciudad + "</li>";
					stringDatos += "<li>Descripción: " + descripcion + "</li>";
					stringDatos += "<li>Temperatura: " + temperatura + " grados Celsius</li>";
					stringDatos += "<li>Humedad: " + humedad + " " + humedadUnit + "</li>";
					stringDatos += "<li>Presión: " + presion + " " + presionUnit + "</li>";
					stringDatos += "<li>Velocidad del viento: " + velocidadViento + " metros/segundo</li>";
					stringDatos += "<li>Dirección del viento: " + direccionViento + " grados</li>";
					stringDatos += "<li>Nubosidad: " + nubosidad + "</li>";
					stringDatos += "<li>Visibilidad: " + visibilidad + " metros</li></ul>";
				$("p").append(stringDatos);       
				$("<img>").attr("src",icono).appendTo("article");				
			},
			error:function(){
				$("h3").html("No se pudo obtener el XML"); 
				$("article").remove();
				$("h4").remove();
				$("p").remove();
			}
		});
	}
	createSection(tipoElemento, texto){
		var elemento = document.createElement(tipoElemento); 
		elemento.innerHTML = texto;
		$("section").append(elemento);
	}
	verMadrid(){
		$("h3").remove();
		$("article").remove();
		$("h4").remove();
		this.ciudad = "Madrid";
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + this.tipo + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡XML Correcto!"
		this.createSection("h3","Datos de Madrid"); 
		this.createSection("article","");
		this.createSection("h4","Datos");
		this.createSection("p","");
		this.cargarDatos();
	}
	verBarcelona(){
		$("h3").remove();
		$("article").remove();
		$("h4").remove();
		$("p").remove();
		this.ciudad = "Barcelona";
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + this.tipo + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡XML Correcto!"
		this.createSection("h3","Datos de Barcelona");  
		this.createSection("article","");
		this.createSection("h4","Datos");
		this.createSection("p","");
		this.cargarDatos();
	}
	verOviedo(){
		$("h3").remove();
		$("article").remove();
		$("h4").remove();
		$("p").remove();
		this.ciudad = "Oviedo";
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + this.tipo + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡XML Correcto!"
		this.createSection("h3","Datos de Oviedo"); 
		this.createSection("article","");
		this.createSection("h4","Datos");
		this.createSection("p","");
		this.cargarDatos();
	}
    verGijon(){
		$("h3").remove();
		$("article").remove();
		$("h4").remove();
		$("p").remove();
		this.ciudad = "Gijon";
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + this.tipo + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡XML Correcto!"
		this.createSection("h3","Datos de Gijon"); 
		this.createSection("article","");
		this.createSection("h4","Datos");
		this.createSection("p","");
		this.cargarDatos();
	}
    verSevilla(){
		$("h3").remove();
		$("article").remove();
		$("h4").remove();
		$("p").remove();
		this.ciudad = "Sevilla";
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + this.tipo + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡XML Correcto!"
		this.createSection("h3","Datos de Sevilla"); 
		this.createSection("article","");
		this.createSection("h4","Datos");
		this.createSection("p","");
		this.cargarDatos();
	}
}
var meteorologia = new Meteorologia();