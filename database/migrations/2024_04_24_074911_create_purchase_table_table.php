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
        Schema::create('purchase_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->integer('quantity');
            $table->string('address');
            $table->date('date');
            $table->timestamps();

            // Foreign key on customerId
            $table->unsignedBigInteger('customerId');
            $table->foreign('customerId')->references('customerId')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_table');
    }
};
