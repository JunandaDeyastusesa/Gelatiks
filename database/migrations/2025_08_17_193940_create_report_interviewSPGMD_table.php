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

        Schema::create('report_spg_md_interviews', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('hr_id')->constrained('users')->onDelete('cascade');
            $table->foreignUlid('job_apply_id')->constrained('job_applies')->onDelete('cascade');

            $table->date('tanggal_tes');
            $table->string('kota_tes');

            // --- PENAMPILAN ---
            $table->tinyInteger('penampilan_sopan_rapi');
            $table->tinyInteger('penampilan_sesuai_posisi');
            $table->tinyInteger('penampilan_pede');
            $table->text('catatan_penampilan')->nullable();

            // --- KOMUNIKASI ---
            $table->tinyInteger('komunikasi_baik');
            $table->tinyInteger('komunikasi_runtut');
            $table->tinyInteger('komunikasi_tegas');
            $table->text('catatan_komunikasi')->nullable();

            // --- PENDIDIKAN ---
            $table->tinyInteger('pendidikan_sesuai');
            $table->text('catatan_pendidikan')->nullable();

            // --- LATAR BELAKANG ---
            $table->tinyInteger('latar_tempat_tinggal');
            $table->tinyInteger('latar_penempatan');
            $table->tinyInteger('latar_kesehatan');
            $table->tinyInteger('latar_hukum');
            $table->text('catatan_latar')->nullable();

            // --- SKILL ---
            $table->tinyInteger('skill_sesuai');
            $table->tinyInteger('skill_koordinasi');
            $table->tinyInteger('skill_negosiasi');
            $table->tinyInteger('skill_aplikasi');
            $table->text('catatan_skill')->nullable();

            // --- KNOWLEDGE ---
            $table->tinyInteger('knowledge_pekerjaan');
            $table->tinyInteger('knowledge_tugas');
            $table->tinyInteger('knowledge_team');
            $table->tinyInteger('knowledge_pressure');
            $table->tinyInteger('knowledge_digital');
            $table->text('catatan_knowledge')->nullable();

            // --- ATTITUDE ---
            $table->tinyInteger('attitude_posisi');
            $table->tinyInteger('attitude_kritikan');
            $table->tinyInteger('attitude_positif');
            $table->text('catatan_attitude')->nullable();

            // --- MOTIVASI ---
            $table->tinyInteger('motivasi_target');
            $table->tinyInteger('motivasi_tujuan');
            $table->tinyInteger('motivasi_suasana');
            $table->text('catatan_motivasi')->nullable();

            // --- EXPERIENCE ---
            $table->tinyInteger('exp_ilmu');
            $table->tinyInteger('exp_posisi');
            $table->tinyInteger('exp_alasan');
            $table->text('catatan_experience')->nullable();

            // --- TAMBAHAN ---
            $table->enum('bpjs', ['Ya', 'Tidak']);
            $table->text('catatan_bpjs')->nullable();

            $table->enum('alat_ada', ['Ya', 'Tidak']);
            $table->enum('alat_beli', ['Ya', 'Tidak']);
            $table->text('catatan_alat')->nullable();

            // --- Kesimpulan ---
            $table->enum('hasil_seleksi', ['Sesuai', 'Dipertimbangkan', 'Ditolak']);
            $table->longText('catatan')->nullable();
            $table->longText('ket')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_spg_md_interviews');
    }
};
