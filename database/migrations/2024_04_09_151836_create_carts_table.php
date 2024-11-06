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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('type');
            $table->string('address');
            $table->timestamps();

            // Assuming 'id' from users table is the correct foreign key
            $table->unsignedBigInteger('user_id'); // Add the user_id field
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
