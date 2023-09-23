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
        Schema::table('users', function (Blueprint $table) {
					// add column for `last_name`
					$table->string('last_name')->after('name');
          // change column `name` to `first_name`
					$table->renameColumn('name', 'first_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
          // revert changes
					$table->renameColumn('first_name', 'name');
					$table->dropColumn('last_name');
        });
    }
};
