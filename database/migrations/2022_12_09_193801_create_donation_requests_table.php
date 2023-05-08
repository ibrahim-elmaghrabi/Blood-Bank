<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->foreignId('city_id');
            $table->string('hospital_name');
            $table->foreignId('blood_type_id');
            $table->string('age');
            $table->string('bags_num');
            $table->string('hospital_address');
            $table->text('details');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
            $table->foreignId('client_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donation_requests');
    }
};
