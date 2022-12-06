<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="Iyan Sanjurjo" />
    <meta name="description" content="Documento del ejercicio 4" />
    <meta name="keywords" content="HTML" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <meta charset="UTF-8" />
	<title>Ejercicio 4</title>
	<link rel="stylesheet" href="Ejercicio4.css"/>
</head>
<body>
	<header>
		<h1>Ejercicio 4</h1>
	</header>
    <h2>Buscador de precio del petróleo por día de 2022</h2>
    <form action='#' method='post' name='buscador'>
        <label for='inputBusqueda'>Introduce el año de la forma 2022-MM-DD: </label>
        <input title='inputBusqueda' type='text' id='inputBusqueda' name='inputBusqueda' placeholder='2022-05-12'/>
        <button id='bBuscar' type='submit' name='bBuscar'>Buscar</button>
    </form>
	<?php
		class BuscadorNoticias {
			public function __construct(){
			}
			public function cargarDatos() {
				$datos = file_get_contents($this->url);
				$json = json_decode($datos);
				
				if($json->data->success==false) {
					echo "<section><h3>¡Se ha producido un error, comprueba que el año es 2022!</h3>";
				} else {
                    $source = $json->data;
                    $precio = $source->rates;
                    echo "<section><h3> Datos para la fecha: $source->date </h3>";
                    echo "<p> $precio->EUR euros</p></section>";
				}
			}
			public function buscar() {
				$busqueda = $_REQUEST['inputBusqueda'];
				if (!empty($busqueda)) {
					$this->url = 'https://commodities-api.com/api/'.$busqueda.'?access_key=1z51hezg15vhs4engtu967k1ku5uwrf7v8b4neil8ugbfu9q4k6bhqcas152';
					$this->cargarDatos();
				}
			}
		}
	
		$buscadorNoticias = new BuscadorNoticias();
		if (count($_POST)>0) {
			if(isset($_POST['bBuscar'])) $buscadorNoticias->buscar();
		}
	?>
</body>
</html>