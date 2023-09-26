<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'level' => 1,
                'email' => 'admin@gmail.com',
                'blokir' => 'N',
                'no_hp' => '08123456789',
                'status' => 'admin',
            ],
            [
                'name' => 'Guru',
                'username' => 'guru',
                'password' => bcrypt('123456'),
                'level' => 2,
                'email' => 'guru@gmail.com',
                'blokir' => 'N',
                'no_hp' => '08123456789',
                'status' => 'guru',

            ],
            [
                'name' => 'Siswa',
                'username' => 'siswa',
                'password' => bcrypt('123456'),
                'level' => 3,
                'email' => 'siswa@gmail.com',
                'blokir' => 'N',
                'no_hp' => '08123456789',
                'status' => 'siswa',

            ],
        ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
