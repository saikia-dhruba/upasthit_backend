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
        Schema::create('employee_categories', function (Blueprint $table) {
            $table->id();
            // Link the category to a specific company
            $table->unsignedBigInteger('company_id');

            // 1. Category Name
            $table->string('name'); // e.g., "Permanent", "Contractor", "Intern"

            // timestamps and soft deletes
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key Constraints
            $table->foreign('company_id')
                  ->references('id')
                  ->on('companies')
                  ->onDelete('cascade'); // Delete categories if the company is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_categories');
    }
};
