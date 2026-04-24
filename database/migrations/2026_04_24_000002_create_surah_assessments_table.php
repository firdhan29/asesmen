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
        Schema::create('surah_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('surah_name');
            $table->enum('mastery_status', ['SL', 'L', 'C', 'BL'])->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            $table->unique(['student_id', 'surah_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surah_assessments');
    }
};
