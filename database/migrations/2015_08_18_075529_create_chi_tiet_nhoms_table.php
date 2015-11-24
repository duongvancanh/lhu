<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietNhomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chi_tiet_nhoms', function(Blueprint $table)
		{

            $table->integer('id_nhom')->unsigned();
            $table->foreign('id_nhom')->references('id')->on('nhoms');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');

            $table->primary(['id_nhom','id_user']);


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
		Schema::drop('chi_tiet_nhoms');
	}

}
