<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMichaelhabibBusinessinformationLocation extends Migration
{
<<<<<<< HEAD
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
=======
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
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
