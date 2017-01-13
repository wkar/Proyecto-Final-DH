(function(){
  console.log('asdasas');
  var textoErrores = '';
	var errores = new Array();
	var flag = 0; //flag para solo poner el error de vacio una vez

	var form = document.querySelector('.form-login');
  console.log(form);
	form.addEventListener('submit', function(e){
    console.log('entre');
    validarDatos();
		if(!errores.length == 0){
			alert(textoErrores);
			e.preventDefault()
		}
	});


	function validarDatos(){
		flag = 0;
		errores = [];
		textoErrores = '';

		var email = document.querySelector('.email').value;
		var password = document.querySelector('.password').value;

		validarEmail(email);
		console.log(errores);
		validarVacio(password);


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


})();
