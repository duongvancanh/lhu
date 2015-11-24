<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongTiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cong_ties', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('ten');
            $table->string('diachi');
            $table->string('email');
            $table->string('sdt');
            $table->string('loai');
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
		Schema::drop('cong_ties');
	}

}
