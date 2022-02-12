<?php

use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Home::create([
            'title'=>'WHO WE ARE',
            'description'=>'We are an entire marketing team under one roof and our mission is to help you deliver on your promise. Our experiefAll the company’s employees have hospitality and marketing experience, and this makes our company have the full strength to understand the product we are working on marketing. The company has a dnced, versatile ledra team thrives on meeting the most demanding go-to-market challenges with agile marketing execution and under rigorous deadlines

We are a luxury marketing agency that works for globally recognised brands with our areas of expertise ranging from tourism and travel, to Hospitality.

Ledra is a B2B marketing agency specializing in go-to-market strategy and execution for traveling and tourism agencies looking to scale in the global market'
        ]);
    }
}
