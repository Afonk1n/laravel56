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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname', 45)->nullable();
            $table->string('secondname', 45)->nullable();
            $table->string('patronymic', 45)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('passport', 100)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('role')->default(0);
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
