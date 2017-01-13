<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Televisor',
        'lastname' => 53,
        'email' => 9,
        'password' => 32,
        'suscAvisos' => 'images/teve.jpg',
        'suscOfertas' => date("Y-m-d H:i:s"),
        'suscActualizaciones' => '2016-12-12 15:45:00',
        'nacimiento' => 'Televisor 24"',
      ]);

    }
}
