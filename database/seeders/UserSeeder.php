<?php

namespace Database\Seeders;

// database/seeders/UsersTableSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // User::create([
        //     'name' => 'Administrator',
        //     'email' => 'absenadmin@gmail.com',
        //     'password' => Hash::make('absenmin'),
        //     'role' => 'admin'
        // ]);

        User::create([
            'name' => 'Pembimbing Siswa',
            'email' => 'pembimbingSiswa@gmail.com',
            'password' => Hash::make('psabsen'),
            'role' => 'ps'
        ]);
    }
}