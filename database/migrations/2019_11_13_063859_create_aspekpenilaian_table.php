<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspekpenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspekpenilaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedInteger('unitkerja_id');
            $table->string('nama');
            $table->nullableInteger('plan');
            $table->nullableInteger('pencapaian');
            $table->rememberToken();
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
        Schema::dropIfExists('aspekpenilaian');
    }
}
