<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
//        User::firstOrCreate([
//            'name' => config('project.seed.dev_name'),
//            'email' => config('project.seed.dev_email'),
//            'password' => bcrypt(config('project.seed.dev_password')),
//        ]);

        $users = [
            [
                'name' => 'Shahrukh Khan',
                'email' => 'shahrukh.khan@gmail.com',
                'password' => 'secret',
                'phone' => '03361203778',
                'status' => '1',
                'address' => 'Luckyone Mall',
            ],
            [

                'name' => 'Sanjay Dutt',
                'email' => 'sanjay.dutt@gmail.com',
                'password' => 'secret',
                'phone' => '03361203778',
                'status' => '1',
                'address' => 'Waterpump',
            ],
            [
                'name' => 'Muzzaffar Khan',
                'email' => 'muzzaffar.khan@gmail.com',
                'password' => 'secret',
                'phone' => '03361203778',
                'status' => '1',
                'address' => 'Karimabad',
            ],
        ];

        foreach ($users as $user) {
            $exist = User::where('email', $user['email'])->first();
            if(empty($exist)){
                $user = User::firstOrCreate([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'password' => bcrypt($user['password']),
                    'status' => $user['status'],
                    'address' => $user['address'],
                ]);
            }
        }


    }
}
