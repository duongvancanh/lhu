<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nhoms', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('tennhom')->unique();

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('tai_khoans');

            $table->integer('id_dotthuctap')->unsigned();
            $table->foreign('id_dotthuctap')->references('id')->on('dot_thuc_taps');
            $table->integer('id_khoa')->unsigned();
            $table->foreign('id_khoa')->references('id')->on('khoas');

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
		Schema::drop('nhoms');
	}

}
