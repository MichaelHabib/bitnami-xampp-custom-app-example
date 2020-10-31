<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMichaelhabibBusinessinformationLocationImageForGallery extends Migration
{
<<<<<<< HEAD
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location_image_for_gallery', function($table)
        {
            $table->dropPrimary(['location_id','image_id']);
            $table->renameColumn('image_id', 'file_id');
            $table->primary(['location_id','file_id']);
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location_image_for_gallery', function($table)
        {
            $table->dropPrimary(['location_id','file_id']);
            $table->renameColumn('file_id', 'image_id');
            $table->primary(['location_id','image_id']);
        });
=======
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location_image_for_gallery', function($table)
        {
            $table->dropPrimary(['location_id','image_id']);
            $table->renameColumn('image_id', 'file_id');
            $table->primary(['location_id','file_id']);
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location_image_for_gallery', function($table)
        {
            $table->dropPrimary(['location_id','file_id']);
            $table->renameColumn('file_id', 'image_id');
            $table->primary(['location_id','image_id']);
        });
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
