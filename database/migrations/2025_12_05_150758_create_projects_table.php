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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->string('client_type')->nullable(); // Curso, Empresa, etc.
            $table->date('start_date')->nullable();
            $table->json('technologies')->nullable();
            $table->integer('progress')->default(0);
            $table->string('client_name')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->json('documents')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
