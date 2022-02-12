<?php

use Illuminate\Database\Seeder;

class ValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Value::create([
            'title'=>'INTEGRITY',
            'description'=>'Our customers’ trust is invaluable, and we do everything in our power to cherish it.'
        ]);
        \App\Models\Value::create([
            'title'=>'DEDICATION',
            'description'=>'Rain or shine, we are there for our customers on a daily basis.'
        ]);
        \App\Models\Value::create([
            'title'=>'QUALITY',
            'description'=>'We do not compromise on the quality of our delivery, no matter the budget'
        ]);
    }
}
