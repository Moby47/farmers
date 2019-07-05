<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
          $table->string('title',50); //16 maybe
         $table->text('description',255);
         $table->integer('price')->nullable();
         $table->string('status',15);
          $table->string('category',50);
         //get from reg 
         $table->string('school',100);
        //get from reg#
         $table->string('number',20);
        $table->integer('user_id');
         $table->integer('verification')->default(0);
         //used for views
        $table->integer('sold')->default(0);
        $table->string('image_1');
          $table->string('image_2');
           $table->string('image_3');
           $table->string('image_4');
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
        Schema::dropIfExists('post');
    }
}
