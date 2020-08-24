<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('level_course_id')->unsigned();
            $table->foreign('level_course_id')->references('id')->on('degree_level_courses')->onDelete('cascade');
            $table->integer('bimester');
            $table->integer('unit');
            $table->string('name');
            $table->text('description');
            $table->integer('position')->default(0);
            $table->string('link_youtube')->nullable();
            $table->string('link_download')->nullable();
            $table->string('link-indrive')->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
