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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('amount')->default(0);
            $table->decimal     ('price', 10, 2)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
