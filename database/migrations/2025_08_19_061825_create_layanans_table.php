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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_layanan')->constrained('jenis_layanans')->onDelete('cascade');
            $table->string('nomor');
            $table->string('nama');
            $table->string('tempat');
            $table->date('tanggal');
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha'])->default('islam');
            $table->string('nik');
            $table->string('pekerjaan')->nullable();
            $table->enum('status_perkawinan', ['Kawin','Belum Kawin','Cerai Hidup','Cerai Mati']);
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->text('alamat');
            $table->text('keperluan')->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->string('tempat_meninggal')->nullable();
            $table->string('penyebab_meninggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
