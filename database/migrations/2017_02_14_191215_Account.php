<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Account extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('site_title');
            $table->string('portfolio_url');
            $table->string('custom_domain');
	        $table->string('password_protected');
            $table->dateTime('meta_title');
            $table->string('meta_description');
            $table->string('google_analytics');
            $table->boolean('available');
            $table->boolean('show_domain');
            $table->string('template_name');
            $table->string('logo_image');
            $table->string('favicon_image');
            $table->boolean('is_active');
            $table->boolean('is_upgrade');
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
        //
        Schema::drop('accounts');
    }
}
