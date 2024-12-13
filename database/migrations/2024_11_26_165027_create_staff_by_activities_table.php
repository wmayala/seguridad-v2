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
        Schema::create('staff_by_activities', function (Blueprint $table) {
            $table->id();
            $table->string('record');
            $table->integer('zone');
            $table->string('name');
            $table->integer('activity_id');
            $table->boolean('gender');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dui');
            $table->string('duiPlace');
            $table->date('duiDate');
            $table->string('duiProfession');
            $table->string('driverLicense')->nullable();
            $table->string('workPlace')->nullable();
            $table->string('workAddress')->nullable();
            $table->string('workPhone')->nullable();
            $table->string('spouse')->nullable();
            $table->string('motherName')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('parentsAddress');
            $table->string('skinColor')->nullable();
            $table->date('registerDate');
            $table->date('expirationDate');
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
        Schema::dropIfExists('staff_by_activities');
    }
};
