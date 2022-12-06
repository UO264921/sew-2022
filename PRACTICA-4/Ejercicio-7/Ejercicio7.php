<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="Iyan Sanjurjo" />
    <meta name="description" content="Documento del ejercicio 7" />
    <meta name="keywords" content="HTML" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <meta charset="UTF-8" />
	<title>Ejercicio 7</title>
	<link rel="stylesheet" href="Ejercicio7.css"/>
</head>
<body>
	<header>
		<h1>Ejercicio 7: Centro de adopción</h1>
	</header>
    <section>
        <form action='#' method='post' name='formulario' enctype='multipart/form-data'>
			<h2>Búsqueda de animales</h2>
			<label for="buscarEtiqueta">Realiza una búsqueda por etiqueta: </label><input type="text" id="buscarEtiqueta" name="buscarEtiqueta" placeholder="0001..."/>
			<button id='bEtiqueta' type='submit' name='bEtiqueta'>Buscar animal</button>
			<label for="buscarAdopcion">Realiza una búsqueda por DNI del dueño: </label><input type="text" id="buscarAdopcion" name="buscarAdopcion" placeholder="DNI..."/>
			<button id='bAdopcion' type='submit' name='bAdopcion'>Buscar animal</button>
			<label for="buscarCentro">Realiza una búsqueda por ciudad: </label><input type="text" id="buscarCentro" name="buscarCentro" placeholder="Oviedo..."/>
			<button id='bCentro' type='submit' name='bCentro'>Buscar animal</button>
			<h2>Búsqueda de vacunas</h2>
			<label for="buscarVacunas">Realiza una búsqueda de vacunas por etiqueta: </label><input type="text" id="buscarVacunas" name="buscarVacunas" placeholder="0001..."/>
			<button id='bVacunas' type='submit' name='bVacunas'>Buscar vacunas</button>
        </form>
    </section>
	<?php
		class BaseDatos {
			private $username;
			private $password;
			private $servername;
			private $db;
			private $nombreDB;
			
			public function __construct(){
				$this->servername = "localhost";
				$this->username = "DBUSER2022";
				$this->password = "DBPSWD2022";
				$this->db = new mysqli($this->servername,$this->username,$this->password);
				$this->nombreDB = "BD1";
			}
			
			public function buscarEtiqueta() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				}
				try {
					$query = $this->db->prepare("SELECT * FROM animales WHERE Etiqueta = ?");   
					$query->bind_param('s', $_POST["buscarEtiqueta"]);   	
					$query->execute();
				
					$resultado = $query->get_result();
					if ($resultado->fetch_assoc()!=NULL) {
						$resultado->data_seek(0);
						$fila = $resultado->fetch_assoc();
						echo "<section>";
						echo "<h2> Resultados para la etiqueta dada: </h2>";
						echo "<p>Etiqueta = " . $fila['Etiqueta'] . "</p>";
						echo "<p>Tipo de animal = " . $fila['TipoAnimal'] . "</p>";
						echo "<p>Nombre = " . $fila['Nombre'] . "</p>";
						echo "</section>";
					} else {echo "<p>No hay resultados para la etiqueta dada.</p>";}
					$query->close();
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}

			public function buscarAdopcion() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} 
				
				try {
					$query = $this->db->prepare("SELECT DISTINCT an.TipoAnimal, an.Nombre, an.Etiqueta FROM animales an join adopciones a WHERE a.DNI = ? and a.Etiqueta = an.Etiqueta");   
					$query->bind_param('s', $_POST["buscarAdopcion"]);   	
					$query->execute();
				
					$resultado = $query->get_result();
					if ($resultado->fetch_assoc()!=NULL) {
						echo "<section>";
						echo "<h2> Resultados para el DNI dado: </h2>";
						foreach ($resultado as $r){
							echo "<p>Etiqueta = " . $r['Etiqueta'] . "</p>";
							echo "<p>Tipo de animal = " . $r['TipoAnimal'] . "</p>";
							echo "<p>Nombre = " . $r['Nombre'] . "</p>";
						}	
						echo "</section>";		
					} else {echo "<p>No hay resultados para el DNI dado.</p>";}
					$query->close();
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}

			public function buscarPorCentro() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} 
				
				try {
					$query = $this->db->prepare("SELECT DISTINCT a.TipoAnimal, a.Nombre, a.Etiqueta FROM centros c, animalesCentro ac, animales a WHERE c.Ciudad = ? and a.Etiqueta = ac.Etiqueta and c.IDCentro = ac.IDCentro");   
					$query->bind_param('s', $_POST["buscarCentro"]);   	
					$query->execute();
				
					$resultado = $query->get_result();
					if ($resultado->fetch_assoc()!=NULL) {
						echo "<section>";
						echo "<h2> Resultados para la ciudad dada: </h2>";
						foreach ($resultado as $r){
							echo "<p>Etiqueta = " . $r['Etiqueta'] . "</p>";
							echo "<p>Tipo de animal = " . $r['TipoAnimal'] . "</p>";
							echo "<p>Nombre = " . $r['Nombre'] . "</p>";
						}		
						echo "</section>";	
					} else {echo "<p>No hay resultados para la ciudad dada.</p>";}
					$query->close();
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}


			public function buscarVacunas() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} 
				
				try {
					$query = $this->db->prepare("SELECT DISTINCT a.Nombre, v.Vacuna FROM vacunas v join animales a WHERE a.Etiqueta = ? and a.Etiqueta = v.Etiqueta");   
					$query->bind_param('s', $_POST["buscarVacunas"]);   	
					$query->execute();
				
					$resultado = $query->get_result();
					if ($resultado->fetch_assoc()!=NULL) {
						$resultado->data_seek(0);
						$fila = $resultado->fetch_assoc();
						echo "<section>";
						echo "<h2> Resultados para la etiqueta dada: </h2>";
						echo "<p>Nombre = " . $fila['Nombre'] . "</p>";
						foreach ($resultado as $r){
							echo "<p>Vacuna = " . $r['Vacuna'] . "</p>";
						}	
						echo "</section>";	
					} else {echo "<p>No hay resultados para la etiqueta dada.</p>";}
					$query->close();
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
		}

		$baseDatos = new BaseDatos();
		if (count($_POST)>0) {
			if(isset($_POST['bEtiqueta'])) $baseDatos->buscarEtiqueta();
			if(isset($_POST['bAdopcion'])) $baseDatos->buscarAdopcion();
			if(isset($_POST['bCentro'])) $baseDatos->buscarPorCentro();
			if(isset($_POST['bVacunas'])) $baseDatos->buscarVacunas();
		}
	?>
	</body>
</html>