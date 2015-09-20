<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('user_nodes', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('node_id')->index();
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
        Schema::drop('user_nodes');
	}

}
