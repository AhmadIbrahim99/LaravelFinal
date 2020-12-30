<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
			$table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
			$table->foreignId('type_id')->constrained()->onDelete('cascade');
			$table->timestamps();
			//$table->unique(['course_id', 'type_id']);     
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('course_types', function($table)
        {
            $table->dropForeign(['course_id']);
			$table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('course_types');
    }
}
