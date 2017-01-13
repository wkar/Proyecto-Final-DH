<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Subcategorias;
use App\Producto;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;

// CONTROLADOR QUE MANEJA TODAS LAS PETICIONES EN RELACION A LOS PRODUCTOS


class productoController extends Controller
{
    public function inventario(){ // LISTA PARA LOS PRODUCTOS DE MI USUARIO
      $prods = Auth::user()->productos;
      return view('productos.inventario')->with('productos', $prods);
    }

    public function listado(){ // LISTA DE TODOS LOS
      $cats = Categorias::all();
      if(Input::get('categoria') && Input::get('categoria') != 'all' && !(Input::get('s'))){
        $prods = Producto::where('categoria_id', Input::get('categoria'))->get();
      }elseif(Input::get('s')){
          $s = Input::get('s');
          $prods = Producto::where('nombre', 'LIKE', "%$s%")->get();
      }else{
        $prods = Producto::all();
      }
      return view('listado')->with('productos', $prods)->with('categorias', $cats)->with('id', Input::get('categoria'));
    }

    public function showNuevo(){
      $categorias = Categorias::all();
      //MANDAR SUBCATEGORIAS POR AJAX UNA VEZ SELECCIONADA LA CATEGORIA
      return view('productos.crear')->with('categorias', $categorias);
    }

    public function showEditar($id){
      $categorias = Categorias::all();
      //MANDAR SUBCATEGORIAS POR AJAX UNA VEZ SELECCIONADA LA CATEGORIA
      $prod = Auth::user()->productos()->where('id',$id)->first();
      if(is_null($prod)){
        return redirect('index');
      }
      $catProducto = $categorias->where('id', $prod->categoria_id)->first();
      $subcategorias = Subcategorias::where('categoria_id',$catProducto->id)->get();

      return view('productos.editar')->with('producto', $prod)->with('categorias', $categorias)->with('subcategorias',$subcategorias);
    }

    public function showBorrar($id){
      $categorias = Categorias::all();
      //MANDAR SUBCATEGORIAS POR AJAX UNA VEZ SELECCIONADA LA CATEGORIA
      $prod = Auth::user()->productos()->where('id',$id)->first();
      if(is_null($prod)){
        return redirect('index');
      }
      $catProducto = $categorias->where('id', $prod->categoria_id)->first();
      $subcategorias = Subcategorias::where('categoria_id',$catProducto->id)->get();

      return view('productos.borrar')->with('producto', $prod)->with('categorias', $categorias)->with('subcategorias',$subcategorias);
    }

    public function productoNuevo(Request $request){
        $producto = new Producto();

        $this->validate($request, [
          'nombre'      => 'required|max:100',
          'categoria'   => 'required',
          'subcategoria'=> 'required',
          'imagen'      => 'required|image',
          'fecha_cierre'=> 'required|date|after:yesterday',
          'hora_cierre' => 'required',
          'descripcion' => 'required|max:750',
        ]);

        if($producto->validate($request->all())){
          $producto->nombre = $request['nombre'];
          $producto->user_id = Auth::id();
          $producto->categoria_id = $request['categoria'];
          $producto->subcategoria_id = $request['subcategoria'];
          $producto->ruta_imagen = $producto->guardarImagen($request->file('imagen'));
          $producto->fecha_inicio = date('Y-m-d H:i:s');
          $producto->fecha_cierre = $producto->crearFechaCierre($request['fecha_cierre'], $request['hora_cierre']);
          $producto->descripcion = $request['descripcion'];

          // ARREGLAR EL PORQUE NO SE VE LA IMAGEN.
          if($producto->save()){
            return redirect('/index')->with('message', 'Producto creado correctamente');
          }
          else{
            return redirect()->back()->with('message', 'Error al crear el producto'); // <<<<<<<<<<<< CREAR {{ session('MESSAGE') }} EN TODAS LAS VISTAS DE CREAR EDITAR Y BORRAR PRODUCTOS
          }
        }else{
          return redirect()->back()->with('errores', $producto->errors());
        }

    }

    public function productoEditar($id){
      $producto = Auth::user()->productos()->where('id', $id)->first();
      if(is_null($producto)){
        return redirect('index');
      }
      if($producto->validate($request->input())){
        $producto->nombre = $request['nombre'];
        $producto->user_id = Auth::id();
        $producto->categoria_id = $request['categoria'];
        $producto->subcategoria_id = $request['subcategoria'];
        $producto->ruta_imagen = $producto->guardarImagen($request->file('imagen'));
        $producto->fecha_inicio = date('Y-m-d H:i:s');
        $producto->fecha_cierre = $producto->crearFechaCierre($request['fecha_cierre'], $request['hora_cierre']);
        $producto->descripcion = $request['descripcion'];

        // ARREGLAR EL PORQUE NO SE VE LA IMAGEN.
        if($producto->save()){
          return redirect('index')->with('message', 'Producto editar correctamente');
        }
        else{
          return redirect()->back()->with('message', 'Error al editar el producto'); // <<<<<<<<<<<< CREAR {{ session('MESSAGE') }} EN TODAS LAS VISTAS DE CREAR EDITAR Y BORRAR PRODUCTOS
        }
      }else{
        return redirect()->back()->with('errores', $producto->errors());
      }

    }

    public function productoBorrar($id){
      $producto = Auth::user()->productos()->where('id', $id)->first();
      if(is_null($producto)){
        return redirect('index');
      }
      $ruta = $producto->ruta_imagen;
      if($producto->delete()){
        \File::Delete($ruta);
        return redirect('index')->with('message', 'Producto borrado correctamente');
      }else{
        return redirect()->back()->with('message', 'Error al eliminar el producto');
      }

    }


}
