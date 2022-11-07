class CalculadoraRPN {
	constructor() {
		this.pantalla = "";
		this.memoria = 0;
		this.pila = new Array();
	}
	esValido(result) {
		if (result != "" && !result.includes("undefined") && !result.includes("NaN")) {
			return true;
		}
		return false;
	}
	apilar(){
		if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
			this.pila.push(document.querySelector("section>input:nth-child(5)").value);
		}
		this.pantalla = "";
		document.querySelector("section>input:nth-child(3)").value = this.mostrar();
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
    }
	mostrar() {
		var stringPila = "";
		for (var i in this.pila) stringPila += this.pila[i] + " ";
		return stringPila;
	}
	desapilar(){
		this.pantalla = this.pila.pop();
		document.querySelector("section>input:nth-child(3)").value = this.mostrar();
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
		if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
			this.pantalla = "";
		}
	}
	mMenos() {
		try {
			this.memoria = this.memoria - this.pantalla;
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	mMas() {
		try {
			this.memoria = this.memoria + this.pantalla;
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	seno() {
		try {
			this.pantalla = Math.sin(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	coseno() {
		try {
			this.pantalla = Math.cos(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	tangente() {
		try {
			this.pantalla = Math.tan(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	cuadrado() {
		try {
			this.pantalla = Math.pow(this.pila.pop(),2);
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	potencia() {
		try {
			let op2 = parseInt(this.pila.pop());
			let op1 = parseInt(this.pila.pop());
			this.pantalla = Math.pow(op1,op2);
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	cosecante() {
		try {
			this.pantalla = 1/Math.sin(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	secante() {
		try {
			this.pantalla = 1/Math.cos(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	cotangente() {
		try {
			this.pantalla = 1/Math.tan(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	raiz() {
		try {
			this.pantalla = Math.sqrt(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	potenciaDiez() {
		try {
			this.pantalla = Math.pow(10,this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	logaritmo() {
		try {
			this.pantalla = Math.log(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	exponencial() {
		try {
			this.pantalla = Math.exp(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	modulo() {
		try {
			let op2 = parseInt(this.pila.pop());
			let op1 = parseInt(this.pila.pop());
			this.pantalla = op1%op2;
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	mrc() {
		this.pantalla += this.memoria;
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
	borrarTodo() {
		this.pila = new Array();
		this.pantalla = "";
		document.querySelector("section>input:nth-child(3)").value = this.mostrar();
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
	borrarDigito() {
		this.pantalla = this.pantalla.substring(0, this.pantalla.length-1);
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
	division() {
		try {
			let op2 = parseInt(this.pila.pop());
			let op1 = parseInt(this.pila.pop());
			this.pantalla = op1/op2;
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	pi() {
		this.pantalla += Math.PI;
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
	digitos(digito) {
		this.pantalla += digito;
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
	multiplicacion() {
		try {
			let op2 = parseInt(this.pila.pop());
			let op1 = parseInt(this.pila.pop());
			this.pantalla = op1*op2;
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	factorial() {
		try {
			this.pantalla = this.factorialR(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	factorialR(n) {
		var i, total = 1; 
		for (i=1; i<=n; i++) {
			total = total * i; 
		}
		return total;
	}
	resta() {
		try {
			let op2 = parseInt(this.pila.pop());
			let op1 = parseInt(this.pila.pop());
			this.pantalla = op1-op2;
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	absoluto() {
		try {
			this.pantalla = Math.abs(this.pila.pop());
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	suma() {
		try {
			let op2 = parseInt(this.pila.pop());
			let op1 = parseInt(this.pila.pop());
			this.pantalla = op1+op2;
			document.querySelector("section>input:nth-child(5)").value = this.pantalla;
			if (this.esValido(document.querySelector("section>input:nth-child(5)").value)) {
				this.apilar();
			}
		} catch (err) {
			document.querySelector("section>input:nth-child(5)").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	parentesis() {
		this.pantalla = "("+document.querySelector("section>input:nth-child(5)").value+")";
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
	punto() {
		this.pantalla += ".";
		document.querySelector("section>input:nth-child(5)").value = this.pantalla;
	}
}
var calculadoraRPN = new CalculadoraRPN();

document.addEventListener('keydown', (event) => {
	const keyName = event.key;
	switch (keyName){
		case('0'): calculadoraRPN.digitos('0');break;
		case('1'): calculadoraRPN.digitos('1');break;
		case('2'): calculadoraRPN.digitos('2');break;
		case('3'): calculadoraRPN.digitos('3');break;
		case('4'): calculadoraRPN.digitos('4');break;
		case('5'): calculadoraRPN.digitos('5');break;
		case('6'): calculadoraRPN.digitos('6');break;
		case('7'): calculadoraRPN.digitos('7');break;
		case('8'): calculadoraRPN.digitos('8');break;
		case('9'): calculadoraRPN.digitos('9');break;
		case('+'): calculadoraRPN.suma();break;
		case('-'): calculadoraRPN.resta();break;
		case('p'): calculadoraRPN.multiplicacion();break;
		case('d'): calculadoraRPN.division();break;
		case('m'): calculadoraRPN.mrc();break;
		case('n'): calculadoraRPN.mMenos();break;
		case('o'): calculadoraRPN.mMas();break;
		case('l'): calculadoraRPN.modulo();break;
		case('r'): calculadoraRPN.raiz();break;
		case('.'): calculadoraRPN.punto();break;
		case('c'): calculadoraRPN.borrarTodo();break;
		case('u'): calculadoraRPN.cuadrado();break;
		case('t'): calculadoraRPN.potencia();break;
		case('e'): calculadoraRPN.seno();break;
		case('h'): calculadoraRPN.coseno();break;
		case('k'): calculadoraRPN.secante();break;
		case('j'): calculadoraRPN.cosecante();break;
		case('a'): calculadoraRPN.tangente();break;
        case('¡'): calculadoraRPN.cotangente();break;
		case('z'): calculadoraRPN.potenciaDiez();break;
		case('g'): calculadoraRPN.logaritmo();break;
		case('x'): calculadoraRPN.exponencial();break;
		case('b'): calculadoraRPN.borrarDigito();break;
		case('q'): calculadoraRPN.pi();break;
		case('f'): calculadoraRPN.factorial();break;
		case('º'): calculadoraRPN.parentesis();break;
        case('i'): calculadoraRPN.apilar();break;
        case('y'): calculadoraRPN.desapilar();break;
        case('v'): calculadoraRPN.absoluto();break;
	}
  });