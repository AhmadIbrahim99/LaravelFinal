<?php

use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CourseType::class, 15)->create();
    }
}
/*Ahmad Ibrahim*/
