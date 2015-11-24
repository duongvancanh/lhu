<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaiVietsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bai_viets', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');
            $table->text('noidung');
            $table->boolean('trangthai');
            $table->boolean('congkhai');
            $table->date('ngayviet');
            $table->integer('id_nhom')->nullable();
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
		Schema::drop('bai_viets');
	}

}
