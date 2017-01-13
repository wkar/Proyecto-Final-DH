  @extends('main')
@section('titulo')
  Crear producto
@endsection

@section('css')
<link rel="stylesheet" href="css/productosECB.css">
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
<h1 class='titleProds'>Crear producto</h1>
<form action="/producto/nuevo" method="POST" enctype="multipart/form-data" class="form-crear">
  @foreach($errors->all() as $eror)
  {{$eror}}
  @endforeach
   {{csrf_field()}}
   <div class="contenedor-labels">
     <label class="label-100">
       Nombre
       <input type="text" name="nombre" value="">
     </label>
     <label class="label-cat">
       Categoria
       <select name="categoria" id="cat">
         @foreach ($categorias as $cat)
         <option value="{{$cat->id}}">{{$cat->nombre}}</option>
         @endforeach
       </select>
     </label>
     <label class="label-cat">
       Subcategoria
       <select name="subcategoria" id="subc">
       </select>
     </label>
     <label class="label-100">
       Imagen del producto
       <input type="file" name="imagen">
     </label>
     <label class="label-100">
       Fecha de finalizacion de subasta
       <input type="date" name="fecha_cierre" value="">
     </label>
     <label class="label-100">
       Hora de finalizacion de subasta
       <input type="time" name="hora_cierre" value="">
     </label>
     <label class="label-100">
       Descripcion
       <textarea name="descripcion" rows="8" cols="40" value="" placeholder="Escriba una descripcion del producto"></textarea>
     </label>
     <input type="submit" name="" value="Crear" class="btn-crear">
   </div>
 </form>
@endsection
