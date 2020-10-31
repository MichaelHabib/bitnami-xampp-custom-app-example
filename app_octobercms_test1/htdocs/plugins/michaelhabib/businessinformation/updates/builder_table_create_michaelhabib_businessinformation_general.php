<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMichaelhabibBusinessinformationGeneral extends Migration
{
    public function up()
    {
        Schema::create('michaelhabib_businessinformation_general', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('michaelhabib_businessinformation_general');
    }
}
