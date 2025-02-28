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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id(); // id(3)
            $table->string('name'); // Attribute name
            $table->unsignedBigInteger('parent_id')->nullable(); // parent_id
            $table->timestamps(); // time
            $table->softDeletes(); // Adds `deleted_at` column

            // Foreign key for parent-child relationship
            $table->foreign('parent_id')->references('id')->on('attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};