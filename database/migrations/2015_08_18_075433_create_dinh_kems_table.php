<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinhKemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dinh_kems', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_baiviet')->unsigned();
            $table->foreign('id_baiviet')->references('id')->on('bai_viets');
            $table->string('link');
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
		Schema::drop('dinh_kems');
	}

}
