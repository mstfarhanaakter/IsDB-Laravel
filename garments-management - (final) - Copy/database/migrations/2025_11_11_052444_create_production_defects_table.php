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
        Schema::create('production_defects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_id')->constrained('productions')->onDelete('cascade');
            $table->string('defect_type');
            $table->integer('defect_qty')->default(0);
            $table->string('reported_by')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->enum('status', ['pending', 'reworked', 'scrapped'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_defects');
    }
};
