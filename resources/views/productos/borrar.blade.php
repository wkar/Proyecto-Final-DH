@extends('main')
@section('titulo')
  Borrar producto
@endsection

@section('css')
<link rel="stylesheet" href="css/productosECB.css">
@endsection


@section('contenido')
<h1 class='titleProds'>Borrar producto</h1>
<form action="" method="POST" enctype="multipart/form-data" class="form-crear">
  {{csrf_field()}}
  <label class="label-100">
    Nombre
    <input type="text" name="nombre" value="{{$producto->nombre}}" disabled>
  </label>
  <label class="label-cat">
    Categoria
    <select disabled name="categoria" id="cat">
      @foreach($categorias as $cat)
      @if($cat->id == $producto->categoria_id)
      <option value='{{$cat->id}}' selected>{{$cat->nombre}}</option>
      @endif
      @endforeach
    </select>
  </label>
  <label class="label-cat">
    Subcategoria
    <select disabled name="subcategoria" id="subc">
      @foreach($subcategorias as $subc)
      @if($subc->id== $producto->subcategoria_id)
      <option value="{{$subc->id}}">{{$subc->nombre}}</option>
      @endif
      @endforeach
    </select>
  </label>
  <label class="label-100">
    Imagen del producto
    <br>
    <img src="/{{$producto->ruta_imagen}}" alt="producto" />
  </label>
  <label class="label-100">
    Fecha de finalizacion de subasta
    <input type="date" name="fecha_cierre" value="{{substr($producto->fecha_cierre,0,10)}}" disabled>
  </label>
  <label class="label-100">
    Hora de finalizacion de subasta
    <input type="time" name="hora_cierre" value="{{substr($producto->fecha_cierre,11,15)}}" disabled>
  </label>
  <label class="label-100">
    Descripcion
    <textarea disabled name="descripcion" rows="8" cols="40" value="">{{$producto->descripcion}}</textarea>
  </label>
  <input type="submit" class='btn-crear' value="Eliminar">
</form>

@endsection


@section('javascript')
<script type="text/javascript">
var hidden = false;

setTimeout(function(){
    document.querySelector(".mensaje").style.visibility= hidden ? "visible" : "hidden";
},5000);

</script>
@endsection
