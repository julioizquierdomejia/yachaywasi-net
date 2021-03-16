<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHoursAssignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hours_assign', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->bigInteger('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');

            $table->bigInteger('degree_id')->unsigned();
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');

            $table->bigInteger('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');

            $table->bigInteger('hour_id')->unsigned();
            $table->foreign('hour_id')->references('id')->on('hours')->onDelete('cascade');

            $table->boolean('enabled')->default(1);

            //$table->unique(['user_id', 'course_id', 'level_id', 'degree_id', 'day_id', 'hour_id'], 'user_hours_assign_unique');

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
        Schema::table('user_hours_assign', function (Blueprint $table) {
            $table->dropForeign('user_hours_assign_user_id_foreign');
            $table->dropForeign('user_hours_assign_course_id_foreign');
            $table->dropForeign('user_hours_assign_level_id_foreign');
            $table->dropForeign('user_hours_assign_degree_id_foreign');
            $table->dropForeign('user_hours_assign_day_id_foreign');
            $table->dropForeign('user_hours_assign_hour_id_foreign');
        });
        Schema::dropIfExists('user_hours_assign');
    }
}
