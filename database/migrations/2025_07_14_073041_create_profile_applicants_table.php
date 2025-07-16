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
        Schema::create('profile_applicants', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignUlid('category_id')->constrained('job_category')->onDelete('cascade');
            $table->string('namaLengkap');
            $table->string('kelahiran');
            $table->string('kelamin');
            $table->string('telp');
            $table->string('pendidikan');
            $table->string('domisili');
            $table->string('pengKerja1');
            $table->string('pengKerja2')->nullable();
            $table->string('pengKerja3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_applicants');
    }
};
