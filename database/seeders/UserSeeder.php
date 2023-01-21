<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Users::where('username', 'admin')->first()) {
            $user = Users::create([
                'name' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
