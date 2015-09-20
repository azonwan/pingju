<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGithubLoginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('github_logins', function (Blueprint $table){
            $table->increments('id');
            $table->integer('github_id')->index();
            $table->string('github_url');
            $table->string('remember_token')->nullable();
            $table->string('github_name');
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
        Schema::drop('github_logins');
	}

}
