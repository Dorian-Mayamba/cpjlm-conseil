<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     if(User::all()->count()<1){
         User::factory()->create([
             'name' => 'dorian',
             'email' => 'dorian.cpjlm-conseil@admin.com',
             'password' => Hash::make('123123'),
             'role_id' => 1
         ]);
     }

     User::factory()->create([
        'name' => 'Jean-Louis',
        'email'=> 'jlmayamba@cpjlm-conseil.com',
        'password' => Hash::make('SSIAP@nterre_01'),
        'role_id' => 1
    ]);

 }
}
