<?php

use App\Models\Company;
use App\Models\Department;
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fio');
            $table->foreignIdFor(Department::class)->nullable();
            $table->foreignIdFor(Company::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fio');
            $table->dropForeignIdFor(Department::class);
            $table->dropForeignIdFor(Company::class);
        });
    }
};
