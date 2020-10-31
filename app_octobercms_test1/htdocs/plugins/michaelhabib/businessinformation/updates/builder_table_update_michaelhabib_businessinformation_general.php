<?php namespace MichaelHabib\BusinessInformation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMichaelhabibBusinessinformationGeneral extends Migration
{
<<<<<<< HEAD
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_general', function($table)
        {
            $table->string('name')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('industry')->nullable();
            $table->string('tagline')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_general', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->dropColumn('industry');
            $table->dropColumn('tagline');
        });
=======
    public function up()
    {
        Schema::table('michaelhabib_businessinformation_general', function($table)
        {
            $table->string('name')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('industry')->nullable();
            $table->string('tagline')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('michaelhabib_businessinformation_general', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->dropColumn('industry');
            $table->dropColumn('tagline');
        });
>>>>>>> aa84cbc90b7c1bad35235afaac731f60b724ec8e
    }
}
