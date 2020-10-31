<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMichaelhabibBusinessinformationLocation5 extends Migration
{
<<<<<<< HEAD
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->string('gallery')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('gallery');
        });
=======
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->string('gallery')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('gallery');
        });
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
