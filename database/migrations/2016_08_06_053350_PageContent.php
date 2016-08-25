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
            $table->string('director_name',30);
            $table->string('director_position',20);
            $table->string('director_desc',150);
            $table->string('client_image',100);
            $table->string('portfolio_text',10);
            $table->string('portfolio_image',150);
            $table->string('url',150);
            $table->string('fb_link',150);
            $table->string('linkedin',150);
            $table->timestamps();
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
