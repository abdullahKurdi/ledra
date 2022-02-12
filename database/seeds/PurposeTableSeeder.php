<?php

use Illuminate\Database\Seeder;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Purpose::create([
            'title'=>'THE WORK COMES FIRST',
            'description'=>'Sure, we love a good time as much as the next person, especially if that next person is pretty cool. But, our central purpose is to move the needle for brands and companies that want to take things in a new direction'
        ]);
    }
}
