<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_category', function (Blueprint $table) {
            $table->increments('page_category_id');
            $table->string('page_category_name',20);
            $table->string('page_description');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->string('image',50);
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
