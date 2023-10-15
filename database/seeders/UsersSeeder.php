<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'firstName'=> 'Rodrigo',
        'lastName'=>'Denner',
        'email'=>'rodrigo@email.com',
        'password'=>bcrypt('123456'),
      ]);
    }//php artisan make:seeder UserSeeder
}
