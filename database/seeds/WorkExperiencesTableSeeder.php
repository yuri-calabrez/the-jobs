<?php

use Illuminate\Database\Seeder;

class WorkExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\WorkExperience::class, 5)->create();
    }
}
