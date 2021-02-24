<?php

use Illuminate\Database\Seeder;

class CreateFirstAdminForAdminsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create(['id' => 1,'name' => 'Muhammad Nabeel Siddiqui',
            'email' =>'nabeel.siddiqui@gmail.com',
            'email_verified_at' => '',
            'password' => bcrypt('123456'),
            ]);
    }
}
