@extends('main')
@section('titulo')
  FAQ
@endsection


@section('css')
<link rel="stylesheet" href="css/faq.css">
@endsection

@section('javascript')
<script src='js/jsFaq.js'></script>
@endsection

@section('contenido')
<main>
  <h1>Preguntas frecuentes:</h1>
  <article class="pregunta">
    
    <h5>Como puedo empezar a subastar en ésta página?<span class='iconoPreg'>&#8595;</span></h5>
    <p>Siemplemente tenes que <a href="">loguearte</a>, si es que ya tenes una cuenta, o <a href="">registrarte</a>. Una vez dentro de tu cuenta, vas al apartado <a href="">"subastar producto"</a> y ahi solo queda llenar un pequeño formulario y darle click a SUBASTAR!</p>
  </article>
  <article class="pregunta">
    <h5>Como hago para recuperar mi cuenta si olvide mi contraseña?<span class='iconoPreg'>&#8595;</span></h5>
    <p>En la pantalla de <a href="">logeo</a>, haz click en el link "olvide mi contraseña" y luego de llenar un formulario nescesario se te enviara un mail con las instrucciones a seguir.</p>
  </article>
  <article class="pregunta">
    <h5>Como hago para sacar mi producto de la subasta?<span class='iconoPreg'>&#8595;</span></h5>
    <p>Entra a la pestaña <a href="">mis subastas</a>, selecciona el producto a retirar, y haz click en el link "retirar producto", en la esquina derecha.</p>
  </article>
  <article class="pregunta">
    <h5>Que necesito para ofertar en una subasta?<span class='iconoPreg'>&#8595;</span></h5>
    <p>Lo unico que necesitas para comenzar a ofertar es estar <a href="">logueado</a> y tener el dinero suficiente en tu e-wallet, para cumplir con la oferta</p>
  </article>
  <article class="pregunta">
    <h5>Que metodos de pago estan habilitados para depositar dinero en mi e-wallet?<span class='iconoPreg'>&#8595;</span></h5>
    <p>Actualmente contamos con el soporte de PayPal, MercadoPago y pagos en efectivo utilizando <a href="">rapipago</a> o <a href="">pagofacil</a>.</p>
  </article>
  <a href="" class="preguntar">Pregunta tu mismo</a>
</main>
@endsection
