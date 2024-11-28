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
        Schema::create('companies_staff', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->integer('zone');
            $table->string('name');
            $table->string('position');
            $table->boolean('gender');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('address');
            $table->string('phone');
            $table->string('mobile')->nullable();
            $table->string('dui');
            $table->string('duiPlace');
            $table->date('duiDate');
            $table->string('duiProfession');
            $table->string('driverLicense')->nullable();
            $table->string('workPlace');
            $table->string('workAddress');
            $table->string('workPhone');
            $table->string('spouse')->nullable();
            $table->string('motherName')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('parentsAddress')->nullable();
            $table->string('skinColor')->nullable();
            $table->integer('company_id');
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
        Schema::dropIfExists('companies_staff');
    }
};
