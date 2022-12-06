<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="Iyan Sanjurjo" />
    <meta name="description" content="Documento del ejercicio 6" />
    <meta name="keywords" content="HTML" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <meta charset="UTF-8" />
	<title>Ejercicio 6</title>
	<link rel="stylesheet" href="Ejercicio6.css"/>
</head>
<body>
	<header>
		<h1>Ejercicio 6</h1>
	</header>
    <section>
        <form action='#' method='post' name='formulario' enctype='multipart/form-data'>
            <h2>Crear Base de Datos</h2>
            <button id='crear' type='submit' name='crear'>Crear Base de datos</button>
            <h2>Crear una tabla</h2>
            <button id='crearTabla' type='submit' name='crearTabla'>Crear tabla PruebasUsabilidad</button>
            <h2>Insertar datos</h2>
            <label for="dni">DNI: </label><input type="text" id="dni" name="dni" placeholder="DNI..."/>
            <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" placeholder="Nombre..."/>
            <label for="apellidos">Apellidos: </label><input type="text" id="inputApellidos" name="inputApellidos" placeholder="Apellidos..."/>
            <label for="email">Email: </label><input type="text"  id="email" name="email" placeholder="Email..."/>
            <label for="telefono">Teléfono: </label><input type="text"  id="telefono" name="telefono" placeholder="Teléfono..."/>
            <label for="edad">Edad: </label><input type="text"  id="edad" name="edad" placeholder="Edad..."/>
            <label for="sexo">Sexo (H|M): </label><input type="text"  id="sexo" name="sexo" placeholder="Sexo..."/>
            <label for="nivel">Nivel informático (0-10): </label><input type="text"  id="nivel" name="nivel" placeholder="Nivel..."/>
            <label for="tiempo">Tiempo en hacer la tarea (seg): </label><input type="text"  id="tiempo" name="tiempo" placeholder="Tiempo..."/>
            <label for="correcto">Tarea correcta: </label><input type="text"  id="correcto" name="correcto" placeholder="Sí o no..."/>
            <label for="comentarios">Comentarios: </label><input type="text" class="bigInput" id="comentarios" name="comentarios" placeholder="Comentarios..."/>
            <label for="propuestas">Propuestas: </label><input type="text" class="bigInput" id="propuestas" name="propuestas" placeholder="Propuestas..."/>
            <label for="valoracion">Valoración de la aplicación (0-10): </label><input type="text"  id="valoracion" name="valoracion" placeholder="Valoración..."/>
            <button id='bInsertar' type='submit' name='bInsertar'>Insertar datos</button>
            <h2>Buscar datos</h2>
            <label for="buscarDni">Realiza una búsqueda por DNI: </label><input type="text" id="buscarDni" name="buscarDni" placeholder="DNI..."/>
            <button id='bBuscar' type='submit' name='bBuscar'>Buscar datos</button>
            <h2>Modificar datos</h2>
            <label for="modificarDni">DNI: </label><input type="text"  id="modificarDni" name="modificarDni" placeholder="DNI..."/>
            <label for="modificarNombre">Nombre: </label><input type="text"  id="modificarNombre" name="modificarNombre" placeholder="Nuevo nombre..."/>
            <label for="modificarApellidos">Apellidos: </label><input type="text"  id="modificarApellidos" name="modificarApellidos" placeholder="Nuevos apellidos..."/>
            <label for="modificarEmail">Email: </label><input type="text"  id="modificarEmail" name="modificarEmail" placeholder="Nuevo e-mail..."/>
            <label for="modificarTelefono">Teléfono: </label><input type="text"  id="modificarTelefono" name="modificarTelefono" placeholder="Nuevo teléfono..."/>
            <label for="modificarEdad">Edad: </label><input type="text"  id="modificarEdad" name="modificarEdad" placeholder="Nueva edad..."/>
            <label for="modificarSexo">Sexo (H|M): </label><input type="text"  id="modificarSexo" name="modificarSexo" placeholder="Nuevo sexo..."/>
            <label for="modificarNivel">Nivel informático (0-10): </label><input type="text"  id="modificarNivel" name="modificarNivel" placeholder="Nuevo nivel..."/>
            <label for="modificarTiempo">Tiempo en hacer la tarea (seg): </label><input type="text"  id="modificarTiempo" name="modificarTiempo" placeholder="Nuevo tiempo..."/>
            <label for="modificarCorrecto">Tarea correcta: </label><input type="text"  id="modificarCorrecto" name="modificarCorrecto" placeholder="Sí o no..."/>
            <label for="modificarComentario">Comentarios: </label><input type="text" class="bigInput" id="modificarComentario" name="modificarComentario" placeholder="Nuevos comentarios..."/>
            <label for="modificarPropuestas">Propuestas: </label><input type="text" class="bigInput" id="modificarPropuestas" name="modificarPropuestas" placeholder="Nuevas propuestas..."/>
            <label for="modificarValoracion">Valoración de la aplicación (0-10): </label><input type="text"  id="modificarValoracion" name="modificarValoracion" placeholder="Nueva valoración..."/>
            <button id='bModificar' type='submit' name='bModificar'>Modificar datos</button>
            <h2>Eliminar datos</h2>
            <label for="eliminarDni">DNI: </label><input type="text"  id="eliminarDni" name="eliminarDni" placeholder="DNI..."/>
            <button id='bEliminar' type='submit' name='bEliminar'>Eliminar datos</button>
            <h2>Generar informe</h2>
            <button id='bInforme' type='submit' name='bInforme'>Generar informe</button>
            <h2>Cargar datos desde un archivo CSV en una tabla de la Base de Datos</h2>
            <label for='archivo'>Selecciona un archivo: </label><input type='file' id='archivo' name='archivo'/>
            <button id='bCargar' type='submit' name='bCargar'>Cargar datos</button>
            <h2>Exportar datos a un archivo en formato CSV los datos desde una tabla de la Base de Datos</h2>
            <button id='bExportar' type='submit' name='bExportar'>Exportar datos</button>
        </form>
        <h2>Resultados obtenidos</h2>
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
				$this->nombreDB = "BD";
				
				if($this->db->connect_error) {
					exit ("<p>Error de conexión: " . $this->db->connect_error . "</p>");  
				} else {echo "<p>Conexión establecida ---> " . $this->db->host_info . "</p>";}
			}

			public function crearBD(){
				$str = "CREATE DATABASE IF NOT EXISTS BD COLLATE utf8_spanish_ci";
				if($this->db->query($str) === TRUE){
					echo "<p>--- Se ha creado la base de datos BD ---</p>";
				} else { 
					echo "<p>Error en la creación de la Base de Datos 'BD' " . $this->db->error . "</p>";
					exit();
				}   
			}
			
			public function crearTabla() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
			
				$crearTabla = "CREATE TABLE IF NOT EXISTS PruebasUsabilidad (
						codigo VARCHAR(9) NOT NULL, 
                        nombre VARCHAR(32) NOT NULL,
                        apellidos VARCHAR(255) NOT NULL, 
                        email VARCHAR(255) NOT NULL, 
						telefono DOUBLE NOT NULL,
						edad INT NOT NULL,
						sexo VARCHAR(1) NOT NULL,
						nivel INT NOT NULL,
						tiempo DOUBLE NOT NULL,
						correcto VARCHAR(9) NOT NULL,
						comentarios VARCHAR(255) NOT NULL,
						propuestas VARCHAR(255) NOT NULL,
						valoracion INT NOT NULL,
						
                        PRIMARY KEY (codigo),
						CHECK (nivel>=0 && nivel<=10),
						CHECK (valoracion>=0 && valoracion<=10))";
                      
				if($this->db->query($crearTabla) === TRUE){
					echo "<p>--- Se ha creado la tabla PruebasUsabilidad ---</p>";
				} else { 
					echo "<p>Error en la creación de la tabla PruebasUsabilidad ". $this->db->error . "</p>";
					exit();
				}
				$this->db->close(); 
			}
			
			public function insertarDatos() {
				if ($_POST["dni"]=="" || $_POST["nombre"]=="" || $_POST["inputApellidos"]=="" || $_POST["email"]=="" ||
					$_POST["telefono"]=="" || $_POST["edad"]=="" || $_POST["sexo"]=="" || $_POST["nivel"]=="" || $_POST["tiempo"]=="" ||
					$_POST["correcto"]=="" || $_POST["valoracion"]=="" || $_POST["propuestas"]=="" || $_POST["comentarios"]=="") {
						echo "<p>Debes rellenar todos los campos</p>";
						return;
				}
				if (strcasecmp($_POST["sexo"],"h")!=0 && strcasecmp($_POST["sexo"],"m")!=0) {
						echo "<p>El sexo tiene que ser H o M</p>";
						return;
				}
				if (strcasecmp($_POST["correcto"],"sí")!=0 && strcasecmp($_POST["correcto"],"si")!=0 && strcasecmp($_POST["correcto"],"no")!=0) {
						echo "<p>La respuesta debe ser sí o no</p>";
						return;
				}
				
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}

				try {
					$query = $this->db->prepare("INSERT INTO PruebasUsabilidad (codigo,nombre,apellidos,email,telefono,edad,sexo,nivel,tiempo,correcto,comentarios,propuestas,valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$query->bind_param('ssssdisidsssi', 
						$_POST["dni"],
						$_POST["nombre"],
						$_POST["inputApellidos"],
						$_POST["email"],
						$_POST["telefono"],
						$_POST["edad"],
						$_POST["sexo"],
						$_POST["nivel"],
						$_POST["tiempo"],
						$_POST["correcto"],
						$_POST["comentarios"],
						$_POST["propuestas"],
						$_POST["valoracion"]);  
					
					$query->execute();
					if ($query->affected_rows == -1) echo "<p>Error en la inserción de los datos</p>";
					else echo "<p>--- Se han insertado los datos de forma correcta ---</p>";
					$query->close();
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
			
			public function buscar() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}
				
				try {
					$query = $this->db->prepare("SELECT * FROM PruebasUsabilidad WHERE codigo = ?");   
					$query->bind_param('s', $_POST["buscarDni"]);   	
					$query->execute();
				
					$resultado = $query->get_result();
					if ($resultado->fetch_assoc()!=NULL) {
						echo "<p>Resultados para el DNI dado: </p>";
						$resultado->data_seek(0);
						$fila = $resultado->fetch_assoc();
						echo "<p>DNI = " . $fila['codigo'] . "</p>";
						echo "<p>nombre = " . $fila['nombre'] . "</p>";
						echo "<p>apellidos = " . $fila['apellidos'] . "</p>";
						echo "<p>email = ". $fila['email'] . "</p>";
						echo "<p>telefono = ". $fila['telefono'] . "</p>";
						echo "<p>edad = ". $fila['edad'] . "</p>";
						echo "<p>sexo = ". $fila['sexo'] . "</p>";
						echo "<p>nivel = ". $fila['nivel'] . "</p>";
						echo "<p>tiempo = ". $fila['tiempo'] . "</p>";
						echo "<p>correcto = ". $fila['correcto'] . "</p>";
						echo "<p>comentarios = ". $fila['comentarios'] . "</p>";
						echo "<p>propuestas = ". $fila['propuestas'] . "</p>";
						echo "<p>valoración = ". $fila['valoracion'] . "</p>";       
					} else {echo "<p>No hay resultados para el DNI dado.</p>";}
					$query->close();
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
			
			public function modificar() {
				if ($_POST["modificarSexo"] != "" && strcasecmp($_POST["modificarSexo"],"h")!=0 && strcasecmp($_POST["modificarSexo"],"m")!=0) {
						echo "<p>El sexo debe ser H o M</p>";
						return;
				}
				if ($_POST["modificarCorrecto"] != "" && strcasecmp($_POST["modificarCorrecto"],"sí")!=0 && strcasecmp($_POST["modificarCorrecto"],"si")!=0 && strcasecmp($_POST["modificarCorrecto"],"no")!=0) {
						echo "<p>La respuesta debe ser sí o no.</p>";
						return;
				}
				
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}
				try {
					$query = $this->db->prepare("SELECT * FROM PruebasUsabilidad WHERE codigo = ?");   
					$query->bind_param('s', $_POST["modificarDni"]);   	
					$query->execute();
					$resultado = $query->get_result();
					$query->close();
					if ($resultado->fetch_assoc()!=NULL) {
						$resultado->data_seek(0);
						$fila = $resultado->fetch_assoc();
						$dni = $fila['codigo'];
						if ($_POST['modificarNombre'] == "") { $nombre = $fila['nombre']; }
						else { $nombre = $_POST['modificarNombre']; }
						if ($_POST['modificarApellidos'] == "") { $apellidos = $fila['apellidos']; }
						else { $apellidos = $_POST['modificarApellidos']; }
						if ($_POST['modificarEmail'] == "") { $email = $fila['email']; }
						else { $email = $_POST['modificarEmail']; }
						if ($_POST['modificarTelefono'] == "") { $telefono = $fila['telefono']; }
						else { $telefono = $_POST['modificarTelefono']; }
						if ($_POST['modificarEdad'] == "") { $edad = $fila['edad']; }
						else { $edad = $_POST['modificarEdad']; }
						if ($_POST['modificarSexo'] == "") { $sexo = $fila['sexo']; }
						else { $sexo = $_POST['modificarSexo']; }
						if ($_POST['modificarNivel'] == "") { $nivel = $fila['nivel']; }
						else { $nivel = $_POST['modificarNivel']; }
						if ($_POST['modificarTiempo'] == "") { $tiempo = $fila['tiempo']; }
						else { $tiempo = $_POST['modificarTiempo']; }
						if ($_POST['modificarCorrecto'] == "") { $correcto = $fila['correcto']; }
						else { $correcto = $_POST['modificarCorrecto']; }
						if ($_POST['modificarComentario'] == "") { $comentarios = $fila['comentarios']; }
						else { $comentarios = $_POST['modificarComentario']; }
						if ($_POST['modificarPropuestas'] == "") { $propuestas = $fila['propuestas']; }
						else { $propuestas = $_POST['modificarPropuestas']; }
						if ($_POST['modificarValoracion'] == "") { $valoracion = $fila['valoracion']; }
						else { $valoracion = $_POST['modificarValoracion']; }
					
					
						$query = $this->db->prepare("UPDATE PruebasUsabilidad SET nombre=?,apellidos=?,email=?,telefono=?,edad=?,
							sexo=?,nivel=?,tiempo=?,correcto=?,comentarios=?,propuestas=?,valoracion=? WHERE codigo=?");
						
						$query->bind_param('sssdisidsssis', 
						$nombre,
						$apellidos,
						$email,
						$telefono,
						$edad,
						$sexo,
						$nivel,
						$tiempo,
						$correcto,
						$comentarios,
						$propuestas,
						$valoracion,
						$dni);  
						
						$query->execute();
						if ($query->affected_rows == -1) echo "<p>No se han podido modificar los datos de forma correcta</p>";
						else echo "<p>--- Se han modificado los datos de forma correcta ---</p>";
						$query->close();
					} else {echo "<p>No se ha encontrado el usuario con el DNI dado.</p>";}
				} catch (Error $e) {
					echo "<p>ERROR: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
			
			public function eliminar() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}
				
				try {
					$query = $this->db->prepare("SELECT * FROM PruebasUsabilidad WHERE codigo = ?");   
					$query->bind_param('s', $_POST["eliminarDni"]);   	
					$query->execute();
					$resultado = $query->get_result();
					$query->close();
					if ($resultado->fetch_assoc()!=NULL) {
						echo "<p>Se van a eliminar los datos siguientes: </p>";
						$resultado->data_seek(0);
						$fila = $resultado->fetch_assoc();
						echo "<p>DNI = " . $fila['codigo'] . "</p>";
						echo "<p>nombre = " . $fila['nombre'] . "</p>";
						echo "<p>apellidos = " . $fila['apellidos'] . "</p>";
						echo "<p>email = ". $fila['email'] . "</p>";
						echo "<p>telefono = ". $fila['telefono'] . "</p>";
						echo "<p>edad = ". $fila['edad'] . "</p>";
						echo "<p>sexo = ". $fila['sexo'] . "</p>";
						echo "<p>nivel = ". $fila['nivel'] . "</p>";
						echo "<p>tiempo = ". $fila['tiempo'] . "</p>";
						echo "<p>correcto = ". $fila['correcto'] . "</p>";
						echo "<p>comentarios = ". $fila['comentarios'] . "</p>";
						echo "<p>propuestas = ". $fila['propuestas'] . "</p>";
						echo "<p>valoración = ". $fila['valoracion'] . "</p>";

						$query = $this->db->prepare("DELETE FROM PruebasUsabilidad WHERE codigo = ?");   
						$query->bind_param('s', $_POST["eliminarDni"]);   	
						$query->execute();
						$query->close();
						
						echo "<p>Se han borrado los datos de forma correcta</p>";
					} else { echo "<p>No se han encontrado datos con el DNI dado.</p>"; }
				} catch (Error $e) {
					echo "<p>ERROR: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
			
			public function crearInforme() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}
					
				try {
					$query = $this->db->prepare("SELECT * FROM PruebasUsabilidad");   
					$query->execute();
					$resultado = $query->get_result();
					if ($resultado->fetch_assoc()!=NULL) {
						echo "<p>Informe de la tabla 'PruebasUsabilidad':</p>";
						$resultado->data_seek(0);
						$muestras = 0;
						$edadMedia = 0;
						$hombres = 0;
						$mujeres = 0;
						$pericia = 0;
						$tiempo = 0;
						$correcto = 0;
						$puntuacion = 0;
						while($fila = $resultado->fetch_assoc()) {
							$muestras++;
							$edadMedia += $fila["edad"];
							if (strcasecmp($fila["sexo"],"h") == 0) $hombres++;
							if (strcasecmp($fila["sexo"],"m") == 0) $mujeres++;
							$pericia += $fila["nivel"];
							$tiempo += $fila["tiempo"];
							if ($fila["correcto"] == "sí" || $fila["correcto"] == "si") $correcto++;
							$puntuacion += $fila["valoracion"];
						}
						echo "<p>Edad media: " . $edadMedia/$muestras . "</p>";
						echo "<p>Porcentaje de hombres: " . $hombres/$muestras*100 . "% Porcentaje de mujeres: " . $mujeres/$muestras*100 . "%</p>";
						echo "<p>Media del nivel informático: " . $pericia/$muestras . "</p>";
						echo "<p>Tiempo medio para hacer la tarea = ". $tiempo/$muestras . "</p>";
						echo "<p>% Usuarios que realizan la tarea correctamente = ". $correcto/$muestras*100 . "%</p>";
						echo "<p>Media de la calificación de la aplicación = ". $puntuacion/$muestras . "</p>"; 
					} else {echo "<p>No se han encontrado datos en la tabla</p>";}
					$query->close();
				} catch (Error $e) {
					echo "<p>ERROR: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
			
			public function importarDatos() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}

				try {
					if (!(isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK)) { 
						echo "<p>Debes seleccionar un archivo antes de cargar los datos.</p>"; 
						return;
					}
					if ($_FILES['archivo']['type'] != 'text/csv') { 
						echo "<p>El formato del archivo es inválido.</p>"; 
						return;
					}
					$archivo = fopen($_FILES['archivo']['tmp_name'],"r"); 
					$first = true;
					while(($datos=fgetcsv($archivo, 1000, ";")) !== FALSE) {		
						if ($first) { $first = false; continue; }
						$query = $this->db->prepare("INSERT INTO PruebasUsabilidad (codigo,nombre,apellidos,email,telefono,edad,sexo,nivel,tiempo,correcto,comentarios,propuestas,valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$query->bind_param('ssssdisidsssi', 
						$datos[0],
						$datos[1],
						$datos[2],
						$datos[3],
						$datos[4],
						$datos[5],
						$datos[6],
						$datos[7],
						$datos[8],
						$datos[9],
						$datos[10],
						$datos[11],
						$datos[12]);
					
						$query->execute();
						$query->close();
					}
					fclose($archivo);
					echo "<p>--- Se ha realizado la importación de forma correcta ---</p>";
				
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
				$this->db->close();
			}
			
			public function exportarDatos() {
				$this->db = new mysqli($this->servername,$this->username,$this->password,$this->nombreDB);
				if($this->db->connect_error) {
					exit ("<p>Error de conexión:" . $this->db->connect_error . "</p>");  
				} else {echo "<p>--- Se ha establecido la conexión ---</p>";}
				
				try {
					$query = $this->db->prepare("SELECT * FROM PruebasUsabilidad");    	
					$query->execute();
					$resultado = $query->get_result();
					$query->close();
					$this->db->close();
				
					$archivo = fopen("pruebasUsabilidad.csv","w"); 
					$campos = array('Codigo (DNI)', 'Nombre', 'Apellidos', 'Email', 'Telefono', 'Edad', 'Sexo', 'Nivel', 'Tiempo', 'Correcto', 'Comentarios', 'Propuestas', 'Valoracion');
					fputcsv($archivo, $campos, ";");
					if ($resultado->fetch_assoc()!=NULL) {
						$resultado->data_seek(0);
						while($fila = $resultado->fetch_assoc()) {
							$fila = array($fila['codigo'],$fila['nombre'],$fila['apellidos'],$fila['email'],$fila['telefono'], 
								$fila['edad'],$fila['sexo'],$fila['nivel'],$fila['tiempo'],$fila['correcto'], 
								$fila['comentarios'],$fila['propuestas'],$fila['valoracion']);
							fputcsv($archivo, $fila, ";");
						}
					}
					fclose($archivo);
					echo "<p>--- Se han exportado los datos de forma correcta ---</p>";
				} catch (Error $e) {
					echo "<p>Error: " . $e->getMessage() . "</p>";
				}
			}
		}
		$baseDatos = new BaseDatos();
		if (count($_POST)>0) {
			if(isset($_POST['crear'])) $baseDatos->crearBD();
			if(isset($_POST['crearTabla'])) $baseDatos->crearTabla();
			if(isset($_POST['bInsertar'])) $baseDatos->insertarDatos();
			if(isset($_POST['bBuscar'])) $baseDatos->buscar();
			if(isset($_POST['bModificar'])) $baseDatos->modificar();
			if(isset($_POST['bEliminar'])) $baseDatos->eliminar();
			if(isset($_POST['bInforme'])) $baseDatos->crearInforme();
			if(isset($_POST['bCargar'])) $baseDatos->importarDatos();
			if(isset($_POST['bExportar'])) $baseDatos->exportarDatos();
		}
	?>
	</body>
</html>