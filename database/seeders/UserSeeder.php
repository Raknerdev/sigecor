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
            'name' => 'Sistemas',
            'email' => 'sistema@sis.gob.ve',
            'ROLE' => 'Root',
            'password' => bcrypt('c4r4c4s')
        ]);
       
    }
}
