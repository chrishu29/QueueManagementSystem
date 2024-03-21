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
        Schema::create('queueTable', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('queue')->default('0');
            $table->string('status');
            $table->integer('skipped')->default('0');
            $table->timestamps();
            $table->integer('wait_time')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queueTable');
    }
};
