class Panel {
	constructor(){
		this.color = "rgb(255,255,255)";
		this.nameArchivo = "";
		this.sizeArchivo = 0.0;
	}

	pintar(){
		var canvas = document.querySelector("canvas:nth-child(2)");
		var ctx = canvas.getContext("2d");
		this.color = "rgb(255,255,255)";
		ctx.fillStyle = this.color;
		ctx.fillRect (0, 0, 400, 250);
		if (this.sizeArchivo==0){
			this.color = "rgb(255,255,255)";
			ctx.fillStyle = this.color;
			ctx.fillRect (0, 0, 0, 250);
		}
		else if (this.sizeArchivo>0 && this.sizeArchivo < 300000){
			this.color = "rgb(0,255,0)";
			ctx.fillStyle = this.color;
			ctx.fillRect (0, 0, 50, 250);
		}
		else if (this.sizeArchivo>=300000 && this.sizeArchivo < 2000000){
			this.color = "rgb(150,150,0)";
			ctx.fillStyle = this.color;
			ctx.fillRect (0, 0, 190, 250);
		}
		else if (this.sizeArchivo>=2000000 && this.sizeArchivo<10000000){
			this.color = "rgb(160,0,0)";
			ctx.fillStyle = this.color;
			ctx.fillRect (0, 0, 300, 250);
		}
		else if (this.sizeArchivo>=10000000){
			this.color = "rgb(255,0,0)";
			ctx.fillStyle = this.color;
			ctx.fillRect (0, 0, 400, 250);
		}
		document.querySelector("h3").innerHTML = "Tamaño: " + this.sizeArchivo/1000 + " kb";
	}

	allowDrop(ev) {
		ev.preventDefault();
	}
	
	texto(files){
		var archivo = files[0];
		this.nameArchivo = archivo.name;
		this.sizeArchivo = archivo.size;
		alert(archivo.size);
		document.querySelector("section:nth-child(3)>h2").textContent = archivo.name;
	}
}

var panel = new Panel();