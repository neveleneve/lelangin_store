<?php

use App\kyc;
use Illuminate\Database\Seeder;

class KYCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kyc::insert([
            [
                'username' => 'nivaliniva',
                'status' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
