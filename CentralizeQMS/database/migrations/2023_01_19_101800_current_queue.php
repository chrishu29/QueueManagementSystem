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
        Schema::create('currentQueue', function (Blueprint $table) {
            $table->id();
            $table->string('QType');
            $table->string('QName');
            $table->integer('TotalQueue');
            $table->integer('SkippedQueue');
            $table->integer('DoneQueue');
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
        Schema::dropIfExists('currentQueue');
    }
};
