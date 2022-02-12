<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\About::create(['description'=>'We are a luxury branding and marketing agency based in jordan serving clients across the globe']);
    }
}
