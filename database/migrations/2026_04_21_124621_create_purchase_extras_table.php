<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('purchase_extras', function (Blueprint $table) {
            
            $table->foreignId('operation_id')
                  ->primary()
                  ->constrained('operations')
                  ->cascadeOnDelete();

            $table->date('due_date');

            $table->enum('dispatch_status', ['pending', 'completed', 'canceled'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_extras');
    }
};
