@extends('main')

@section('titulo')
  Inventario
@endsection

@section('css')
<link rel="stylesheet" href="css/listados.css">
@endsection

@section('javascript')
@endsection

@section('contenido')
<main>
  <h1>Inventario</h1>
  <div class="nuevo">
    <a href="/producto/nuevo">Crear producto</a>
  </div>
  @foreach($productos as $prod)
  <article class="">
    <h2 class="ptitulo">{{$prod->nombre}}</h2>
    <div class="limpiar">
    <img src="{{$prod->ruta_imagen}}" class="" alt="producto" />
    <div class="contenedorProd">
      <ul class='cats'>
        <li>{{$prod->getCat($prod->categoria_id)}}</li>
        <li>{{$prod->getSubc($prod->subcategoria_id)}}</li>
      </ul>
      <h5>Descripcion: </h5>
        <p class="descripcion">
          {{$prod->descripcion}}
        </p>
        <p class="fecha">
          Finaliza:
          {{$prod->fecha_cierre}}
        </p>
        <ul class="links">
          <li><a href="/producto/editar/{{$prod->id}}" class="">Editar</a></li>
          <li><a href="/producto/borrar/{{$prod->id}}" class="">Borrar</a></li>
        </ul>
    </div>
  </div>
  </article>
  @endforeach
</main>
@endsection
