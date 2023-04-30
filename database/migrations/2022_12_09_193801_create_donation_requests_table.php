<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('phone');
            $table->integer('city_id')->unsigned();
            $table->string('hospital_name');
            $table->integer('blood_type_id')->unsigned();
            $table->string('age');
            $table->integer('bags_num');
            $table->string('hospital_address');
            $table->text('details');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
            $table->integer('client_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donation_requests');
    }
};
