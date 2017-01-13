<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 10; $i++) {
        DB::table('productos')->insert([
          'nombre' => 'Televisor',
          'user_id' => 53,
          'categoria_id' => 9,
          'subcategoria_id' => 32,
          'ruta_imagen' => 'images/teve.jpg',
          'fecha_inicio' => date("Y-m-d H:i:s"),
          'fecha_cierre' => '2016-12-12 15:45:00',
          'descripcion' => 'Televisor 24"',
        ]);
      }
    }
}
