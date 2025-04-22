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
        Schema::create('requests', function (Blueprint $table) {
            $table->id('id');
            $table->string('status')->default('EN ATTENTE');
            $table->string('filename');
            $table->string('requestor_id');
            $table->string('pdf_path');
            $table->text('secretary_comment')->nullable();
            $table->text('director_comment')->nullable();
            $table->timestamps(); // This creates both created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};