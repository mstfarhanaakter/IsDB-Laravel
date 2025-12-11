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
        Schema::create('inspections', function (Blueprint $table) {
        $table->id();
        $table->foreignId('production_id')->constrained('productions')->onDelete('cascade');
        $table->string('inspector_name');
        $table->date('inspection_date');
        $table->text('remarks')->nullable();
        $table->enum('status', ['pending', 'passed', 'failed'])->default('pending');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
