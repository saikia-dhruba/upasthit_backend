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
        Schema::create('employee_category_manager', function (Blueprint $table) {
            $table->id();

            // foreign keys to category and manager (employee_profile)
            $table->unsignedBigInteger('employee_category_id');
            $table->unsignedBigInteger('manager_id');

            $table->timestamps();

            $table->foreign('employee_category_id')
                  ->references('id')
                  ->on('employee_categories')
                  ->onDelete('cascade');

            $table->foreign('manager_id')
                  ->references('id')
                  ->on('employee_profiles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_category_manager');
    }
};
