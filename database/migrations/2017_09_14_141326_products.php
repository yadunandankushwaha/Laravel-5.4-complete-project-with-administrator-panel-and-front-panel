<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->integer('cat_id');
            $table->string('quantity');
            $table->string('short_description');
            $table->longtext('description');
            $table->string('price');
            $table->string('seller_id');
            $table->string('condition');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('seo_title');
            $table->string('seo_keywords');
            $table->string('seo_description');
            $table->integer('status');
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
        //
    }
}
