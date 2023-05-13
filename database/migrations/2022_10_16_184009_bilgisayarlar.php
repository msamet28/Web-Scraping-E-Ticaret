<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dizüstü', function (Blueprint $table) {
            $table->id();
            $table->string("marka");
            $table->string("ad");
            $table->float("fiyat");
            $table->float("rating");
            $table->string("modelno");
            $table->string("isletimsistemi");
            $table->string("islemcitipi");
            $table->string("islemcinesli");
            $table->string("ram");
            $table->string("ekran");
            $table->string("magaza");
            $table->string("link");
            $table->string("resimlinki");

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
        Schema::dropIfExists('Dizüstü');
    }
};
