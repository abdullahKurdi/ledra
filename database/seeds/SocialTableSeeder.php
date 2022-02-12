<?php

use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Social::create([
            'facebook'=>'facebook',
            'instagram'=>'instagram',
            'twitter'=>'twitter',
            'whatsapp'=>'whatsapp',
            'linkedin'=>'linkedin',
            'snapchat'=>'snapchat'
        ]);
    }
}
