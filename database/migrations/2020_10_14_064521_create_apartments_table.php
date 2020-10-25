<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area');
            $table->string('number', 45);
            $table->integer('storey');
            $table->string('specification',300);
            $table->string('additional', 300);
            $table->tinyInteger('sold')->default(0);
            $table->string('image')->nullable();
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('street_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('cascade');
            $table->integer('storeynumber_id')->unsigned();
            $table->foreign('storeynumber_id')->references('id')->on('storeynumbers')->onDelete('cascade');
            $table->integer('layout_id')->unsigned();
            $table->foreign('layout_id')->references('id')->on('header')->onDelete('cascade');
            $table->integer('renovation_id')->unsigned();
            $table->foreign('renovation_id')->references('id')->on('renovations')->onDelete('cascade');
            $table->integer('bathroom_id')->unsigned();
            $table->foreign('bathroom_id')->references('id')->on('bathrooms')->onDelete('cascade');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
