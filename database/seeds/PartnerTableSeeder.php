<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Partner::create([
            'name'=>'MAD',
            'img'=>'https://i.postimg.cc/QxPJ8hXy/brand-1.png'
        ]);
        \App\Models\Partner::create([
            'name'=>'MAD',
            'img'=>'https://i.postimg.cc/pdMQjC5Q/brand-2.png'
        ]);
        \App\Models\Partner::create([
            'name'=>'MAD',
            'img'=>'https://i.postimg.cc/B6qxYvgX/brand-3.png'
        ]);
        \App\Models\Partner::create([
            'name'=>'MAD',
            'img'=>'https://i.postimg.cc/d14GzKHn/brand-4.png'
        ]);
        \App\Models\Partner::create([
            'name'=>'MAD',
            'img'=>'https://i.postimg.cc/x8ZM13Sz/brand-5.png'
        ]);
        \App\Models\Partner::create([
            'name'=>'MAD',
            'img'=>'https://i.postimg.cc/B6qxYvgX/brand-3.png'
        ]);

    }
}
