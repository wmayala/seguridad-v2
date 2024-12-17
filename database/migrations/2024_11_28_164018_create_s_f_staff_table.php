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
        Schema::create('s_f_staff', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->integer('zone');
            $table->string('name');
            $table->string('position');
            $table->string('dui');
            $table->string('duiPlace');
            $table->date('duiDate');
            $table->string('address');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->integer('institution_id');
            $table->date('issueDate');
            $table->date('expirationDate');
            $table->string('photo');
            $table->string('signature');
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
        Schema::dropIfExists('s_f_staff');
    }
};
