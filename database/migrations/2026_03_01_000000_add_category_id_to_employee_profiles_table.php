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
        Schema::table('employee_profiles', function (Blueprint $table) {
            // add foreign key to categories
            $table->unsignedBigInteger('employee_category_id')->nullable()->after('department');

            $table->foreign('employee_category_id')
                  ->references('id')
                  ->on('employee_categories')
                  ->onDelete('set null');

            // remove the old string field if you no longer need it
            if (Schema::hasColumn('employee_profiles', 'category')) {
                $table->dropColumn('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_profiles', function (Blueprint $table) {
            // re-create the old category string if necessary
            $table->string('category')->nullable()->after('department');

            $table->dropForeign(['employee_category_id']);
            $table->dropColumn('employee_category_id');
        });
    }
};
