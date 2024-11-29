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
        Schema::create('s_f_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->integer('institution_id');
            $table->string('type');
            $table->string('brand');
            $table->string('color');
            $table->string('plate');
            $table->date('issueDate');
            $table->date('expirationDate');
            $table->boolean('status')->default(1);
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_f_vehicles');
    }
};
