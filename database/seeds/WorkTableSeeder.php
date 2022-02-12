<?php

use Illuminate\Database\Seeder;

class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Work::create([
            'description'=>'Ledra has delivered diverse sets of work for many different brands and clients. Take a look through some of our marketing and growth partners to get a feel for the work we create ,Our expertise team have over than 14 years of marketing experience with luxurious and vips clients in gulf area and mena region'
        ]);
    }
}
