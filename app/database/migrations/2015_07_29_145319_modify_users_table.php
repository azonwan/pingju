<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_id'); 
            $table->dropColumn('github_url'); 
            $table->dropColumn('twitter_account'); 
            $table->dropColumn('company'); 
            $table->dropColumn('city'); 
            $table->dropColumn('github_name'); 
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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('github_id')->index();
            $table->string('github_url');
            $table->string('city')->nullable();
            $table->string('company')->nullable();
            $table->string('twitter_account')->nullable();
            $table->string('github_name')->index();
        });
	}

}
