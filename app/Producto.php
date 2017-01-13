<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $rules = array(
      'nombre'      => 'required|max:100',
      'categoria'   => 'required',
      'subcategoria'=> 'required',
      'imagen'      => 'required|image',
      'fecha_cierre'=> 'required|date|after:yesterday',
      'hora_cierre' => 'required',
      'descripcion' => 'required|max:750',
  );

  public $mensajes = array(
    'required' => 'El :attribute es requerido',
    'max'      => 'El :attribute no puede ser mayor que :max',
    'image'    => 'La imagen debe ser valida',
    'date'     => 'Ingrese una fecha valida',
    'after'    => 'La :attribute debe ser un dia despues que :date',
  );



  public function validate($datos){
    $validador = Validator::make($datos, $this->rules, $this->mensajes);
      return $validador;
  }
  protected $fillable = [
      'nombre','user_id', 'categoria_id', 'subcategoria_id', 'ruta_imagen', 'fecha_cierre','descripcion, fecha_inicio'
  ];

  public function categoria() {
      return $this->belongsTo('App\Subcategorias', 'subcategoria_id');
  }
  public function subcategoria() {
      return $this->belongsTo('App\Categorias', 'categoria_id');
  }
  public function user() {
      return $this->belongsTo('App\User', 'user_id');
  }
  public function getCat($id){
    return Categorias::where('id', $id)->first()->nombre;
  }
  public function getSubc($id){
    return Subcategorias::where('id', $id)->first()->nombre;
  }
  public function guardarImagen($imagen){
    $imageTempName = $imagen->getPathname();
    $imageName = $imagen->getClientOriginalName();
    $path = base_path() . '/public/uploads/productos';
    $imagen->move($path , $imageName);
    return ('/uploads/productos/' . $imageName);
  }

  public function crearFechaCierre($dia, $hora){
    return ($dia . ' ' . $hora . ':00');
  }
}
