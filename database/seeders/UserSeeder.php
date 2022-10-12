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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            // 'id_role' => 'admin',
            'password' => bcrypt('12345'),
            'email_verified_at' => now()
        ])->assignRole('admin');

        User::create([
            'name' => 'bidan',
            'email' => 'bidan@gmail.com',
            // 'id_role'=>'bidan',
            'password' => bcrypt('12345'),
            'email_verified_at' => now()
        ])->assignRole('bidan');

        User::create([
            'name' => 'pengunjung',
            'email' => 'pengunjung@gmail.com',
            // 'id_role'=>'pengunjung',
            'password' => bcrypt('12345'),
            'email_verified_at' => now()
        ])->assignRole('pengunjung');


    }
}
