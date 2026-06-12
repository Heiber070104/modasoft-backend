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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('third_party_id')->constrained('third_parties')->onDelete('cascade');
            $table->string('bill_number')->unique();
            $table->text('description')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->enum('type', ['sale', 'purchase']);
            $table->enum('type_payment', ['COUNTED', 'CREDIT']);
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
