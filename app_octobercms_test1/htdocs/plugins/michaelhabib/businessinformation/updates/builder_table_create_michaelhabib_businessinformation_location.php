<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMichaelhabibBusinessinformationLocation extends Migration
{
    public function up()
    {
        Schema::create('michaelhabib_businessinformation_location', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('address')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('michaelhabib_businessinformation_location');
    }
}
