<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreeLevelCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_level_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('degree_level_id')->unsigned();
            $table->foreign('degree_level_id')->references('id')->on('course_degree_level_user')->onDelete('cascade');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::table('degree_level_courses', function (Blueprint $table) {
            $table->dropForeign('degree_level_coursesdegree_level_id_foreign');
            $table->dropForeign('degree_level_coursescourse_id_foreign');
        });
        Schema::dropIfExists('degree_level_courses');
    }
}
