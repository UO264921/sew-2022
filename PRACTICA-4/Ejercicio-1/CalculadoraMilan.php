<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="Iyan Sanjurjo" />
    <meta name="description" content="Documento de la Calculadora Milan" />
    <meta name="keywords" content="HTML" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <meta charset="UTF-8" />
	<title>Calculadora Milan</title>
	<link rel="stylesheet" href="CalculadoraMilan.css"/>
</head>
<body>
	<header>
		<h1>Calculadora Milan</h1> 
	</header>
	<?php
		session_start();
		class CalculadoraMilan {
			private $pantalla;
			private $memoria;
			
			public function __construct(){
				$this->pantalla = "";
				$this->memoria = 0;
			}
			public function getPantalla() {
				return $this->pantalla;
			}
			public function getMemoria() {
				return $this->memoria;
			}
			public function suma() {
				$this->pantalla .= '+';
			}
			public function resta() {
				$this->pantalla .= '-';
			}
			public function multiplicacion() {
				$this->pantalla .= '*';
			}
			public function division() {
				$this->pantalla .= '/';
			}
			public function masMenos() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						$_SESSION['sessionPantalla'] = eval("return -1*($expresion) ;"); 
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function raiz() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						$_SESSION['sessionPantalla'] = sqrt(eval("return $expresion ;")); 
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function modulo() {
				$this->pantalla .= '%';
			}
			public function punto() {
				$this->pantalla .= '.';
			}
			public function digitos($digito) {
				$this->pantalla .= $digito;
			}
			public function mrc() {
				if(isset($_SESSION['sessionMemoria'])) {
					$this->pantalla = $_SESSION['sessionMemoria'];
				}
			}
			public function mMenos() {
				if(isset($_SESSION['sessionPantalla']) && isset($_SESSION['sessionMemoria'])) {
					$expresion = $_SESSION['sessionMemoria'] . '-' . $_SESSION['sessionPantalla'];
					try {
						$_SESSION['sessionMemoria'] = eval("return $expresion ;"); 
						$expresion = $_SESSION['sessionMemoria'];
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function mMas() {
				if(isset($_SESSION['sessionPantalla']) && isset($_SESSION['sessionMemoria'])) {
					$expresion = $_SESSION['sessionMemoria'] . '+' . $_SESSION['sessionPantalla'];
					try {
						$_SESSION['sessionMemoria'] = eval("return $expresion ;"); 
						$expresion = $_SESSION['sessionMemoria'];
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function borrar() {
				unset($_SESSION['sessionPantalla']);
			}
			public function igual() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						$_SESSION['sessionPantalla'] = eval("return $expresion ;"); 
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
		}
	
		$calculadoraMilan = new CalculadoraMilan();
		$pantalla = "";
		if (count($_POST)>0) {
			if(isset($_POST['mrc'])) $calculadoraMilan->mrc();
			if(isset($_POST['m-'])) $calculadoraMilan->mMenos();
			if(isset($_POST['m+'])) $calculadoraMilan->mMas();
			if(isset($_POST['/'])) $calculadoraMilan->division();
			if(isset($_POST['raiz'])) $calculadoraMilan->raiz();
			if(isset($_POST['7'])) $calculadoraMilan->digitos(7);
			if(isset($_POST['8'])) $calculadoraMilan->digitos(8);
			if(isset($_POST['9'])) $calculadoraMilan->digitos(9);
			if(isset($_POST['*'])) $calculadoraMilan->multiplicacion();
			if(isset($_POST['mod'])) $calculadoraMilan->modulo();
			if(isset($_POST['4'])) $calculadoraMilan->digitos(4);
			if(isset($_POST['5'])) $calculadoraMilan->digitos(5);
			if(isset($_POST['6'])) $calculadoraMilan->digitos(6);
			if(isset($_POST['-'])) $calculadoraMilan->resta();
			if(isset($_POST['masmenos'])) $calculadoraMilan->masMenos();
			if(isset($_POST['1'])) $calculadoraMilan->digitos(1);
			if(isset($_POST['2'])) $calculadoraMilan->digitos(2);
			if(isset($_POST['3'])) $calculadoraMilan->digitos(3);
			if(isset($_POST['+'])) $calculadoraMilan->suma();
			
			if(isset($_POST['0'])) $calculadoraMilan->digitos(0);
			if(isset($_POST['punto'])) $calculadoraMilan->punto();
			if(isset($_POST['C'])) $calculadoraMilan->borrar();
			if(isset($_POST['='])) $calculadoraMilan->igual();
        
			if(isset($_SESSION['sessionPantalla'])) {
				$_SESSION['sessionPantalla'] .= $calculadoraMilan->getPantalla();
			} else {
				$_SESSION['sessionPantalla'] = "";
				$_SESSION['sessionPantalla'] .= $calculadoraMilan->getPantalla();
			}
			if(!isset($_SESSION['sessionMemoria'])) {
				$_SESSION['sessionMemoria'] = 0;
				$_SESSION['sessionMemoria'] .= $calculadoraMilan->getMemoria();
			} 
			$pantalla = $_SESSION['sessionPantalla'];
		}
	
		echo "
		<form action='#' method='post' name='calculadora'>
		<section>
			<h2>Calculadora</h2>
			<label for='pantalla'>Salida</label>
			<input title='pantalla' name='pantalla' id = 'pantalla' type='text' value='$pantalla' readonly />
			<article>
				<h2>Milán</h2>
				<input type='submit' name='mrc' value='mrc' onClick = 'calculadoraMilan.mrc()'>
				<input type='submit' name='m-' value='m-' onClick = 'calculadoraMilan.mMenos()'>
				<input type='submit' name='m+' value='m+' onClick = 'calculadoraMilan.mMas()'>
				<input type='submit' name='/' value='/' onClick = 'calculadoraMilan.division()'>
				<input type='submit' name='mod' value='%' onClick = 'calculadoraMilan.modulo()'>
				<input type='submit' name='masmenos' value='+-' onClick = 'calculadoraMilan.masmenos()'>
				<input type='submit' name='raiz' value='&#8730;' onClick = 'calculadoraMilan.raiz()'>
				<input type='submit' name='*' value='*' onClick = 'calculadoraMilan.multiplicacion()'>
				<input type='submit' name='7' value='7' onClick = 'calculadoraMilan.digitos('7')'>
				<input type='submit' name='8' value='8' onClick = 'calculadoraMilan.digitos('8')'>
				<input type='submit' name='9' value='9' onClick = 'calculadoraMilan.digitos('9')'>
				<input type='submit' name='-' value='-' onClick = 'calculadoraMilan.resta()'>
				<input type='submit' name='4' value='4' onClick = 'calculadoraMilan.digitos('4')'>
				<input type='submit' name='5' value='5' onClick = 'calculadoraMilan.digitos('5')'>
				<input type='submit' name='6' value='6' onClick = 'calculadoraMilan.digitos('6')'>
				<input type='submit' name='+' value='+' onClick = 'calculadoraMilan.suma()'>
				<input type='submit' name='1' value='1' onClick = 'calculadoraMilan.digitos('1')'>
				<input type='submit' name='2' value='2' onClick = 'calculadoraMilan.digitos('2')'>
				<input type='submit' name='3' value='3' onClick = 'calculadoraMilan.digitos('3')'>
				<input type='submit' name='=' value='=' onClick = 'calculadoraMilan.igual()'>	
				<input type='submit' name='punto' value='.' onClick = 'calculadoraMilan.punto()'>
				<input type='submit' name='0' value='0' onClick = 'calculadoraMilan.digitos('0')'>
				<input type='submit' name='C' value='C' onClick = 'calculadoraMilan.borrar()'>
			</article>
		</section>
		</form>
		"
	?>
</body>
</html>