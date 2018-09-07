<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcripts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matric_number');
            $table->string('surname');
            $table->string('name');
            $table->string('other');
            $table->string('email');
            $table->string('phone');
            $table->integer('programme_id');
            $table->integer('faculty_id');
            $table->integer('department_id');
            $table->integer('aos_id');
            $table->string('entry_year');
            $table->string('gender');
            $table->string('dob');
            $table->text('transcrip_address');
            $table->integer('status');
             $table->string('tranx_id');
            $table->string('amount');
            $table->integer('payment_status');

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
        Schema::dropIfExists('transcripts');
    }
}
