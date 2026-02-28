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
        Schema::create('employee_profile_payroll_configuration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_profile_id');
            $table->unsignedBigInteger('payroll_configuration_id');
            $table->timestamps();

            $table->foreign('employee_profile_id', 'fk_eppc_emp')
                  ->references('id')
                  ->on('employee_profiles')
                  ->onDelete('cascade');

            $table->foreign('payroll_configuration_id', 'fk_eppc_pay')
                  ->references('id')
                  ->on('payroll_configurations')
                  ->onDelete('cascade');

            $table->unique(['employee_profile_id', 'payroll_configuration_id'], 'emp_payroll_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profile_payroll_configuration');
    }
};
