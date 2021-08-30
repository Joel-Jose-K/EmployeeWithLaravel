<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DesignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Designation::factory(1)->create();
    }
}
