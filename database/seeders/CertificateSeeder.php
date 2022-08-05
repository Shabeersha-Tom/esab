<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=CertificateSeeder
        \App\Models\Certificates\Certificate::factory(10000)->create();
    }
}
