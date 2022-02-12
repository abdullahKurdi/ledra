<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contact::create([
            'address'=>'address',
            'phone'=>'phone',
            'email'=>'email',
            'latitude'=>'11111',
            'longitude'=>'1111',
        ]);
    }
}
