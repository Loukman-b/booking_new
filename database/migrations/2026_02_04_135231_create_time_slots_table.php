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
        Schema::disableForeignKeyConstraints();

        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('status', ["available","booked","cancelled"])->default('available');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};
