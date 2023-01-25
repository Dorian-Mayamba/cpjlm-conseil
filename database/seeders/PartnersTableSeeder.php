<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partners;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partners::factory()
        ->count(10)
        ->create();
    }
}
