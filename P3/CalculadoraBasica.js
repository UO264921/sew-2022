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
	
}

var calculadoraBasica = new CalculadoraBasica();

document.addEventListener('keydown', (event) => {
	const keyName = event.key;
	switch (keyName){
		case('0'): calculadoraBasica.digitos('0');break;
		case('1'): calculadoraBasica.digitos('1');break;
		case('2'): calculadoraBasica.digitos('2');break;
		case('3'): calculadoraBasica.digitos('3');break;
		case('4'): calculadoraBasica.digitos('4');break;
		case('5'): calculadoraBasica.digitos('5');break;
		case('6'): calculadoraBasica.digitos('6');break;
		case('7'): calculadoraBasica.digitos('7');break;
		case('8'): calculadoraBasica.digitos('8');break;
		case('9'): calculadoraBasica.digitos('9');break;
		case('+'): calculadoraBasica.suma();break;
		case('-'): calculadoraBasica.resta();break;
		case('p'): calculadoraBasica.multiplicacion();break;
		case('d'): calculadoraBasica.division();break;
		case('m'): calculadoraBasica.mrc();break;
		case('n'): calculadoraBasica.mMenos();break;
		case('o'): calculadoraBasica.mMas();break;
		case('d'): calculadoraBasica.modulo();break;
		case('s'): calculadoraBasica.masmenos();break;
		case('r'): calculadoraBasica.raiz();break;
		case('.'): calculadoraBasica.punto();break;
		case('c'): calculadoraBasica.borrar();break;
		case('i'): calculadoraBasica.igual();break;
	}
  });