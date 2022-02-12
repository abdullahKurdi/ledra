<?php

use Illuminate\Database\Seeder;

class WorkSectionListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\WorkSectionList::create([
            'description'=>'Market Positioning',
            'work_section_id'=>1
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'Go-to-market marketing strategy',
            'work_section_id'=>1
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'MARKETING PLANNING',
            'work_section_id'=>1
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'Marketing infrastructure',
            'work_section_id'=>1
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'Sales enablement',
            'work_section_id'=>1
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'Online / Offline channels',
            'work_section_id'=>1
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'Customers retention',
            'work_section_id'=>1
        ]);



        \App\Models\WorkSectionList::create([
            'description'=>'Dedicated marketing team',
            'work_section_id'=>2
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'End-to-end marketing ownership',
            'work_section_id'=>2
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'Day-to-day execution',
            'work_section_id'=>2
        ]);
        \App\Models\WorkSectionList::create([
            'description'=>'B2B MARKETING THAT DRIVES GROWTH',
            'work_section_id'=>2
        ]);
    }
}
