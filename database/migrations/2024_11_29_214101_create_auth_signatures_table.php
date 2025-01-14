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
        Schema::create('auth_signatures', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->integer('institution_id');
            $table->string('description')->nullable();
            $table->date('issueDate');
            $table->date('expirationDate');
            $table->string('document')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_signatures');
    }
};
