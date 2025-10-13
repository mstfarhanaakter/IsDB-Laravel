<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('joining_date');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->string('designation');
            $table->decimal('salary', 10, 2)->default(0);
            $table->string('shift')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Terminated'])->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
