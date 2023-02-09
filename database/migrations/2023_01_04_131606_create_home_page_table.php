<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('h2title')->nullable();
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->string('default_seo_image')->nullable();
            $table->string('ads_sidebar')->nullable();
            $table->string('call_us')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('seo_title');
            $table->string('seo_keyword');
            $table->string('seo_description');
            $table->string('default_country');
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
        Schema::dropIfExists('home_page');
    }
}
