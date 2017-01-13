<?php

namespace App\Http\Controllers;

use Request;
use Response;
use App\Categorias;
use App\Subcategorias;
use App\Producto;
use Illuminate\Support\Facades\Input;

class routeController extends Controller
{
    public function showIndex(){
      $cats = Categorias::all();
      $subca = Subcategorias::all();
      $prods = Producto::orderBy('fecha_cierre','asc')->take(9)->get();
      return view('index')->with('productos', $prods)->with('categorias', $cats)->with('subcategorias',$subca);
    }
    public function showFaq(){
      return view('faq');
    }
}
