<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->date('production_date');
            $table->integer('produced_qty')->default(0);
            $table->integer('defect_qty')->default(0);
            $table->string('remarks')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->foreignId('line_id')->constrained('production_lines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
