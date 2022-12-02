class BuscadorElectricidad {
	constructor(){
		this.apikey = "ac89e850d0fce1d544cba3aa5f886995";
		this.idioma = "&lang=es";
		this.orden = "&sortBy=publishedAt"; 
        this.url = "https://apidatos.ree.es/es/datos/balance/balance-electrico?start_date=2021-01-01T00:00&end_date=2021-01-31T23:59&time_trunc=day"
	}
	cargarDatos(){
		$.ajax({
			dataType: "json",
			url: this.url,
			method: 'GET',
			success: function(datos) {
				var stringArticulos = "";
				for (var i = 0; i < datos.included[0].attributes.content.length; i+=1) {
					stringArticulos += "<h3>" + datos.included[0].attributes.content[i].type + "</h3>";
					stringArticulos += "<p> Precio del mes indicado: " + datos.included[0].attributes.content[i].attributes.total + " euros. </p>";
				}
				$("article").html(stringArticulos);
			},
			error:function(){
				$("article").html("No se pudo obtener JSON, prueba a introducir una fecha correcta"); 
			}
		});
	}

    buscar(fecha){
        $("h3").remove();
        $("p").remove();
        var f = $("section>input").val().split("-");
        var fecha = f[2] + "-" + f[1] + "-" + f[0];
        this.url = "https://apidatos.ree.es/es/datos/balance/balance-electrico?start_date=" + fecha + "T00:00&end_date=" + fecha + "T23:59&time_trunc=day"
        this.cargarDatos();
    }
}
var buscadorElectricidad = new BuscadorElectricidad();