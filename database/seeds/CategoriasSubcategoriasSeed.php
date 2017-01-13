<?php

use Illuminate\Database\Seeder;

class CategoriasSubcategoriasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert([
          'nombre' =>  'Electronica',
      ]);
      DB::table('categorias')->insert([
          'nombre' => 'Telefono - Tablets'
      ]);
      DB::table('categorias')->insert([
          'nombre' =>  'Hogar',
      ]);
      DB::table('categorias')->insert([
          'nombre' =>  'Herramientas',
      ]);
      DB::table('categorias')->insert([
          'nombre' =>  'Ropa-Accesorios',
      ]);
      DB::table('categorias')->insert([
          'nombre' =>  'Arte',
      ]);
      DB::table('categorias')->insert([
          'nombre' =>  'Deportes',
      ]);

      DB::table('subcategorias')->insert([
            'nombre' => 'Televisores y audio',
            'categoria_id' => 9,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Computadoras y notebooks',
            'categoria_id' => 9,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Consolas y videojuegos',
            'categoria_id' => 9,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Camaras digitales y accesorios',
            'categoria_id' => 9,
      ]);
      //// CAT 2

      DB::table('subcategorias')->insert([
            'nombre' => 'Telefonos y smartphones',
            'categoria_id' => 10,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Tablets y Ipads',
            'categoria_id' => 10,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Accesorios',
            'categoria_id' => 10,
      ]);

      /// CAT 3
      DB::table('subcategorias')->insert([
            'nombre' => 'Muebles interiores',
            'categoria_id' => 11,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Decoracion y accesorios',
            'categoria_id' => 11,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Electrodomesticos',
            'categoria_id' => 11,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Antiguedades',
            'categoria_id' => 11,
      ]);

      /// cat 4
      DB::table('subcategorias')->insert([
            'nombre' => 'Carpinteria',
            'categoria_id' => 12,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Ferreteria',
            'categoria_id' => 12,
      ]);

      /// cat 5

      DB::table('subcategorias')->insert([
            'nombre' => 'Ropa y calzado',
            'categoria_id' => 13,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Joyas y accesorios',
            'categoria_id' => 13,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Belleza',
            'categoria_id' => 13,
      ]);
      //cat 6
      DB::table('subcategorias')->insert([
            'nombre' => 'Musica',
            'categoria_id' => 14,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Libros y revistas',
            'categoria_id' => 14,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Instrumentos musicales',
            'categoria_id' => 14,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'CDs y DVDs',
            'categoria_id' => 14,
      ]);
//   cat 7
      DB::table('subcategorias')->insert([
            'nombre' => 'Bicicletas, skates y rollers',
            'categoria_id' => 15,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Futbol',
            'categoria_id' => 15,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Tennis',
            'categoria_id' => 15,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Deportes acuaticos',
            'categoria_id' => 15,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Otros deportes',
            'categoria_id' => 15,
      ]);
      DB::table('subcategorias')->insert([
            'nombre' => 'Accesorios e indumentaria',
            'categoria_id' => 15,
      ]);
    }
}
