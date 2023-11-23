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
            $table->integer('beer_limit')->default(0);
            $table->integer('new_beer_limit')->default(0);
            $table->dateTime('new_beer_limit_activate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'beer_limit',
                'new_beer_limit',
                'new_beer_limit_activate',
            ]);
        });
    }
};
