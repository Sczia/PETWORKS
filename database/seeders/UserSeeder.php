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
        $data =        [
            ['name' => 'Owner', 'roles' => 'Owner', 'email' => 'owner@app.com', 'password' => Hash::make('password')],
            ['name' => 'Secretary', 'roles' => 'Secretary', 'email' => 'secretary@app.com', 'password' => Hash::make('password')],
            ['name' => 'Doctor', 'roles' => 'Doctor', 'email' => 'doctor@app.com', 'password' => Hash::make('password')],
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
