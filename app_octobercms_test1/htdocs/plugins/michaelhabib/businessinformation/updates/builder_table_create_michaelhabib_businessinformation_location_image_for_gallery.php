<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMichaelhabibBusinessinformationLocationImageForGallery extends Migration
{
<<<<<<< HEAD
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
=======
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
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
