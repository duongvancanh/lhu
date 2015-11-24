<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuKiensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('su_kiens', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');

            $table->text('noidung');
            $table->date('thoigian');
            $table->boolean('trangthai');
            $table->string('diadiem');
            $table->integer('id_nhom')->unsigned()->nullable();
            $table->foreign('id_nhom')->references('id')->on('nhoms');

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
		Schema::drop('su_kiens');
	}

}
