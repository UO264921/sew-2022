class JQueryFunctions {
    mostrar() {
		$("p").show();
	}
	ocultar() {
		$("p").hide();
    }
	colorea() {
		$("article>section:nth-child(3)>p:nth-child(6)").css({left:0, color:'white',backgroundColor:'#222',padding:'1em'});
	}
	hombre() {
		$("article>section:nth-child(3)>p:nth-child(8)").text("Hombre");
	}
	mujer() {
		$("article>section:nth-child(3)>p:nth-child(8)").text("Mujer");
	}
    otro() {
		$("article>section:nth-child(3)>p:nth-child(8)").text("Otro");
	}
	insertar() {
		$("article>section:nth-child(4)>button").before("<p>Nuevo párrafo</p>");
	}
	eliminar() {
		$("article>section:nth-child(5)>p").remove();
	}
	sumar() {
		var r = 0;
		$("table tr td").each(function() {
            var celda = parseInt($(this).text());
            r += celda;
        });
        $("article>section:nth-child(7)>button").before("<p>Resultado: " + r + "</p>");
	}
	verNombre() {
		alert("Valor del campo Nombre: " + $("article>section:nth-child(3)>p:nth-child(2)>input").val()); 
	}
	verApellidos() {
		alert( "Valor del campo Apellidos: " + $("article>section:nth-child(3)>p:nth-child(3)>input").val());
	}
	recorrer() {
		var lista = [];
		$("*", document.body).each(function() {
			var etiquetaPadre = $(this).parent().get(0).tagName;
			lista.push(" Padre: "  + etiquetaPadre + " Tag elemento: " + $(this).get(0).tagName);
		});
		$("body").append("<footer></footer>")
		$("footer").append("<h2> Recorrido realizado: </h2>");
		lista.forEach(e => {
			$("footer").append("<p>" + e + "</p>");
		});
	}
}
var funciones = new JQueryFunctions();