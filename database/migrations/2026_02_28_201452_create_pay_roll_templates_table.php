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
        Schema::create('payroll_templates', function (Blueprint $table) {
            $table->id();

            // Link to the specific company
            $table->unsignedBigInteger('company_id');

            // 1. Template Name
            $table->string('template_name'); // e.g., "Standard Executive Package"

            // 2. Salary Type
            $table->enum('basic_salary_type', ['FIXED', 'PERCENTAGE'])->default('PERCENTAGE');

            // 3. Value/Percentage
            $table->decimal('basic_salary_value', 10, 2);

            // 4. NEW: Store the IDs of the selected Benefits & Deductions
            $table->json('assigned_configurations')->nullable();

            $table->timestamps();
            $table->softDeletes(); // Enables soft deletes

            // Foreign Key Constraint
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Fixed typo here! (was pay_roll_templates)
        Schema::dropIfExists('payroll_templates');
    }
};
