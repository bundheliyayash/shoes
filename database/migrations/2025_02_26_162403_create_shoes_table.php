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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id(); // id(2)
            $table->foreignId('com_id')->constrained('companies')->onDelete('cascade'); // com_id(1)
            $table->string('name'); // Shoe name
            $table->string('image')->nullable(); // img
            $table->string('url')->nullable(); // url
            $table->unsignedBigInteger('company_pro_id')->nullable(); // company_pro_id (no primary key, foreign key)
            $table->json('gallery')->nullable(); // gallery
            $table->decimal('price', 8, 2); // price
            $table->timestamps(); // time
            $table->softDeletes(); // Adds `deleted_at` column

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};