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
        User::create([
            'name' => 'Admin-Sistemas',
            'email' => 'root@root',
            'ROLE' => 'Root',
            'password' => bcrypt('c4r4c4s2020')
        ]);
		User::create([
            'name' => 'Sistemas y Desarrollo',
            'email' => 'sdmppaa@minaguas.gob.ve',
            'ROLE' => 'Admin',
            'password' => bcrypt('c4r4c4s2020')
        ]);
        User::create([
            'name' => 'Katherin Martinez',
            'email' => 'kmartinez@minaguas.gob.ve',
            'ROLE' => 'User',
            'password' => bcrypt('kmar*18')
        ]);
        User::create([
            'name' => 'user Martinez',
            'email' => 'user@user.ve',
            'ROLE' => 'User',
            'password' => bcrypt('user')
        ]);
        User::create([
            'name' => 'Karina Florez',
            'email' => 'kflorez@minaguas.gob.ve',
            'ROLE' => 'Admin',
            'password' => bcrypt('kflor*2020')
        ]);
		 User::create([
            'name' => 'Nelson Zambrano',
            'email' => 'nzambrano@minaguas.gob.ve',
            'ROLE' => 'Admin',
            'password' => bcrypt('nzam*2020')
        ]);
    }
}
