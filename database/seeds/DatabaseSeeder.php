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

        $this->call(SchoolSeeder::class);
        $this->call(CampuseSeeder::class);
		$this->call(TypeSeeder::class);
		$this->call(CourseSeeder::class);
        $this->call(CourseTypeSeeder::class);

    }
}
