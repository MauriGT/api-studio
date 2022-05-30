<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' =>'Mauricio Toloza',
            'email'=>'mauriciogtoloza@gmail.com',
            'password'=>Hash::make('123123123')
        ]);

        User::factory(99)->create();
    }
}
