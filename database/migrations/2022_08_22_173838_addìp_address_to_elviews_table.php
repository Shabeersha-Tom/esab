<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddìpAddressToElviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elviews', function (Blueprint $table) {
            $table->ipAddress('ip_address')->nullable()->after('visitor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elviews', function (Blueprint $table) {
            $table->dropColumn('ip_address');
        });
    }
}
