<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        foreach (config('project.admin.roles') as $role) {
            Role::firstOrCreate([
                'guard_name' => 'admin',
                'name' => $role
            ]);
        };

        $admins = [
            [
                'role_id' => '1',
                'name' => 'Muhammad Nabeel Siddiqui',
                'email' => 'nabeel.siddiqui@gmail.com',
                'password' => 'secret',
                'phone' => '03361203778',
                'status' => '1',
            ],
            [
                'role_id' => '2',
                'name' => 'Atif Khan',
                'email' => 'atif.khan@gmail.com',
                'password' => 'secret',
                'phone' => '03361203778',
                'status' => '1',
            ],
            [
                'role_id' => '3',
                'name' => 'Muzzaffar Khan',
                'email' => 'muzzaffar.khan@gmail.com',
                'password' => 'secret',
                'phone' => '03361203778',
                'status' => '1',
            ],
        ];

        foreach ($admins as $admin) {
            $exist = Admin::where('email', $admin['email'])->first();
            if(empty($exist)){
                $super_admin = Admin::firstOrCreate([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'phone' => $admin['phone'],
                    'role_id' => $admin['role_id'],
                    'password' => bcrypt($admin['password']),
                    'status' => $admin['status'],
                ]);
                $super_admin->assignRole($admin['role_id']);
            }
        }
    }
}
