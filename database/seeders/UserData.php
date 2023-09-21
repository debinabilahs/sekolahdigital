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
                'name' => 'Superadmin',
                'username' => 'superadmin',
                'password' => bcrypt('123456'),
                'level' => 1,
                'email' => 'superadmin@gmail.com',
                'blokir' => 'N',
                'no_hp' => '08123456789',
                'status' => 'superadmin',
            ],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'level' => 2,
                'email' => 'admin@gmail.com',
                'blokir' => 'N',
                'no_hp' => '08123456789',
                'status' => 'admin',
            ],
            [
                'name' => 'Guru',
                'username' => 'guru',
                'password' => bcrypt('123456'),
                'level' => 3,
                'email' => 'guru@gmail.com',
                'blokir' => 'N',
                'no_hp' => '08123456789',
                'status' => 'guru',

            ],
        ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
