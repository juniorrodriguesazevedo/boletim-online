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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->enum('sex', ['M', 'F']);
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('street');
            $table->string('district');
            $table->string('number');
            $table->string('name_mother')->nullable();
            $table->string('name_father')->nullable();
            $table->string('phone_first');
            $table->string('phone_second')->nullable();
            $table->text('observation')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
