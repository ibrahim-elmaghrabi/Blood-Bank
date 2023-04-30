<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->foreignId('blood_type_id');
            $table->date('d_o_b');
            $table->date('last_donation_date');
            $table->foreignId('city_id');
            $table->boolean('active')->default(0);
            $table->string('pin_code')->nullable();
            $table->string('client_token', 60)->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
