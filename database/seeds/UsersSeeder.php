<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'mohammad farid hasymi',
                'username' => 'neveleneve',
                'email' => 'admin@lelangin.store',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'kyc' => 0,
                'password' => Hash::make('neveleneve'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],            
            [
                'name' => 'mohammad firdiansyah',
                'username' => 'nivaliniva',
                'email' => 'pandupandu813@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'kyc' => 0,
                'password' => Hash::make('vdpandu123'),
                'role' => 'user',
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
