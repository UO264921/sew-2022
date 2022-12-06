<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="Iyan Sanjurjo" />
    <meta name="description" content="Documento de la Calculadora Cientifica" />
    <meta name="keywords" content="HTML" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <meta charset="UTF-8" />
	<title>Calculadora Científica</title>
	<link rel="stylesheet" href="CalculadoraCientifica.css"/>
</head>
<body>
	<header>
		<h1>Calculadora Científica</h1> 
	</header>
	<?php
		session_start();
		class CalculadoraMilan {
			protected $pantalla;
			protected $memoria;
			
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
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = sqrt(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
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
		
		class CalculadoraCientifica extends CalculadoraMilan {
			public function __construct(){
				parent::__construct();
			}
			public function seno() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = sin(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function coseno() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = cos(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function tangente() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = tan(eval("return $expresion ;"));  
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function secante() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = 1/cos(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function cosecante() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = 1/sin(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function cuadrado() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = pow((eval("return $expresion ;")),2); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function potencia() {
				$this->pantalla .= '**';
			}
			public function potenciaDiez() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = pow(10,(eval("return $expresion ;"))); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function logaritmo() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = log10(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function exponencial() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = exp(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
						
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function borrarDigito() {
				$expresion = $_SESSION['sessionPantalla'];
				$_SESSION['sessionPantalla'] = substr($expresion,0,strlen($expresion)-1);
			}
			public function teclaPi() {
				$this->pantalla .= pi();
			}
			public function factorial() {
				if(isset($_SESSION['sessionPantalla'])) {
					$expresion = $_SESSION['sessionPantalla'];
					try {
						if (eval("return $expresion ;")!=null){
							$_SESSION['sessionPantalla'] = $this->factorialR(eval("return $expresion ;")); 
						}
						else{
							$_SESSION['sessionPantalla'] = ""; 
						}
					} catch (Exception $e) {
						$_SESSION['sessionPantalla'] = "Error: " .$e->getMessage();
					} catch(ParseError $p){
						$_SESSION['sessionPantalla'] = "Error: " .$p->getMessage();
					}
				}
			}
			public function factorialR($n) {
				$total = 1; 
				for ($i=1; $i<=$n; $i++) {
					$total = $total * $i; 
				}
				return $total;
			}
			public function parentesisIzquierdo() {
				$this->pantalla .= '(';
			}
			public function parentesisDerecho() {
				$this->pantalla .= ')';
			}
		}

		$calculadoraCientifica = new CalculadoraCientifica();
		$pantalla = "";
		if (count($_POST)>0) {
			if(isset($_POST['mrc'])) $calculadoraCientifica->mrc();
			if(isset($_POST['m-'])) $calculadoraCientifica->mMenos();
			if(isset($_POST['m+'])) $calculadoraCientifica->mMas();
			if(isset($_POST['/'])) $calculadoraCientifica->division();
			if(isset($_POST['seno'])) $calculadoraCientifica->seno();
			if(isset($_POST['coseno'])) $calculadoraCientifica->coseno();
			if(isset($_POST['tangente'])) $calculadoraCientifica->tangente();
			if(isset($_POST['sec'])) $calculadoraCientifica->secante();
			if(isset($_POST['cosec'])) $calculadoraCientifica->cosecante();
			if(isset($_POST['borrar'])) $calculadoraCientifica->borrar();
			if(isset($_POST['bdig'])) $calculadoraCientifica->borrarDigito();
			if(isset($_POST['fact'])) $calculadoraCientifica->factorial();
			if(isset($_POST['raiz'])) $calculadoraCientifica->raiz();
			if(isset($_POST['7'])) $calculadoraCientifica->digitos(7);
			if(isset($_POST['8'])) $calculadoraCientifica->digitos(8);
			if(isset($_POST['9'])) $calculadoraCientifica->digitos(9);
			if(isset($_POST['*'])) $calculadoraCientifica->multiplicacion();
			if(isset($_POST['mod'])) $calculadoraCientifica->modulo();
			if(isset($_POST['4'])) $calculadoraCientifica->digitos(4);
			if(isset($_POST['5'])) $calculadoraCientifica->digitos(5);
			if(isset($_POST['6'])) $calculadoraCientifica->digitos(6);
			if(isset($_POST['-'])) $calculadoraCientifica->resta();
			if(isset($_POST['masmenos'])) $calculadoraCientifica->masMenos();
			if(isset($_POST['1'])) $calculadoraCientifica->digitos(1);
			if(isset($_POST['2'])) $calculadoraCientifica->digitos(2);
			if(isset($_POST['3'])) $calculadoraCientifica->digitos(3);
			if(isset($_POST['+'])) $calculadoraCientifica->suma();
			if(isset($_POST['0'])) $calculadoraCientifica->digitos(0);
			if(isset($_POST['punto'])) $calculadoraCientifica->punto();
			if(isset($_POST['C'])) $calculadoraCientifica->borrar();
			if(isset($_POST['='])) $calculadoraCientifica->igual();
			if(isset($_POST['pizq'])) $calculadoraCientifica->parentesisIzquierdo();
			if(isset($_POST['pdch'])) $calculadoraCientifica->parentesisDerecho();
			if(isset($_POST['pi'])) $calculadoraCientifica->teclaPi();
			if(isset($_POST['exp'])) $calculadoraCientifica->exponencial();
			if(isset($_POST['potencia'])) $calculadoraCientifica->potencia();
			if(isset($_POST['potdiez'])) $calculadoraCientifica->potenciaDiez();
			if(isset($_POST['cuadrado'])) $calculadoraCientifica->cuadrado();
			if(isset($_POST['log'])) $calculadoraCientifica->logaritmo();
			if(isset($_POST['igual'])) $calculadoraCientifica->igual();
        
			if(isset($_SESSION['sessionPantalla'])) {
				$_SESSION['sessionPantalla'] .= $calculadoraCientifica->getPantalla();
			} else {
				$_SESSION['sessionPantalla'] = "";
				$_SESSION['sessionPantalla'] .= $calculadoraCientifica->getPantalla();
			}
			if(!isset($_SESSION['sessionMemoria'])) {
				$_SESSION['sessionMemoria'] = 0;
				$_SESSION['sessionMemoria'] .= $calculadoraCientifica->getMemoria();
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
				<input type='submit' name='cuadrado' value='x&#178;' onClick = 'calculadoraCientifica.cuadrado()'>
				<input type='submit' name='potencia' value='x&#696;' onClick = 'calculadoraCientifica.potencia()'>
				<input type='submit' name='seno' value='sin' onClick = 'calculadoraCientifica.seno()'>
				<input type='submit' name='coseno' value='cos' onClick = 'calculadoraCientifica.coseno()'>
				<input type='submit' name='tangente' value='tan' onClick = 'calculadoraCientifica.tangente()'>
				<input type='submit' name='raiz' value='&#8730;' onClick = 'calculadoraCientifica.raiz()'>
				<input type='submit' name='potdiez' value='10&#829;' onClick ='calculadoraCientifica.potenciaDiez()'>
				<input type='submit' name='log' value='log' onClick = 'calculadoraCientifica.logaritmo()'>
				<input type='submit' name='exp' value='exp' onClick = 'calculadoraCientifica.exponencial()'>
				<input type='submit' name='mod' value='mod' onClick = 'calculadoraCientifica.modulo()''>
				<input type='submit' name='m-' value='m-' onClick = 'calculadoraCientifica.mMenos()'>
				<input type='submit' name='m+' value='m+' onClick = 'calculadoraCientifica.mMas()'>
				<input type='submit' name='cosec' value='csc' onClick = 'calculadoraCientifica.cosecante()'>
				<input type='submit' name='sec' value='sec' onClick = 'alculadoraCientifica.secante()'>
				<input type='submit' name='*' value='&#10005;' onClick = 'calculadoraCientifica.multiplicacion()'>
				<input type='submit' name='mrc' value='mrc' onClick = 'calculadoraCientifica.mrc()'>
				<input type='submit' name='borrar' value='CE' onClick = 'calculadoraCientifica.borrar()'>
				<input type='submit' name='borrar' value='C' onClick = 'calculadoraCientifica.borrar()'>
				<input type='submit' name='bdig' value='&#129092;' onClick = 'calculadoraCientifica.borrarDigito()'>
				<input type='submit' name='/' value='&#247;' onClick = 'calculadoraCientifica.division()'>
				<input type='submit' name='pi' value='&#120587;' onClick = 'calculadoraCientifica.pi()'>
				<input type='submit' name='7' value='7' onClick = 'calculadoraCientifica.digitos('7')'>
				<input type='submit' name='8' value='8' onClick = 'calculadoraCientifica.digitos('8')'>
				<input type='submit' name='9' value='9' onClick = 'calculadoraCientifica.digitos('9')'>
				<input type='submit' name='+' value='+' onClick = 'calculadoraCientifica.suma()'>				
				<input type='submit' name='fact' value='n!' onClick = 'calculadoraCientifica.factorial()'>
				<input type='submit' name='4' value='4' onClick = 'calculadoraCientifica.digitos('4')'>
				<input type='submit' name='5' value='5' onClick = 'calculadoraCientifica.digitos('5')'>
				<input type='submit' name='6' value='6' onClick = 'calculadoraCientifica.digitos('6')'>
				<input type='submit' name='-' value='-' onClick = 'calculadoraCientifica.resta()'>					
				<input type='submit' name='masmenos' value='+/-' onClick = 'calculadoraCientifica.masmenos()'>
				<input type='submit' name='1' value='1' onClick = 'calculadoraCientifica.digitos('1')'>
				<input type='submit' name='2' value='2' onClick = 'calculadoraCientifica.digitos('2')'>
				<input type='submit' name='3' value='3' onClick = 'calculadoraCientifica.digitos('3')'>
				<input type='submit' name='' value=' ' disabled>
				<input type='submit' name='pizq' value='(' onClick = 'calculadoraCientifica.parentesisIzquierdo()'>
				<input type='submit' name='pdch' value=')' onClick = 'calculadoraCientifica.parentesisDerecho()'>
				<input type='submit' name='0' value='0' onClick = 'calculadoraCientifica.digitos('0')'>
				<input type='submit' name='punto' value='.' onClick = 'calculadoraCientifica.punto()'>
				<input type='submit' name='igual' value='=' onClick = 'calculadoraCientifica.igual()'>
			</article>
		</section>
		</form>
		"
	?>
</body>
</html>