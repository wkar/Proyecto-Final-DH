@extends('main')
@section('titulo')
  Editar producto
@endsection

@section('css')
<link rel="stylesheet" href="/css/productosECB.css">
@endsection

@section('javascript')
<script type="text/javascript">

var hidden = false;

setTimeout(function(){
    document.querySelector(".mensaje").style.visibility= hidden ? "visible" : "hidden";
},5000);


var subca = document.querySelector('#subc')
var select = document.querySelector('#cat')
select.addEventListener('change',function(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var json = JSON.parse(xhttp.responseText)
      subc.innerHTML = '';
      json.forEach(function(valor, i){
        var option = document.createElement("option");
        option.text = json[i].nombre
        option.value = json[i].id
        subca.appendChild(option);
      });
         // Typical action to be performed when the document is ready:
    }
  };
  xhttp.open("get", '/getSubcategorias?id='+select.value, true);
  xhttp.send();
});
</script>
@endsection

@section('contenido')

<h1 class="titleProds">Editar producto</h1>
<form class="form-crear" action="producto/editar/{{$producto->id}}" method="POST" enctype="multipart/form-data">
   {{csrf_field()}}
   <label class="label-100">
     Nombre
     <input type="text" name="nombre" value="{{$producto->nombre}}">
   </label>
   <label class="label-cat">
     Categoria
     <select name="categoria" id="cat">
       @foreach($categorias as $cat)
       @if($cat->id == $producto->categoria_id)
       <option value='{{$cat->id}}' selected>{{$cat->nombre}}</option>
       @else
       <option value="{{$cat->id}}">{{$cat->nombre}}</option>
       @endif
       @endforeach
     </select>
   </label>
   <label class="label-cat">
     Subcategoria
     <select name="subcategoria" id="subc">
       @foreach($subcategorias as $subc)
       <option value="{{$subc->id}}">{{$subc->nombre}}</option>
       @endforeach
     </select>
   </label>
   <label class="label-100">
     Imagen del producto
     <br>
     <img src="/{{$producto->ruta_imagen}}" alt="producto" />
     <input type="file" name="imagen" value="{{$producto->nombre}}">
   </label>
   <label class="label-100">
     Fecha de finalizacion de subasta
     <input type="date" name="fecha_cierre" value="{{substr($producto->fecha_cierre,0,10)}}">
   </label>
   <label class="label-100">
     Hora de finalizacion de subasta
     <input type="time" name="hora_cierre" value="{{substr($producto->fecha_cierre,11,15)}}">
   </label>
   <label class="label-100">
     Descripcion
     <textarea name="descripcion" rows="8" cols="40" value="">{{$producto->descripcion}}</textarea>
   </label>
   <input type="submit" class='btn-crear' value="Editar">
 </form>

@endsection
