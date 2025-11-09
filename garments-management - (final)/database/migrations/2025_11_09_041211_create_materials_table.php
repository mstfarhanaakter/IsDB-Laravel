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
        Schema::create('materials', function (Blueprint $table) {
    $table->id();
    $table->foreignId('supplier_id')
          ->nullable()               // required for 'set null'
          ->constrained('suppliers')
          ->onDelete('set null');    // set supplier_id to null if supplier deleted
    $table->string('name');
    $table->string('unit');
    $table->decimal('current_stock', 10, 2)->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
