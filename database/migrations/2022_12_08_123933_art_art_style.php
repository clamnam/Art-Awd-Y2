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
        Schema::create('art_art_style', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('art_style_id');
            $table->unsignedBigInteger('art_id');

            $table->foreign('art_style_id')->references('id')->on('art_styles')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('art_id')->references('id')->on('art')->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });
        // Schema::table('art_art_style', function ($table) {
        //     $table->foreign('art_style_id')->references('id')->on('art_styles')->onUpdate('cascade')->onDelete('restrict');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('art_art_style');
    }
};
