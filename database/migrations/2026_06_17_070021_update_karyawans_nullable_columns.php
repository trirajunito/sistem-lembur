<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->string('nik')->nullable()->change();
            $table->string('jabatan')->nullable()->change();
            $table->string('divisi')->nullable()->change();
            $table->text('alamat')->nullable()->change();
            $table->string('no_hp')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->string('nik')->nullable(false)->change();
            $table->string('jabatan')->nullable(false)->change();
            $table->string('divisi')->nullable(false)->change();
            $table->text('alamat')->nullable(false)->change();
            $table->string('no_hp')->nullable(false)->change();
        });
    }
};