<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhLuansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('binh_luans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');

            $table->integer('id_baiviet')->unsigned();
            $table->foreign('id_baiviet')->references('id')->on('bai_viets');

            $table->text('noidung');
            $table->boolean('trangthai');
            $table->date('ngayviet');


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
		Schema::drop('binh_luans');
	}

}
