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
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            // --- 1. Basic & Identity Info ---
            // Note: Profile Image, Name, Phone, Email, and Password should be in the 'users' table.
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER'])->nullable();
            $table->text('address')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_number')->nullable();

            // --- 2. Job & Department Details ---
            $table->string('employee_code')->nullable();
            $table->enum('role_type', ['EMPLOYEE', 'MANAGER', 'ADMIN'])->default('EMPLOYEE');
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('category')->nullable(); // e.g., Skilled, Unskilled, Permanent, Contract
            $table->date('date_of_joining')->nullable();

            // Self-referencing Foreign Key for "Report To"
            $table->unsignedBigInteger('reports_to_id')->nullable();

            // --- 3. Salary & Payroll Config ---
            $table->enum('wage_type', ['MONTHLY', 'DAILY', 'HOURLY'])->default('MONTHLY');
            $table->decimal('salary', 10, 2)->default(0.00);
            $table->string('payroll_template')->nullable();
            $table->json('payroll_config')->nullable(); // Store custom config as JSON
            $table->boolean('allow_self_custom_salary')->default(false);
            $table->boolean('can_view_self_salary')->default(true);

            // --- 4. Overtime & Weekly Offs ---
            $table->boolean('applicable_for_overtime')->default(false);
            $table->time('overtime_start_after')->nullable(); // e.g., '09:00:00' (after 9 hours)
            // $table->string('overtime_calculation_display')->nullable();
            $table->decimal('overtime_hourly_rate', 8, 2)->default(0.00);
            $table->boolean('week_off_extra_payment')->default(false);
            $table->enum('week_off_day', ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'])->nullable(); // e.g., 'SUNDAY'

            // --- 5. Shift & Attendance Setup ---
            $table->boolean('shiftwise_attendance')->default(false);
            $table->enum('shift_alignment_type', ['FIXED', 'WEEKLY', 'MONTHLY'])->default('FIXED');
            $table->unsignedBigInteger('shift_id')->nullable();

            // --- 6. Leave Quotas ---
            $table->integer('casual_leaves')->default(0);
            $table->integer('sick_leaves')->default(0);
            $table->integer('privilege_leaves')->default(0);
            $table->integer('emergency_leaves')->default(0);

            // --- 7. Statutory & Compliance Documents ---
            $table->string('pan_number')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('uan_number')->nullable();
            $table->string('pf_number')->nullable();
            $table->string('esi_number')->nullable();
            $table->json('documents_urls')->nullable(); // Store multiple doc links as JSON

            // --- 8. Bank Account Details ---
            $table->string('bank_name')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->string('bank_account_holder_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_ifsc_code')->nullable();

            // --- 9. App Permissions & Tracking Limits ---
            $table->enum('punch_location_rule', ['GEOFENCE', 'ANYWHERE'])->default('GEOFENCE');
            $table->boolean('allow_multiple_attendance')->default(false);
            $table->boolean('allow_live_tracking')->default(false);
            $table->boolean('allow_mobile_attendance')->default(true);
            $table->boolean('require_ai_selfie_verification')->default(false);
            $table->string('ai_reference_face_image_url')->nullable();
            $table->boolean('allow_self_odometer_reading')->default(false);

            // --- 10. System Status ---
            $table->boolean('is_archived')->default(false); // Used instead of deleting data
            $table->timestamps();

            // --- Foreign Key Constraints ---
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('reports_to_id')->references('id')->on('employee_profiles')->onDelete('set null');
            $table->foreign('shift_id')->references('id')->on('company_shifts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
    }
};
