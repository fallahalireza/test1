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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('personel_code');
            $table->string('identity_no');
            $table->string('code_melli');
            $table->unsignedSmallInteger('birth_year');
            $table->unsignedTinyInteger('birth_month');
            $table->unsignedTinyInteger('birth_day');
            $table->date('birth_date');
            $table->tinyInteger('gender_code')->unsigned();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
