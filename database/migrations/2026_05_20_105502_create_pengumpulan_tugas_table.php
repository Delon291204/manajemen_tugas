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
        Schema::create('pengumpulan_tugas', function (Blueprint $table) {
           $table->id();
            $table->foreignId('id_tugas')->constrained('tugas')->onDelete('cascade');
            $table->foreignId('id_mahasiswa')->constrained('users')->onDelete('cascade');
            $table->string('file_tugas');
            $table->text('catatan')->nullable();
            $table->dateTime('tanggal_kumpul');
            $table->enum('status', ['dikumpulkan', 'terlambat', 'belum dinilai']);
            $table->integer('nilai')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan_tugas');
    }
};
