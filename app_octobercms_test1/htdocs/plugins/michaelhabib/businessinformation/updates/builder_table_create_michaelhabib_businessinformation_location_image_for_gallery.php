<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMichaelhabibBusinessinformationLocationImageForGallery extends Migration
{
    public function up()
    {
        Schema::create('michaelhabib_businessinformation_location_image_for_gallery', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('location_id');
            $table->integer('image_id');
            $table->primary(['location_id','image_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('michaelhabib_businessinformation_location_image_for_gallery');
    }
}
