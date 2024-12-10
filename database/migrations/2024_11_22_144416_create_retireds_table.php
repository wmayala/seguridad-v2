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
        Schema::create('retireds', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->string('name');
            $table->string('position')->default('JUBILADO');
            $table->string('dui');
            $table->date('issueDate');
            $table->date('expirationDate');
            $table->string('photo');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retireds');
    }
};
