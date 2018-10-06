<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run(){
      User::create([
        'name' => 'Maria',
        'email' => 'mariajoseguilarte@gmail.com',
        'password' => bcrypt(123456)
      ]);
      
      User::create([
        'name' => 'David',
        'email' => 'davidguilarte7@gmail.com',
        'password' => bcrypt(123456)
      ]);
      
      User::create([
        'name' => 'Pepe',
        'email' => 'pepe@gmail.com',
        'password' => bcrypt(123456)
      ]);
      
      User::create([
        'name' => 'Berta',
        'email' => 'berta@gmail.com',
        'password' => bcrypt(123456)
      ]);
    }
}
