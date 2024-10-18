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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('IdProduct', true);
            $table->string('NameProduct', 50);
            $table->string('Description', 65);
            $table->decimal('Price', 65, 0);
            $table->integer('Stock');
            $table->integer('IdCategory');
            $table->integer('Status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
