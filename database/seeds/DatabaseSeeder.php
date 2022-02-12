<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
        $this->call(AboutTableSeeder::class);
        $this->call(AboutSectionsTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(HomeTableSeeder::class);
        $this->call(PartnerTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(PurposeTableSeeder::class);
        $this->call(SocialTableSeeder::class);
        $this->call(ValueTableSeeder::class);
        $this->call(WorkTableSeeder::class);
        $this->call(WorkSectionsTableSeeder::class);
        $this->call(WorkSectionListsTableSeeder::class);
    }
}
