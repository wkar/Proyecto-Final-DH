(function(){
	var textoErrores = '';
	var errores = new Array();
	var flag = 0; //flag para solo poner el error de vacio una vez

	var form = document.querySelector(".form-reg");
	form.addEventListener('submit', function(e){
/*	getUsuarios(); GET USUARIOS AHORA SE LLAMA COMO CALLBACK DE VALIDAR DATOS */
 		validarDatos();
		if(!errores.length == 0){
			alert(textoErrores);
			e.preventDefault()
		}
		else{
			getNuevoUsuario();
		}

	});


	function validarDatos(){
		flag = 0;
		errores = [];
		textoErrores = '';

		var nombre = document.querySelector('.name').value;
		var apellido = document.querySelector('.apellido').value;
		var email = document.querySelector('.mail').value;
		var fecha = document.querySelector('.birthday').value;
		var password = document.querySelector('.password').value;
		var passwordR = document.querySelector('.passwordRepeat').value;

		validarVacio(nombre);
		console.log(errores);
		validarVacio(apellido);
		console.log(errores);
		validarEmail(email);
		console.log(errores);
		validarFecha(fecha);
		console.log(errores);
		validarVacio(password);
		validarVacio(passwordR);
		validarPassword(password,passwordR);

		if(errores.length > 0){
			for (var i = 0; i < errores.length; i++) {
				textoErrores += errores[i]['error'] + '\n';
			}
		}
	}



	function validarEmail(valor){
    var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!regexEmail.test(valor)){
			console.log('error / email /', valor);
      errores.push({
        error: 'Email invalido'
      });
    }
  }

  function validarFecha(valor){
    var regexFecha = /^((19[0-9][0-9])|(20[0-1][0-7]))[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/;
		console.log('error / fecha /', valor);
		var ahora = new Date();
		var diaActual = ahora.getDate();
		var mesActual = ahora.getMonth() + 1; /* es de 0-11 */
		var anioActual = ahora.getFullYear();
		var fechaPartida = valor.split('/');

    if(!regexFecha.test(valor)){
      errores.push({
        error: 'Ingrese una fecha valida (yyyy/mm/dd)'
      });
    }
		else if(fechaPartida[0] >= anioActual && fechaPartida[1] >= mesActual && fechaPartida[2] >= diaActual){
				errores.push({
					error: 'La fecha no puede ser mayor a la actual'
				});
		}
  }

	function validarPassword(password,passwordR){
		if(password != passwordR){
			console.log('entreeeeee');

			errores.push({
				error: 'Las contrasenas no coinciden'
			});
		}
	}

  function validarVacio(valor){

		console.log('error / vacio /', valor);

    for(var i = 0 ; i < errores.length ; i++){
      if(errores[i]['error'] == 'No deje ningun campo vacio'){
        flag = 1;
      }
    }
    if(valor == '' && flag == 0){
      errores.push({
        error: 'No deje ningun campo vacio'
      });
    }
  }


	function getUsuarios(){
		var ajaxVer = new XMLHttpRequest();
		ajaxVer.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				 alert(JSON.parse(ajaxVer.responseText).cantidad);
			 }
			}
		ajaxVer.open('GET', 'https://sprint.digitalhouse.com/getUsuarios', true);
		ajaxVer.send();
		}

	function getNuevoUsuario(){
		var ajaxNuevo = new XMLHttpRequest();
		ajaxNuevo.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				getUsuarios();
			 }
			}
		ajaxNuevo.open('GET', 'https://sprint.digitalhouse.com/nuevoUsuario', true);
		ajaxNuevo.send();
		alert('Espera'); // alert o tiempo de espera nescesario ya que es ajax y hay que esperar que llegue el primer response para que se ejecute el getusuarios, sino mandaba redirect enseguida. El alert para la ejecucion y el response llega a tiempo
	}


})();
