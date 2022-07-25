<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->integer('certificate_no')->unique();
            $table->string('test')->nullable();
            $table->string('item_1')->nullable();
            $table->string('item_2')->nullable();
            $table->string('lot_1')->nullable();
            $table->string('lot_2')->nullable();
            $table->integer('views')->default(0);
            $table->integer('downloads')->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
