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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->string('name');
            $table->integer('age');
            $table->string('relationship');
            $table->integer('empCode');
            $table->string('empName');
            $table->string('institution');
            $table->date('expirationDate');
            $table->date('issueDate');
            $table->string('photo');
            $table->string('signature');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
