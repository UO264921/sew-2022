class JQueryFunctions {
    mostrar() {
		$("p").show();
	}
	ocultar() {
		$("p").hide();
    }
	colorea() {
		$("#pColor").css({left:0, color:'white',backgroundColor:'#222',padding:'1em'});
	}
	hombre() {
		$("#pModificar").text("Hombre");
	}
	mujer() {
		$("#pModificar").text("Mujer");
	}
    otro() {
		$("#pModificar").text("Otro");
	}
	insertar() {
		$("#bInsertar").before("<p>Nuevo párrafo</p>");
	}
	eliminar() {
		$("#pEliminar").remove();
	}
	recorrer() {
		$("*", document.body).each(function() {
			var etiquetaPadre = $(this).parent().get(0).tagName;
			$(this).prepend(document.createTextNode( "Padre: <"  + etiquetaPadre + "> Tag elemento: <" + $(this).get(0).tagName +"> Contenido elemento: "));
		});
	}
	sumar() {
		var r = 0;
		$("table tr td").each(function() {
            var celda = parseInt($(this).text());
            r += celda;
        });
        $("#bSumar").before("<p>Resultado: " + r + "</p>");
		$("#bSumar").attr("disabled","disabled");
	}
	verNombre() {
		alert("Valor del campo Nombre: " + $("#nombre").val()); 
	}
	verApellidos() {
		alert( "Valor del campo Apellidos: " + $("#apellidos").val());
	}
}
var funciones = new JQueryFunctions();