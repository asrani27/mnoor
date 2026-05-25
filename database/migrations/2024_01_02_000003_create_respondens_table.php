<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respondens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wilayah_id')->nullable()->constrained('wilayahs')->onDelete('cascade');
            $table->foreignId('layanan_id')->nullable()->constrained('layanans')->onDelete('cascade');
            $table->string('nama');
            $table->enum('jkel', ['L', 'P']);
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('telp');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respondens');
    }
};
