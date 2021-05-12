<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rosidah, S.Pd',
            'username' => 'rosidah',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rosidah')
        ]);
    }
}
