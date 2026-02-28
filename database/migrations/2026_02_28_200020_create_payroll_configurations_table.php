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
        Schema::create('payroll_configurations', function (Blueprint $table) {
            $table->id();
            // Link to the specific company
            $table->unsignedBigInteger('company_id');

            // 1. Benefit / Deduction
            $table->enum('component_type', ['BENEFIT', 'DEDUCTION']);

            // 2. Benefit / Deduction Name
            $table->string('name'); // e.g., "House Rent Allowance", "Provident Fund"

            // 3. Value Type
            $table->enum('value_type', ['FIXED', 'PERCENTAGE']);

            // Conditional: Fixed Amount
            $table->decimal('fixed_amount', 10, 2)->nullable();

            // Conditional: Percentage Details
            $table->decimal('percentage_value', 5, 2)->nullable(); // e.g., 12.50

            // 4. Select Payroll Heads (Stores an array of IDs this percentage applies to)
            $table->json('percentage_of_heads')->nullable();

            // 5. Attendance Type
            $table->enum('attendance_type', ['ON_ATTENDANCE', 'FLAT_RATE'])->default('ON_ATTENDANCE');

            $table->string('applicable_months_years')->nullable(); // e.g., "JAN-2024, FEB-2024" or "ALL"

            $table->timestamps();
            $table->softDeletes(); // Enables soft deletes

            // Foreign Key Constraint
            $table->foreign('company_id')
                  ->references('id')
                  ->on('companies')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_configurations');
    }
};
