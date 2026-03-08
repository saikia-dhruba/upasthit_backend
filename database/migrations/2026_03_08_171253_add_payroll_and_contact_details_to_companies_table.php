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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('gstin')->nullable()->after('industry_type');
            $table->text('address')->nullable()->after('gstin');
            $table->string('phone_number')->nullable()->after('address');
            $table->string('email')->nullable()->after('phone_number');

            // --- Payroll & HR Configurations ---
            // Adding these after 'status'
            $table->enum('pay_period', [
                '30_DAYS_FIXED',
                'CALENDAR_DAYS_WEEK_OFFS_PAID',
                'CALENDAR_DAYS_WEEK_OFFS_UNPAID'
            ])->default('30_DAYS_FIXED')->after('status');

            $table->boolean('enable_shift_wise_incentives')->default(false)->after('pay_period');
            $table->boolean('is_geo_fenced')->default(false)->after('enable_shift_wise_incentives');
            $table->boolean('enable_payroll_cycle')->default(false)->after('enable_shift_wise_incentives');

            $table->integer('payroll_cycle_start_day')->nullable()->after('enable_payroll_cycle'); // e.g., 25
            $table->integer('payroll_cycle_end_day')->nullable()->after('payroll_cycle_start_day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'gstin',
                'address',
                'is_geo_fenced',
                'phone_number',
                'email',
                'pay_period',
                'enable_shift_wise_incentives',
                'enable_payroll_cycle',
                'payroll_cycle_start_day',
                'payroll_cycle_end_day',
            ]);
        });
    }
};
