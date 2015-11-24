<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhGiaCongTiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('danh_gia_cong_ties', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');

            $table->integer('id_congty')->unsigned();
            $table->foreign('id_congty')->references('id')->on('cong_ties');

            $table->text('noidung');

            $table->boolean('trangthai');

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
		Schema::drop('danh_gia_cong_ties');
	}

}
