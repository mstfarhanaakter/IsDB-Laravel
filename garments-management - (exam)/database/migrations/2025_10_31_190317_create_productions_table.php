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
            $table->string('order_no'); // Order number
            $table->date('production_date'); // Production date
            $table->integer('planned_qty')->default(0); // Planned quantity for progress calculation
            $table->integer('produced_qty')->default(0); // Produced quantity
            $table->integer('defect_qty')->default(0); // Defective quantity
            $table->text('remarks')->nullable(); // Optional remarks
            $table->boolean('is_completed')->default(false); // Completion status
            $table->foreignId('line_id')->constrained('production_lines')->onDelete('cascade'); // Relation to production line
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
