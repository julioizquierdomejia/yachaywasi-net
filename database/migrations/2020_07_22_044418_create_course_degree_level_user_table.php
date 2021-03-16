<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDegreeLevelUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_degree_level_user', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->bigInteger('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');

            $table->bigInteger('degree_id')->unsigned();
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::table('course_degree_level_user', function (Blueprint $table) {
            $table->dropForeign('course_degree_level_user_course_id_foreign');
            $table->dropForeign('course_degree_level_user_level_id_foreign');
            $table->dropForeign('course_degree_level_user_degree_id_foreign');
            $table->dropForeign('course_degree_level_user_user_id_foreign');
        });

        Schema::dropIfExists('course_degree_level_user');
    }
}
