<?php

use Illuminate\Database\Seeder;

class AboutSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AboutSection::create([
            'title'=>'WE GROW BRANDS',
            'description'=>'Ledra was founded with a single mission: to generate our clients more business. We provide the strategy, guidance and execution to grow and empower businesses of all sizes, in all categories.',
            'about_id'=>1
        ]);
        \App\Models\AboutSection::create([
            'title'=>'A GROUP EFFORT',
            'description'=>'It takes many minds to help a full-service marketing agency grow. At ledra , we mix our marketing expertise with our personal experiences and interests to create the best work possible.',
            'about_id'=>1
        ]);
    }
}
