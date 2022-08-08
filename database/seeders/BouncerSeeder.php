<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Bouncer;
use Illuminate\Support\Facades\Hash;

class BouncerSeeder extends Seeder
{
    // php artisan db:seed --class=BouncerSeeder
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = Bouncer::role()->firstOrCreate([
        //     'name' => 'manager',
        //     'title' => 'manager',
        // ]);

        // Bouncer::allow('superadmin')->everything();

        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-list',
            'title' => 'List Admin Role',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-view',
            'title' => 'View Admin Role',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-add',
            'title' => 'Add Admin Role',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-edit',
            'title' => 'Edit Admin Role',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-delete',
            'title' => 'Edit Admin Delete',
        ]);


        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-user-list',
            'title' => 'List Admin Users',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-user-view',
            'title' => 'View Admin User',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-user-add',
            'title' => 'Add Admin User',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-user-edit',
            'title' => 'Edit Admin User',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-user-delete',
            'title' => 'Delete Admin User',
        ]);

        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'certificates-list',
            'title' => 'List Certificates',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'certificates-view',
            'title' => 'View Certificate',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'certificates-add',
            'title' => 'Add Certificate',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'certificates-delete',
            'title' => 'Delete Certificate',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'certificates-export',
            'title' => 'Export Certificate',
        ]);

        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'dashboard',
            'title' => 'Dashboard',
        ]);

        // $user = User::create([
        //     'name' => 'Manager',
        //     'email' => 'manager@esab.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $user = User::find(1);
        // $user->assign('superadmin');
    }
}
