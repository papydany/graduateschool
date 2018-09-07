<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewcolumnToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('previous_institution')->after('matric_number')->nullable();
            $table->string('previous_institution_date')->after('matric_number')->nullable();
            $table->string('previous_institution_qualification')->after('matric_number')->nullable();
             $table->string('previous_institution_class')->after('matric_number')->nullable();
            $table->string('nationality')->after('matric_number')->nullable();
            $table->string('state_of_origin')->after('matric_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
