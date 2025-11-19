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
        Schema::create('employee_salaries', function (Blueprint $table) {
    $table->id();
    $table->foreignId('employee_id')->constrained()->onDelete('cascade');
    $table->string('month'); // e.g., 'November'
    $table->integer('year');

    $table->double('basic');
    $table->double('house_rent');
    $table->double('medical');
    $table->double('transport');
    $table->double('overtime_amount');
    $table->double('absent_deduction');
    $table->double('gross_salary');
    $table->double('net_salary');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
