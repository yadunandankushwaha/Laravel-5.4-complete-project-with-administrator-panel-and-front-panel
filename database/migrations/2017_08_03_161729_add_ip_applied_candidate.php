<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIpAppliedCandidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
    	Schema::table('applied_candidate', function($table) {
    		 $table->string('ip',20);
    		 $table->string('ipdata');
    	});
        
           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('applied_candidate', function($table) {
        $table->dropColumn('ip');
        $table->dropColumn('ipdata');
    });
    }
}
