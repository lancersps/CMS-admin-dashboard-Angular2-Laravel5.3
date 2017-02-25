<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description', 200);
            $table->string('meta_title', 100);
            $table->string('meta_description', 200);
	        $table->string('img_name',200);
            $table->dateTime('date');
            $table->string('client', 100);
            $table->string('role', 50);
            $table->string('permalink');
            $table->string('tags', 100);
            $table->string('password_protected');
            $table->string('project_external_url');
            $table->boolean('is_active');
            $table->string('username');
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
        Schema::drop('projects');
    }
}
