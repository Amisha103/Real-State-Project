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
        Schema::create('available_data', function (Blueprint $table) {
            $table->bigIntegerid();
            $table->string('image');
            $table->string('type');
            $table->string('details');
            $table->string('owner_name');
            $table->string('address');
            $table->string('mobile_number');
            $table->timestamps();
        });

        // DB::statement("ALTER TABLE available_data AUTO_INCREMENT = 100;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_data');
    }
};
