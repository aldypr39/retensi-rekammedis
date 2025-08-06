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
        Schema::create('newborns', function (Blueprint $table) {
            $table->foreignId('patient_id')->primary()
                ->constrained('patients')->cascadeOnDelete();

            $table->date('birth_date')->nullable();        // tgl lahir bayi
            $table->decimal('birth_weight',4,1)->nullable();
            $table->decimal('birth_length',4,1)->nullable();
            $table->enum('sex_baby',['L','P'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newborns');
    }
};
