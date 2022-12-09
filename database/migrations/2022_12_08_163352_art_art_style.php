<?php

use App\Models\Style;
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
        //
        Schema::create('art_style', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('style_id');
            $table->unsignedBigInteger('art_id');

            $table->foreign('style_id')->references('id')->on('styles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('art_id')->references('id')->on('art')->onUpdate('cascade')->onDelete('cascade');
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
        //
    }
};
