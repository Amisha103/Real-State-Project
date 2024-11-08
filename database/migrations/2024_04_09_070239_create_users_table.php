<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function down(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type')->default("Customer");
            $table->unsignedBigInteger('customerId')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function up(): void
    {  Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('fullname');
    });
        Schema::dropIfExists('users');
    }
};
