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
            $table->boolean('zone');
            $table->string('name');
            $table->integer('activity_id');
            $table->boolean('gender');
            $table->string('birthPlace');
            $table->date('birthDate');
            $table->string('address');
            $table->string('phone');
            $table->string('mobile');
            $table->string('dui');
            $table->string('duiPlace');
            $table->date('duiDate');
            $table->string('duiProfession');
            $table->string('driverLicense');
            $table->string('workPlace');
            $table->string('workAddress');
            $table->string('workPhone');
            $table->string('spouse');
            $table->string('motherName');
            $table->string('fatherName');
            $table->string('parentsAddress');
            $table->string('skinColor');
            $table->date('registerDate');
            $table->date('expirationDate');
            $table->string('photo');
            $table->boolean('status');
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
