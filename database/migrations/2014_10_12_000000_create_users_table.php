<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('number',20);
            $table->string('school',100);
             $table->string('last_name',30)->default('N/A');
              $table->integer('status')->default(0);
              $table->integer('state')->default(1);
              $table->string('verifytoken')->nullable();
              $table->boolean('verification')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
