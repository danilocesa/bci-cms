<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_content', function (Blueprint $table) {
            $table->increments('page_content_id');
            $table->integer('page_category_id');
            $table->string('page_description');
            $table->string('director_name');
            $table->string('director_position');
            $table->string('director_desc');
            $table->string('client_image');
            $table->string('portfolio_text');
            $table->string('portfolio_image');
            $table->string('url');
            $table->string('fb_link');
            $table->string('linkedin');
            // $table->timestamps();/
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
