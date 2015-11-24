<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhGiaKetQuasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('danh_gia_ket_quas', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('id_usergv')->unsigned();
            $table->foreign('id_usergv')->references('id')->on('tai_khoans');


            $table->integer('id_usersv')->unsigned();
            $table->foreign('id_usersv')->references('id')->on('tai_khoans');

            $table->string('nhanxet');
            $table->boolean('ketqua');

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
		Schema::drop('danh_gia_ket_quas');
	}

}
