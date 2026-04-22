<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('return_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('return_id')
                  ->constrained('returns')
                  ->cascadeOnDelete();

            $table->foreignId('operation_detail_id')
                  ->constrained('operation_details')
                  ->cascadeOnDelete();

            $table->integer('quantity');
            $table->decimal('return_price', 10, 2);
            $table->text('commodity_condition')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('return_details');
    }
};