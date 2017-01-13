<?php

namespace App\Http\Controllers;

use App\Subcategorias;
use Response;
use Illuminate\Support\Facades\Input;

class ajaxController extends Controller
{
      public function traerSubc(){
      $id = Input::get('id');
      $subcategorias = Subcategorias::where('categoria_id', $id)->get();
      return Response::json($subcategorias);
    }
}
