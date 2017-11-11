<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_experiences', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->string('company_name', 100);
            $table->string('position', 100);
            $table->mediumInteger('start');
            $table->mediumInteger('end')->nullable();
            $table->text('job_description')->nullable();
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
		Schema::drop('work_experiences');
	}

}
