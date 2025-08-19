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
        Schema::create('report_pc_tl_interviews', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('hr_id')->constrained('users')->onDelete('cascade');
            $table->foreignUlid('job_apply_id')->constrained('job_applies')->onDelete('cascade');

            $table->string('no_tes');
            $table->string('tujuan_tes');
            $table->date('tanggal_tes');
            $table->string('kota_tes');

            $table->integer('analytical_thinking');
            $table->integer('achievement_orientation');
            $table->integer('integrity');
            $table->integer('willingness_to_learn');
            $table->integer('self_confidence');
            $table->integer('adaptability');
            $table->integer('teamwork');
            $table->integer('interpersonal_skills');
            $table->integer('communication');
            $table->integer('knowledge');
            $table->integer('skill');

            $table->enum('hasil_seleksi', ['Sesuai', 'Dipertimbangkan', 'Ditolak']);
            $table->longText('catatan');
            $table->longText('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_pc_tl_interviews');
    }
};
