<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCarTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_car_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sub_car_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('sub_car_id')->references('id')->on('sub_cars')

            ->onDelete('cascade');
    
        $table->foreign('tag_id')->references('id')->on('tags')
    
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_car_tag');
    }
}
