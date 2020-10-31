<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMichaelhabibBusinessinformationLocation2 extends Migration
{
<<<<<<< HEAD
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('google_map_page')->nullable();
            $table->string('instagram_page')->nullable();
            $table->string('google_map_iframe')->nullable();
            $table->boolean('facebook_page_from_location1')->nullable();
            $table->boolean('google_map_page_from_location1')->nullable();
            $table->boolean('instagram_page_from_location1')->nullable();
            $table->boolean('google_map_iframe_from_location1')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('phone2');
            $table->dropColumn('email');
            $table->dropColumn('email2');
            $table->dropColumn('facebook_page');
            $table->dropColumn('google_map_page');
            $table->dropColumn('instagram_page');
            $table->dropColumn('google_map_iframe');
            $table->dropColumn('facebook_page_from_location1');
            $table->dropColumn('google_map_page_from_location1');
            $table->dropColumn('instagram_page_from_location1');
            $table->dropColumn('google_map_iframe_from_location1');
        });
=======
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('google_map_page')->nullable();
            $table->string('instagram_page')->nullable();
            $table->string('google_map_iframe')->nullable();
            $table->boolean('facebook_page_from_location1')->nullable();
            $table->boolean('google_map_page_from_location1')->nullable();
            $table->boolean('instagram_page_from_location1')->nullable();
            $table->boolean('google_map_iframe_from_location1')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('phone2');
            $table->dropColumn('email');
            $table->dropColumn('email2');
            $table->dropColumn('facebook_page');
            $table->dropColumn('google_map_page');
            $table->dropColumn('instagram_page');
            $table->dropColumn('google_map_iframe');
            $table->dropColumn('facebook_page_from_location1');
            $table->dropColumn('google_map_page_from_location1');
            $table->dropColumn('instagram_page_from_location1');
            $table->dropColumn('google_map_iframe_from_location1');
        });
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
