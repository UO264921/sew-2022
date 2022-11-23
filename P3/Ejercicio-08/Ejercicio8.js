class Meteorologia {
	constructor(){
		this.apikey = "c466e9dc4977aa2024fc0b588cbfe164";
		this.codigoPais = "ES";
		this.unidades = "&units=metric";
		this.idioma = "&lang=es";
	}
	cargarDatos(){
		$.ajax({
			dataType: "json",
			url: this.url,
			method: 'GET',
			success: function(datos){
				var stringDatos = "<ul><li>Ciudad: " + datos.name + "</li>";
                    stringDatos += "<li>Descripción: " + datos.weather[0].description + "</li>";
					stringDatos += "<li>Temperatura: " + datos.main.temp + " C</li>";
					stringDatos += "<li>Presión: " + datos.main.pressure + " mb</li>";
					stringDatos += "<li>Humedad: " + datos.main.humidity + " %</li>";
					stringDatos += "<li>Visibilidad: " + datos.visibility + " m</li>";
                    stringDatos += "<li>Dirección del viento: " + datos.wind.deg + " grados</li>";
					stringDatos += "<li>Velocidad del viento: " + datos.wind.speed + " m/s</li>";
					stringDatos += "<li>Nubosidad: " + datos.clouds.all + " %</li></ul>";
				var img = "https://openweathermap.org/img/w/" + datos.weather[0].icon + ".png";
				$("p").html(stringDatos);
				$("<img>").attr("src", img).appendTo("article");
			},
			error:function(){
				$("h3").html("No se pudo obtener el JSON"); 
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
		$("p").remove();
		this.ciudad = "Madrid";
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡JSON Correcto!"
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
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡JSON Correcto!"
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
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡JSON Correcto!"
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
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡JSON Correcto!"
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
		this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais + this.unidades + this.idioma + "&APPID=" + this.apikey;
		this.correcto = "¡JSON Correcto!"
		this.createSection("h3","Datos de Sevilla"); 
		this.createSection("article","");
		this.createSection("h4","Datos");
		this.createSection("p","");
		this.cargarDatos();
	}
}
var meteorologia = new Meteorologia();