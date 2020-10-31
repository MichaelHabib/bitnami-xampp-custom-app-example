<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMichaelhabibBusinessinformationLocation6 extends Migration
{
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->string('gallery3')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('gallery3');
        });
    }
}