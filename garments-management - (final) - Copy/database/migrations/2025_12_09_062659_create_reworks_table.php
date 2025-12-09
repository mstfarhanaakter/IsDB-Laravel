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
         Schema::create('reworks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('defect_id')->constrained('defects')->onDelete('cascade');
        $table->string('rework_action');
        $table->date('rework_date');
        $table->text('remarks')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reworks');
    }
};
