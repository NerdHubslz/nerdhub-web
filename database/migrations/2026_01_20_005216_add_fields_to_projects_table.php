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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('status')->default('Em andamento');
            $table->string('client_type')->nullable(); // Curso, Empresa, etc.
            $table->integer('member_count')->default(0);
            $table->date('start_date')->nullable();
            $table->json('technologies')->nullable();
            $table->integer('progress')->default(0);
            $table->string('client_name')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['status', 'client_type', 'member_count', 'start_date', 'technologies', 'progress', 'client_name', 'image']);
        });
    }
};