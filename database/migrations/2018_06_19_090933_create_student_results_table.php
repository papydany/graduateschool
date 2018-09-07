<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('coursereg_id');
            $table->integer('course_id');
            $table->string('grade');
            $table->integer('unit');
            $table->integer('is_waved')->nullable();
            $table->integer('semester_id');
            $table->string('status')->nullable();
            $table->string('session');
            $table->integer('user_id');
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
        Schema::dropIfExists('student_results');
    }
}
