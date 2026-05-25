<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('respondens', function (Blueprint $table) {
            $table->foreignId('wilayah_id')->nullable()->change();
            $table->foreignId('layanan_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('respondens', function (Blueprint $table) {
            $table->foreignId('wilayah_id')->change();
            $table->foreignId('layanan_id')->change();
        });
    }
};
