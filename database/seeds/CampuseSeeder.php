<?php

use Illuminate\Database\Seeder;

class CampuseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Campuse::class, 5)->create();
    }
}
