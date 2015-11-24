<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietSuKiensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chi_tiet_su_kiens', function(Blueprint $table)
		{

            $table->integer('id_sukien')->unsigned();
            $table->foreign('id_sukien')->references('id')->on('su_kiens');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');
            $table->boolean('gv_xacnhan')->default(0);
            $table->primary(['id_sukien','id_user']);

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
		Schema::drop('chi_tiet_su_kiens');
	}

}
