<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMichaelhabibBusinessinformationLocation3 extends Migration
{
<<<<<<< HEAD
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('deleted_at');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
=======
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_location', function($table)
        {
            $table->dropColumn('deleted_at');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
