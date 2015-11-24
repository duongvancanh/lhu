<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhVienDanhGiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sinh_vien_danh_gias', function(Blueprint $table)
		{

            $table->integer('id_usersv')->unsigned();
            $table->foreign('id_usersv')->references('id')->on('tai_khoans');

            $table->text('traloi');
            $table->text('gopy')->nullable();
            $table->integer('id_usergv')->unsigned()->nullable();
            $table->foreign('id_usergv')->references('id')->on('tai_khoans');

            $table->primary(['id_usersv']);
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
		Schema::drop('sinh_vien_danh_gias');
	}

}
