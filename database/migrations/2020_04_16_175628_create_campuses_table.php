<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            //$table->unsignedBigInteger('school_id');
            //$table->foreign('school_id')->references('id')->on('schools');

            $table->foreignId('school_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('campuses', function($table)
        {
            $table->dropForeign(['school_id']);
        });

        Schema::dropIfExists('campuses');
    }
}
/*Ahmad Ibrahim*/
