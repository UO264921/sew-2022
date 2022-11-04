class CalculadoraBasica {
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
			this.memoria = this.memoria - eval(Number(this.pantalla));
		} catch (err) {
			document.querySelector("input[type=text]").value = "ERROR = " + err;
			this.pantalla = "";
		}
	}
	mMas() {
		try {
			this.memoria = this.memoria + eval(Number(this.pantalla));
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
}
var calculadoraBasica = new CalculadoraBasica();