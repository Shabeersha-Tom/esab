<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Bouncer;

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
        //     'name' => 'superadmin',
        //     'title' => 'Super Admin',
        // ]);

        // Bouncer::allow('superadmin')->everything();

        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-list',
            'title' => 'View Admin Role',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-role-list',
            'title' => 'View Admin Role',
        ]);

        // $user = User::find(1);
        // $user->assign('superadmin');
    }
}
