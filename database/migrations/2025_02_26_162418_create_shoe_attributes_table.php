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
        Schema::create('shoe_attributes', function (Blueprint $table) {
            $table->id(); // id
            $table->foreignId('shoes_id')->constrained('shoes')->onDelete('cascade'); // shoes_id(2)
            $table->foreignId('attributes_id')->constrained('attributes')->onDelete('cascade'); // attributes_id(3)
            $table->text('value')->nullable(); // value
            $table->timestamps(); // time
            $table->softDeletes(); // Adds `deleted_at` column

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoe_attributes');
    }
};