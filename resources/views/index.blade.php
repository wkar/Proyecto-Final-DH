@extends('main')
@section('titulo')
  Index
@endsection

@section('css')
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/toastr.css">
@endsection


@section('contenido-header')
<div class="contenido">
  <div class="contenedor-imagen-header">
    <img src="images/logo.png" alt="logo">
  </div>
  <div class="contenedor-titulo-header">
    <h1>Ü-bid</h1>
    <p class="descripcion-titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora perferendis dolorem.</p>
  </div>
</div>
@endsection

@section('contenido')
<div class="contenido">
 <section class="ofertas">
   @foreach($productos as $producto)
   <article class="producto med" id='{{$producto->id}}'>
     <h4>{{$producto->nombre}}</h4>
     <div class="img-producto">
       <img src="{{$producto->ruta_imagen}}" alt="producto">
     </div>
     <div class="datos-producto">
       <ul class="tiempo">
         <li>desde: <span>{{$producto->fecha_inicio}}</span></li>
         <li>hasta: <span id="hasta">{{$producto->fecha_cierre}}</span></li>
       </ul>
       <p class="restante">tiempo restante:</p>
       <p class="tiempoRest">12hs 43m 03s</p>
     </div>
     <a href="" class="ofertar">Ofertar ahora</a>
   </article>
   @endforeach
 </section>
 <!-- BANNER DE PUBLICIDAD O OFERTAS -->
 </div>
 <div class="banner">
   <img src="images/banner.jpg" alt="" class="imagen-banner">
   <div class="sombrado">
     <p class="banner-parrafo">Comienza a subastar desde tu casa ya!</p>
     <a href="/register" class="banner-registrar">Registrate</a>
   </div>
 </div> <!-- HACER LAS CATEGORIAS DINAMICAS -->
 <div class="contenido">
   <section class="categorias">
     <div class="col-01">
       <div class="categoria">
         <h3><a href="/listado?categoria=9">Electronica</a></h3>
           <ul>
             <li><a href="">Televisores y audio</a></li>
             <li><a href="">Computadoras y notebooks</a></li>
             <li><a href="">Consolas y videojuegos</a></li>
             <li><a href="">Camaras digitales y accesorios</a></li>
           </ul>
       </div>
       <div class="categoria">
         <h3><a href="/listado?categoria=10">Telefono - Tablets</a></h3>
         <ul>
           <li><a href="">Telefonos  y smartphones</a></li>
           <li><a href="">Tablets y Ipads</a></li>
           <li><a href="">Accesorios</a></li>
         </ul>
       </div>
       <div class="categoria">
         <h3><a href="/listado?categoria=11">Hogar</a></h3>
         <ul>
           <li><a href="">Muebles interiores</a></li>
           <li><a href="">Muebles exteriores</a></li>
           <li><a href="">Decoracion y accesorios</a></li>
           <li><a href="">Electrodomesticos</a></li>
           <li><a href="">Antiguedades</a></li>
         </ul>
       </div>
       <div class="categoria">
         <h3><a href="/listado?categoria=12">Herramientas</a></h3>
         <ul>
           <li><a href="">Carpinteria</a></li>
           <li><a href="">Ferreteria</a></li>
         </ul>
       </div>
     </div>
     <div class="col-02">
       <div class="categoria">
         <h3><a href="/listado?categoria=13">Ropa - Accesorios</a></h3>
         <ul>
           <li><a href="">Ropa y calzado</a></li>
           <li><a href="">Joyas y accesorios</a></li>
           <li><a href="">Belleza</a></li>
         </ul>
       </div>
       <div class="categoria">
         <h3><a href="/listado?categoria=14">Arte - hobbies </a></h3>
         <ul>
           <li><a href="">Musica</a></li>
           <li><a href="">Libros y revistas</a></li>
           <li><a href="">Instrumentos musicales</a></li>
           <li><a href="">CDs y DVDs</a></li>
         </ul>
       </div>
       <div class="categoria">
         <h3><a href="/listado?categoria=15">Deportes</a></h3>
         <ul>
           <li><a href="">Bicicletas, skates y rollers</a></li>
           <li><a href="">Futbol</a></li>
           <li><a href="">Tennis</a></li>
           <li><a href="">Deportes acuaticos</a></li>
           <li><a href="">Otros deportes</a></li>
           <li><a href="">Accesorios e indumentaria</a></li>
         </ul>
       </div>
     </div>
   </section>
 </div>
 <script type="text/javascript" src='js/jquery-3.1.1.min.js'></script>
 <script type="text/javascript" src='js/slick.min.js'></script>
 <script type="text/javascript" src='js/toastr.js'></script>
@endsection

@section('javascript')
<script>
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


    @if(session('message'))
    toastr["success"]('{{session('message')}}');
    @endif

      $('.ofertas').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 4,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
      ]
      });

    var productos = document.querySelectorAll('.producto.med');
    productos.forEach(function(item){
      var fecha = item.querySelector('#hasta').innerText;
      var id = item.id;
      console.log(fecha);
      CountDownTimer(fecha, id);
    });

    function CountDownTimer(dt, id)
    {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).querySelector('.tiempoRest').innerHTML = 'EXPIRED!';

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).querySelector('.tiempoRest').innerHTML = days + 'days ';
            document.getElementById(id).querySelector('.tiempoRest').innerHTML += hours + 'hrs ';
            document.getElementById(id).querySelector('.tiempoRest').innerHTML += minutes + 'mins ';
            document.getElementById(id).querySelector('.tiempoRest').innerHTML += seconds + 'secs';
        }

        timer = setInterval(showRemaining, 1000);
    }

</script>
@endsection
