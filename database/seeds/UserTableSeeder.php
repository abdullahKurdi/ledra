<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'superAdmin','email'=>'kurdi313@gmail.com','password'=>bcrypt('12345678'),]);
        User::create(['name'=>'superAdmin','email'=>'feras@ledra-co.com','password'=>bcrypt('12345678'),]);
        User::create(['name'=>'superAdmin','email'=>'sanaa@ledra-co.com','password'=>bcrypt('12345678'),]);
    }
}
