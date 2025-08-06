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
        Schema::create('retentions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bundle_id')->nullable()
                ->constrained()->nullOnDelete();

            $table->date('input_date')->nullable();          // tanggal input Excel
            $table->tinyInteger('seq_in_bundle')->nullable(); // no urut 1-50
            $table->year('last_visit_year')->nullable();
            $table->smallInteger('pages_count')->nullable();

            $table->boolean('special_case_flag')->default(false);
            $table->string('special_case_type',50)->nullable();
            $table->enum('status',['Aktif','Inaktif','Dimusnahkan'])->default('Aktif');

            $table->unique(['bundle_id','seq_in_bundle']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retentions');
    }
};
