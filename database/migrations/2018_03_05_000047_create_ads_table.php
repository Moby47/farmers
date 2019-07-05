<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            //addded by user
            $table->integer('user_id');
            $table->string('title',50);
            $table->string('package',15);
            $table->string('banner');
            $table->string('link')->nullable();
             $table->text('description',255);
             
             $table->string('school',100);
            //added by system default
            $table->integer('verification')->default(0);
            //added by auth
            $table->string('phone',20);

            $table->string('mail',100);
            $table->integer('views')->default(0);
            $table->integer('amount');
            
            //added by system
            $table->dateTime('expiration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
