<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('notification_settings_text');
            $table->text('about_app');
            $table->text('who_we_are');
            $table->string('phone');
            $table->string('email');
            $table->string('fd_link');
            $table->string('insta_link');
            $table->string('tw_link');
            $table->string('wta_link');
            $table->string('yt_link');
            $table->string('fax');
            $table->string('app_store_link');
            $table->string('play_store_link');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
