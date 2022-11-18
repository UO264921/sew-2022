class CalculadoraMilan {
	constructor() {
		this.pantalla = "";
		this.memoria = Number(0);
	}
	mrc() {
		this.pantalla += this.memoria;
		document.querySelector("input[type=text]").value = this.pantalla;
	}
	mMenos() {
		try {
			this.memoria = Number(this.memoria - eval(this.pantalla));
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	mMas() {
		try {
			this.memoria = Number(this.memoria + eval(this.pantalla));
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
			this.pantalla = Number(eval(this.pantalla));
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
			this.pantalla = Number((eval(this.pantalla))*-1);
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

class CalculadoraCientifica extends CalculadoraMilan {
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
	funcionTeclas(keyName){
		switch (keyName){
			case('0'): this.digitos('0');break;
			case('1'): this.digitos('1');break;
			case('2'): this.digitos('2');break;
			case('3'): this.digitos('3');break;
			case('4'): this.digitos('4');break;
			case('5'): this.digitos('5');break;
			case('6'): this.digitos('6');break;
			case('7'): this.digitos('7');break;
			case('8'): this.digitos('8');break;
			case('9'): this.digitos('9');break;
			case('+'): this.suma();break;
			case('-'): this.resta();break;
			case('x'): this.multiplicacion();break;
			case('v'): this.division();break;
			case('w'): this.mrc();break;
			case('n'): this.mMenos();break;
			case('m'): this.mMas();break;
			case('u'): this.modulo();break;
			case('s'): this.masmenos();break;
			case('z'): this.raiz();break;
			case('.'): this.punto();break;
			case('r'): this.borrar();break;
			case('g'): this.igual();break;
			case('c'): this.cuadrado();break;
			case('t'): this.potencia();break;
			case('e'): this.seno();break;
			case('o'): this.coseno();break;
			case('k'): this.secante();break;
			case('j'): this.cosecante();break;
			case('a'): this.tangente();break;
			case('d'): this.potenciaDiez();break;
			case('l'): this.logaritmo();break;
			case('p'): this.exponencial();break;
			case('b'): this.borrarDigito();break;
			case('q'): this.pi();break;
			case('f'): this.factorial();break;
			case('i'): this.parentesisIzquierdo();break;
			case('h'): this.parentesisDerecho();break;
		}
	}
}


var calculadoraCientifica = new CalculadoraCientifica();

document.addEventListener('keydown', (event) => {
	calculadoraCientifica.funcionTeclas(event.key);
  });