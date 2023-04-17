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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('klien_id');
            $table->unsignedBigInteger('rekening_id');
            $table->string('nama_event')->nullable();
            $table->date('tanggal')->nullable();
            $table->double('dp')->default(0);

            // Field sementara
            $table->double('total_harga')->default(0);

            $table->text('keterangan')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');

            $table->foreign('klien_id')->references('id')->on('kliens')->onDelete('cascade');

            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
