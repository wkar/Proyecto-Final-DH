@extends('main')

@section('titulo')
  Listado de productos
@endsection

@section('css')
<link rel="stylesheet" href="css/listados.css">
<style media="screen">
  .selectCat{
    float:right;
  }
  h1{
    float:left;
  }
  .tituloSelect{
    clear:both;
    overflow: hidden;
  }
  @if(count($productos) < 5)
  footer{
    position:fixed;
    bottom:0;
  }
  @endif
</style>
@endsection

@section('javascript')
<script type="text/javascript">
  var select = document.querySelector('#selector')
  select.addEventListener('change', function(){
    var id = select.options[select.selectedIndex].value;
    window.location = "/listado?categoria=" + id;
  });
</script>
@endsection

@section('contenido')
<main>
<div class="tituloSelect">
  <h1>Listado de productos</h1>
  <div class="selectCat">
    <p>
      Categorias:
    </p>
    <select id='selector'>
          <option value='all'>Todos</option>
        @foreach($categorias as $cat)
          @if($id == $cat->id)
          <option value='{{$cat->id}}' selected="">{{$cat->nombre}}</option>
          @else
          <option value='{{$cat->id}}'>{{$cat->nombre}}</option>
          @endif
        @endforeach
    </select>
  </div>
</div>
@if(count($productos) < 1)
<p>No se encontro ningun producto</p>
@endif
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
