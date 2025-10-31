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
        Schema::create('stocktransactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained('rawmaterials')->onDelete('cascade');
            $table->enum('type', ['IN', 'OUT']);
            $table->decimal('quantity', 15, 2)->default(0);
            $table->date('transaction_date');
            $table->string('reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocktransactions');
    }
};
