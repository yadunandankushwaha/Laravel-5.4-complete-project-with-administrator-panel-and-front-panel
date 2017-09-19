<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppliedCandidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('applied_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',255);
            $table->string('website',255);
            $table->string('coverletter');
            $table->string('resume');
            $table->string('question',20);
           
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
