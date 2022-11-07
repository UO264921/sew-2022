class CalculadoraBasica {
	constructor() {
		this.pantalla = "";
		this.memoria = Number(0);
	}
	mrc() {
		this.pantalla += Number(this.memoria);
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	mMenos() {
		try {
			this.memoria = this.memoria - eval(this.pantalla);
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	mMas() {
		try {
			this.memoria = this.memoria + eval(this.pantalla);
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	digitos(digito) {
		this.pantalla += Number(digito);
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	punto() {
		this.pantalla += ".";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	suma() {
		this.pantalla += "+";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	resta() {
		this.pantalla += "-";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	multiplicacion() {
		this.pantalla += "*";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	division() {
		this.pantalla += "/";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	raiz() {
		try {
			this.pantalla = Number(Math.sqrt(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	igual() {
		try {
			this.pantalla = eval(this.pantalla);
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	borrar() {
		this.pantalla = "";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	masmenos() {
		try {
			this.pantalla = Number(eval(this.pantalla))*-1;
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	modulo() {
		this.pantalla += "%";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
}

class CalculadoraCientifica extends CalculadoraBasica {
	constructor() {
		super();
	}
	cosecante() {
		try {
			this.pantalla = Number(1/Math.sin(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	secante() {
		try {
			this.pantalla = Number(1/Math.cos(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	cuadrado() {
		try {
			this.pantalla = Number(Math.pow(eval(this.pantalla),2));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	potencia() {
		this.pantalla += "**";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	seno() {
		try {
			this.pantalla = Number(Math.sin(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	coseno() {
		try {
			this.pantalla = Number(Math.cos(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	tangente() {
		try {
			this.pantalla = Number(Math.tan(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	potenciaDiez() {
		try {
			this.pantalla = Number(Math.pow(10,eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	logaritmo() {
		try {
			this.pantalla = Number(Math.log(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	exponencial() {
		try {
			this.pantalla = Number(Math.exp(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	borrarDigito() {
		this.pantalla = this.pantalla.substring(0, this.pantalla.length-1);
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	pi() {
		this.pantalla += Number(Math.PI);
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	factorial() {
		try {
			this.pantalla = Number(this.factorialR(eval(this.pantalla)));
			document.querySelector("input[type=text]").value = this.pantalla;
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	factorialR(n) {
		var i, total = 1; 
		for (i=1; i<=n; i++) {
			total = total * i; 
		}
		return Number(total);
	}
	parentesisIzquierdo() {
		this.pantalla += "(";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	parentesisDerecho() {
		this.pantalla += ")";
		document.querySelector("input[type=text]").value = this.pantalla;
	}
}


var calculadoraCientifica = new CalculadoraCientifica();

document.addEventListener('keydown', (event) => {
	const keyName = event.key;
	switch (keyName){
		case('0'): calculadoraCientifica.digitos('0');break;
		case('1'): calculadoraCientifica.digitos('1');break;
		case('2'): calculadoraCientifica.digitos('2');break;
		case('3'): calculadoraCientifica.digitos('3');break;
		case('4'): calculadoraCientifica.digitos('4');break;
		case('5'): calculadoraCientifica.digitos('5');break;
		case('6'): calculadoraCientifica.digitos('6');break;
		case('7'): calculadoraCientifica.digitos('7');break;
		case('8'): calculadoraCientifica.digitos('8');break;
		case('9'): calculadoraCientifica.digitos('9');break;
		case('+'): calculadoraCientifica.suma();break;
		case('-'): calculadoraCientifica.resta();break;
		case('p'): calculadoraCientifica.multiplicacion();break;
		case('d'): calculadoraCientifica.division();break;
		case('m'): calculadoraCientifica.mrc();break;
		case('n'): calculadoraCientifica.mMenos();break;
		case('o'): calculadoraCientifica.mMas();break;
		case('l'): calculadoraCientifica.modulo();break;
		case('s'): calculadoraCientifica.masmenos();break;
		case('r'): calculadoraCientifica.raiz();break;
		case('.'): calculadoraCientifica.punto();break;
		case('c'): calculadoraCientifica.borrar();break;
		case('i'): calculadoraCientifica.igual();break;
		case('u'): calculadoraCientifica.cuadrado();break;
		case('t'): calculadoraCientifica.potencia();break;
		case('e'): calculadoraCientifica.seno();break;
		case('h'): calculadoraCientifica.coseno();break;
		case('k'): calculadoraCientifica.secante();break;
		case('j'): calculadoraCientifica.cosecante();break;
		case('a'): calculadoraCientifica.tangente();break;
		case('z'): calculadoraCientifica.potenciaDiez();break;
		case('g'): calculadoraCientifica.logaritmo();break;
		case('x'): calculadoraCientifica.exponencial();break;
		case('b'): calculadoraCientifica.borrarDigito();break;
		case('q'): calculadoraCientifica.pi();break;
		case('f'): calculadoraCientifica.factorial();break;
		case('º'): calculadoraCientifica.parentesisIzquierdo();break;
		case('¡'): calculadoraCientifica.parentesisDerecho();break;
	}
  });