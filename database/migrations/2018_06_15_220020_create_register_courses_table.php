<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->integer('programme_id');
            $table->integer('aos_id');
            $table->integer('course_id');
            $table->string('title');
            $table->string('code');
            $table->integer('unit');
            $table->integer('semester_id');
            $table->string('status');
            $table->string('session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_courses');
    }
}
