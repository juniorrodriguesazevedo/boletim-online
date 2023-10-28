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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('class_room_id')->constrained();
            $table->foreignId('discipline_id')->constrained();
            $table->decimal('note1', 3, 1)->nullable();
            $table->decimal('note2', 3, 1)->nullable();
            $table->decimal('note3', 3, 1)->nullable();
            $table->decimal('note4', 3, 1)->nullable();
            $table->integer('lack1')->nullable();
            $table->integer('lack2')->nullable();
            $table->integer('lack3')->nullable();
            $table->integer('lack4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
