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
            $table->string('template_name'); // e.g., "Standard Executive Package", "Intern Stipend"

            // 2. Salary Type
            $table->enum('basic_salary_type', ['FIXED', 'PERCENTAGE'])->default('PERCENTAGE');

            // 3. Value/Percentage (If PERCENTAGE, this is % of CTC. If FIXED, this is a flat amount)
            $table->decimal('basic_salary_value', 10, 2);


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
        Schema::dropIfExists('pay_roll_templates');
    }
};
