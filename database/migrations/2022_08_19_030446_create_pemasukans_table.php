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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->enum('sumber' , ['lm' , 'Client']);
            $table->unsignedBigInteger('klien_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->float('nominal');
            $table->text('keterangan');

            $table->foreign('klien_id')->references('id')->on('kliens')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

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
        Schema::dropIfExists('pemasukans');
    }
};
