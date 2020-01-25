<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('status')->default('Negeri', 'Swasta');
            $table->string('bidang')->default('SD', 'SMP', 'SMA', 'SMK', 'SLB');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
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
        Schema::dropIfExists('sekolahs');
    }
}
