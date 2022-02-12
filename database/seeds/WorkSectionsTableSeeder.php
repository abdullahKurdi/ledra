<?php

use Illuminate\Database\Seeder;

class WorkSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\WorkSection::create([
            'title'=>'MARKETING STRATEGY:',
            'work_id'=>1
        ]);
        \App\Models\WorkSection::create([
            'title'=>'MARKETING MANAGEMENT AS A SERVICE:',
            'work_id'=>1
        ]);
    }
}
