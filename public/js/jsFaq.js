(function(){
  // selecciono todas las pregs
  var preguntas = document.querySelectorAll('.iconoPreg');

  //itinero sobre todas las pregs y les asigno el evento click con la funcion de toogle como callback
  for(var i = 0; i < preguntas.length; i++){
    preguntas[i].addEventListener('click', toogle);
  }

  function toogle(){
    var pregunta = this.parentElement.parentElement.querySelector('p'); //selleciono a la respuests de la misma pregunta
      if(window.getComputedStyle(pregunta, null).getPropertyValue("display") == "none"){
      this.innerHTML = '&#8593;';
      pregunta.style.display = "block"; // si esta oculta la muestro
      this.parentElement.style.borderBottom = '2px solid rgba(0,0,0,0.17)'; //le vuelvo a poner el
    }
    else{
      this.innerHTML = '&#8595;';
      pregunta.style.display = "none"; //else, si esta a la vista, la oculto
      this.parentElement.style.borderBottom = 'none'; // le saco el borde asi no queda mal al achicarse.
    }
  }

})();
