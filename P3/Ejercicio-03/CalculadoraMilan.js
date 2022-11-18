class CalculadoraMilan {
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
			this.memoria = this.memoria + Number(eval(this.pantalla));
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	digitos(digito) {
		this.pantalla += digito;
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
			this.pantalla = Number(Math.sqrt(Number(eval(this.pantalla))));
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
			case('p'): this.multiplicacion();break;
			case('d'): this.division();break;
			case('m'): this.mrc();break;
			case('n'): this.mMenos();break;
			case('o'): this.mMas();break;
			case('d'): this.modulo();break;
			case('s'): this.masmenos();break;
			case('r'): this.raiz();break;
			case('.'): this.punto();break;
			case('c'): this.borrar();break;
			case('i'): this.igual();break;
		}
	}
	
}

var calculadoraMilan = new CalculadoraMilan();

document.addEventListener('keydown', (event) => {
	calculadoraMilan.funcionTeclas(event.key);
  });