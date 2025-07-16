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
        Schema::create('jobs', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('category_id')->constrained('job_category')->onDelete('cascade');
            $table->string('jobs_name');
            $table->string('store_name');
            $table->string('type_work')->default('WFO - Full Time');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('city');
            $table->integer('open_position');
            $table->string('experience')->nullable();
            $table->integer('age');
            $table->string('education');
            $table->date('close_date');
            $table->string('status')->default('Open');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
