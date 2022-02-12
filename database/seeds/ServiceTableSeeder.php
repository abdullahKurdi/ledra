<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Service::create([
            'name'=>'name',
            'img'=>'service1.png',
            'description'=>' Combining a deep-rooted understanding of luxury, ledra  creates beautiful Social and Digital content for its clients. We also enhance the consumer experience through the use of leading edge marketing and technology',
        ]);
        \App\Models\Service::create([
            'name'=>'name',
            'img'=>'service1.png',
            'description'=>'While our agency is in Jordan , ledra  clients are based across the globe, and we therefore employ channels that build awareness and engagement in each territory covered in each marketing plan',
        ]);
        \App\Models\Service::create([
            'name'=>'name',
            'img'=>'service1.png',
            'description'=>'We are no stranger to more traditional above-the-line media, and where relevant we will integrate both traditional and digital campaign elements in a fully-harmonised way, ensuring that the benefits of each medium are used to the full.',
        ]);
        \App\Models\Service::create([
            'name'=>'name',
            'img'=>'service1.png',
            'description'=>'  So, at the same time as optimising the use of platforms and analytics, we never lose sight of the primary need to create content that earns the right for the brand to compete at the leading edge of luxury.',
        ]);
        \App\Models\Service::create([
            'name'=>'name',
            'img'=>'service1.png',
            'description'=>'That said, when using digital media we will fully optimise your campaign using a metrics-based approach answers that to pre-defined KPIs',
        ]);
        \App\Models\Service::create([
            'name'=>'name',
            'img'=>'service1.png',
            'description'=>'We recognise that there are many great digital agencies for you to work with. Lerda’s  difference is a virtually obsessive attention to ensuring that your content will be perfectly attuned to the luxury consumer’s headspace.',
        ]);
    }
}
