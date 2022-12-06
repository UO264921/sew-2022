<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="Iyan Sanjurjo" />
    <meta name="description" content="Documento de la Calculadora RPN" />
    <meta name="keywords" content="HTML" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <meta charset="UTF-8" />
	<title>Calculadora RPN</title>
	<link rel="stylesheet" href="CalculadoraRPN.css"/>
</head>
<body>
	<header>
		<h1>Calculadora RPN</h1> 
	</header>
	<?php
		// iniciar SESSION
		session_start();
		
		class CalculadoraRPN {
			private $resultado;
			private $memoria;
			
			public function __construct() {
				$this->resultado = "";
				$this->memoria = 0;
			}
			public function getResultado() {
				return $this->resultado;
			}
			public function getMemoria() {
				return $this->memoria;
			}
			public function getPila() {
				$stringPila = "";
				foreach((array)$_SESSION['sessionPila'] as $elemento) {
					$stringPila .= $elemento . " ";
				}
				return $stringPila;
			}
			public function esValido($result) {
				if (!empty($result) && stripos($result,'undefined') === false && stripos($result,'NaN') === false && stripos($result,'error') === false) {
					return true;
				}
				return false;
			}
			public function apilar() {
				$elemento = $_SESSION['sessionResultado'];
				unset($_SESSION['sessionResultado']);
				if ($this->esValido($elemento)) {
					array_push($_SESSION['sessionPila'], $elemento);
				}
			}
			public function desapilar() {
				unset($_SESSION['sessionResultado']);
				if (!empty($_SESSION['sessionPila'])) {
					$this->resultado = array_pop($_SESSION['sessionPila']);
				}
			}
			public function seno() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = sin(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function coseno() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = cos(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function tangente() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = tan(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function cuadrado() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = pow(array_pop($_SESSION['sessionPila']),2);
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function potencia() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$op2 = array_pop($_SESSION['sessionPila']);
						$op1 = array_pop($_SESSION['sessionPila']);
						$_SESSION['sessionResultado'] = pow($op1,$op2);
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function cosecante() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = 1/sin(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function secante() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = 1/cos(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function cotangente() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = 1/tan(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function raiz() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = sqrt(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function exponencial() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$_SESSION['sessionResultado'] = exp(array_pop($_SESSION['sessionPila']));
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function borrarTodo() {
				unset($_SESSION['sessionPila']);
				unset($_SESSION['sessionResultado']);
			}
			public function borrarDigito() {
				$expresion = $_SESSION['sessionResultado'];
				$_SESSION['sessionResultado'] = substr($expresion,0,strlen($expresion)-1);
			}
			public function division() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$op2 = array_pop($_SESSION['sessionPila']);
						$op1 = array_pop($_SESSION['sessionPila']);
						$_SESSION['sessionResultado'] = $op1/$op2;
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function digitos($digito) {
				$this->resultado .= $digito;
			}
			public function multiplicacion() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$op2 = array_pop($_SESSION['sessionPila']);
						$op1 = array_pop($_SESSION['sessionPila']);
						$_SESSION['sessionResultado'] = $op1*$op2;
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function resta() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$op2 = array_pop($_SESSION['sessionPila']);
						$op1 = array_pop($_SESSION['sessionPila']);
						$_SESSION['sessionResultado'] = $op1-$op2;
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function suma() {
				if (isset($_SESSION['sessionPila']) && !empty($_SESSION['sessionPila'])) {
					try {
						$op2 = array_pop($_SESSION['sessionPila']);
						$op1 = array_pop($_SESSION['sessionPila']);
						$_SESSION['sessionResultado'] = $op1+$op2;
						$this->apilar();
					} catch (Exception $e) {
						$_SESSION['sessionResultado'] = "Error: " .$e->getMessage();
					}
				}
			}
			public function punto() {
				$this->resultado .= '.';
			}
		}
		
		$calculadoraRPN = new CalculadoraRPN();
		$miPila = "";
		$miResultado = "";
		if (count($_POST)>0) {
			if(isset($_POST['seno'])) $calculadoraRPN->seno();
			if(isset($_POST['coseno'])) $calculadoraRPN->coseno();
			if(isset($_POST['tangente'])) $calculadoraRPN->tangente();
			if(isset($_POST['cuadrado'])) $calculadoraRPN->cuadrado();
			if(isset($_POST['potencia'])) $calculadoraRPN->potencia();
			if(isset($_POST['cosecante'])) $calculadoraRPN->cosecante();
			if(isset($_POST['secante'])) $calculadoraRPN->secante();
			if(isset($_POST['cotangente'])) $calculadoraRPN->cotangente();
			if(isset($_POST['raiz'])) $calculadoraRPN->raiz();
			if(isset($_POST['exponencial'])) $calculadoraRPN->exponencial();
			if(isset($_POST['desapilar'])) $calculadoraRPN->desapilar();
			if(isset($_POST['C'])) $calculadoraRPN->borrarTodo();
			if(isset($_POST['borrar'])) $calculadoraRPN->borrarDigito();
			if(isset($_POST['/'])) $calculadoraRPN->division();
			if(isset($_POST['7'])) $calculadoraRPN->digitos(7);
			if(isset($_POST['8'])) $calculadoraRPN->digitos(8);
			if(isset($_POST['9'])) $calculadoraRPN->digitos(9);
			if(isset($_POST['*'])) $calculadoraRPN->multiplicacion();
			if(isset($_POST['4'])) $calculadoraRPN->digitos(4);
			if(isset($_POST['5'])) $calculadoraRPN->digitos(5);
			if(isset($_POST['6'])) $calculadoraRPN->digitos(6);
			if(isset($_POST['-'])) $calculadoraRPN->resta();
			if(isset($_POST['1'])) $calculadoraRPN->digitos(1);
			if(isset($_POST['2'])) $calculadoraRPN->digitos(2);
			if(isset($_POST['3'])) $calculadoraRPN->digitos(3);
			if(isset($_POST['+'])) $calculadoraRPN->suma();
			if(isset($_POST['0'])) $calculadoraRPN->digitos(0);
			if(isset($_POST['punto'])) $calculadoraRPN->punto();
			if(isset($_POST['apilar'])) $calculadoraRPN->apilar();

			if(isset($_SESSION['sessionResultado'])) {
				$_SESSION['sessionResultado'] .= $calculadoraRPN->getResultado();
			} else {
				$_SESSION['sessionResultado'] = "";
				$_SESSION['sessionResultado'] .= $calculadoraRPN->getResultado();
			}
			if(!isset($_SESSION['sessionPila'])) {
				$_SESSION['sessionPila'] = array();
			}
			if(!isset($_SESSION['sessionMemoria'])) {
				$_SESSION['sessionMemoria'] = 0;
				$_SESSION['sessionMemoria'] .= $calculadoraRPN->getMemoria();
			} 
			$miPila = $calculadoraRPN->getPila();
			$miResultado = $_SESSION['sessionResultado'];
		}
	
		echo "
		<form action='#' method='post' name='calculadora'>
		<section class='cuerpo'>
			<h2>Calculadora</h2>
			<label for='pila'>PILA</label>
			<input title='pila' type='text' id='pila' value='$miPila' readonly />
			<label for='pantalla'>RESULTADO</label>
			<input title='pantalla' type='text' id='pantalla' value='$miResultado' readonly />
			<article>
				<h2>RPN</h2>
				<input type='submit' name='seno' value='sin' onClick = 'calculadoraRPN.seno()'>
				<input type='submit' name='coseno' value='cos' onClick = 'calculadoraRPN.coseno()'>
				<input type='submit' name='tangente' value='tan' onClick = 'calculadoraRPN.tangente()'>
				<input type='submit' name='cuadrado' value='x&#178;' onClick = 'calculadoraRPN.cuadrado()'>
				<input type='submit' name='potencia' value='x&#696;' onClick = 'calculadoraRPN.potencia()'>
				<input type='submit' name='cosecante' value='csc' onClick = 'calculadoraRPN.cosecante()'>
				<input type='submit' name='secante' value='sec' onClick = 'calculadoraRPN.secante()'>
				<input type='submit' name='cotangente' value='cot' onClick = 'calculadoraRPN.cotangente()'>
				<input type='submit' name='raiz' value='&#8730;' onClick = 'calculadoraRPN.raiz()'>
				<input type='submit' name='exponencial' value='Exp' onClick = 'calculadoraRPN.exponencial()'>
				<input type='submit' name='desapilar' value='CE' onClick = 'calculadoraRPN.desapilar()'>
				<input type='submit' name='7' value='7' onClick = 'calculadoraRPN.digitos('7')'>
				<input type='submit' name='8' value='8' onClick = 'calculadoraRPN.digitos('8')'>
				<input type='submit' name='9' value='9' onClick = 'calculadoraRPN.digitos('9')'>
				<input type='submit' name='C' value='C' onClick = 'calculadoraRPN.borrarTodo()'>
				<input type='submit' name='borrar' value='&#129092;' onClick = 'calculadoraRPN.borrarDigito()'>
				<input type='submit' name='4' value='4' onClick = 'calculadoraRPN.digitos('4')'>
				<input type='submit' name='5' value='5' onClick = 'calculadoraRPN.digitos('5')'>
				<input type='submit' name='6' value='6' onClick = 'calculadoraRPN.digitos('6')'>
				<input type='submit' name='/' value='&#247;' onClick = 'calculadoraRPN.division()'>
				<input type='submit' name='*' value='&#10005;' onClick = 'calculadoraRPN.multiplicacion()'>
				<input type='submit' name='1' value='1' onClick = 'calculadoraRPN.digitos('1')'>
				<input type='submit' name='2' value='2' onClick = 'calculadoraRPN.digitos('2')'>
				<input type='submit' name='3' value='3' onClick = 'calculadoraRPN.digitos('3')'>
				<input type='submit' name='fact' value='n!' onClick = 'calculadoraRPN.factorial()'>
				<input type='submit' name='-' value='-' onClick = 'calculadoraRPN.resta()'>	
				<input type='submit' name='+' value='+' onClick = 'calculadoraRPN.suma()'>
				<input type='submit' name='0' value='0' onClick = 'calculadoraRPN.digitos('0')'>
				<input type='submit' name='punto' value='.' onClick = 'calculadoraRPN.punto()'>
				<input type='submit' name='apilar' value='enter' onClick = 'calculadoraRPN.apilar()'>
			</article>
    	</section>
		</form>
		"
	?>
</body>
</html>