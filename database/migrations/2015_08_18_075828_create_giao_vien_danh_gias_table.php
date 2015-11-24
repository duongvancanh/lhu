<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaoVienDanhGiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('giao_vien_danh_gias', function(Blueprint $table)
		{
            $table->integer('id_renluyen')->unsigned();
            $table->foreign('id_renluyen')->references('id')->on('ren_luyens');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');

            $table->string('gopy');
            $table->primary(['id_renluyen','id_user']);
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
		Schema::drop('giao_vien_danh_gias');
	}

}
