<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('car_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('photo');
            $table->string('seo_title');
            $table->string('seo_keyword');
            $table->string('seo_description');
            $table->tinyInteger('active')
                ->comment('1 => show the product on the site, 0 => donot show the product on the site')->default('1');
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
        Schema::dropIfExists('articles');
    }
}
