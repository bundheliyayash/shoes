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
        Schema::create('product_blogs', function (Blueprint $table) {
            $table->id(); // id
            $table->foreignId('shoes_id')->constrained('shoes')->onDelete('cascade'); // shoes_id(2)
            $table->string('title'); // title
            $table->text('content'); // content
            $table->text('product_story')->nullable(); // product_story
            $table->string('image')->nullable(); // image
            $table->timestamps(); // time
            $table->softDeletes(); // Adds `deleted_at` column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_blogs');
    }
};