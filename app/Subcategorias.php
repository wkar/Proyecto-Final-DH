<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    //
    public function categoria(){
      return $this->belongsTo('App\Categorias', 'categoria_id');
    }
}
