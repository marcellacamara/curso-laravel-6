<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        /*
        User::create([
            'name' => 'Marcella Camara',
            'email' => 'marcella-camara@live.com',
            'password' => bcrypt('123456'),
        ]);
        */
    }
}
