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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('employee_code_start_with')->nullable();
            $table->string('industry_type')->nullable();
            $table->json('gps_geofence_data')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE','LOCKED','DELETED','EXPIRED'])->default('ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('owner_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
