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
        Schema::create('company_shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Links shift to a specific business

            // 1. Shift Name & Core Timings
            $table->string('shift_name'); // e.g., "Morning Shift", "Night Guard"
            $table->time('shift_start_time');
            $table->time('shift_end_time');

            // 2. Punch In Rules
            $table->enum('punch_in_rule', ['ANYTIME', 'LIMIT'])->default('ANYTIME');
            $table->time('punch_in_limit_start_before')->nullable(); // e.g., '08:30:00'
            $table->time('late_cut_off_time')->nullable();    // e.g., '09:15:00'

            // 3. Punch Out Rules
            $table->enum('punch_out_rule', ['ANYTIME', 'LIMIT'])->default('ANYTIME');
            $table->time('punch_out_limit_start_after')->nullable();
            $table->time('early_cut_off_time')->nullable();   // e.g., '16:45:00'

            // 4. Operational Toggles
            $table->boolean('is_overnight_shift')->default(false);
            $table->boolean('auto_punch_out')->default(false);
            $table->boolean('has_minimum_working_hours')->default(false);
            $table->time('minimum_working_hours_for_present')->nullable(); // e.g., '08:00:00'
            $table->time('minimum_working_hours_for_half_day')->nullable(); // e.g., '04:00:00'

            // 5. Penalty & Deduction Rules
            $table->integer('number_of_lates_for_half_day')->default(0);             // e.g., 3 lates = 1 half day
            $table->integer('number_of_early_departures_for_half_day')->default(0);
            $table->integer('number_of_lates_for_absent')->default(0);               // e.g., 5 lates = 1 absent
            $table->integer('number_of_early_departures_for_absent')->default(0);

            $table->timestamps();
            $table->softDeletes();

            // Foreign Key Constraint
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade'); // If company is deleted, delete its shifts
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_shifts');
    }
};
