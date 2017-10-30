<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('headline')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('employer')->nullable();
            $table->string('website')->nullable();
            $table->date('foundation')->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('company_email')->unique()->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('company_detail')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
