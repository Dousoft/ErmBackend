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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->decimal('price', 10, 2)->default(0);
            $table->json('features')->nullable();
            $table->integer('user_limit')->nullable();
            $table->string('tenure')->nullable();
            $table->enum('package_type', ['subscription', 'one-time', 'free-trial']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
