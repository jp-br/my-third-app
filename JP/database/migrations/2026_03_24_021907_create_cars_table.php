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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_model');
            $table->string('color');
            $table->integer('mileage');
            $table->integer('year_model');
            $table->decimal('amount',13,0);
            $table->string('fuel_type');
            $table->enum('transmission',['manual', 'automatic']);
            $table->enum('availability',['available', 'sod']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
