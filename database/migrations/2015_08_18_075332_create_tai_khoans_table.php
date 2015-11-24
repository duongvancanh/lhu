<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiKhoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tai_khoans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('ten');
            $table->integer('kieu');
            $table->boolean('trangthai');
            $table->boolean('gioitinh');
            $table->string('diachi');
            $table->string('sdt');
            $table->string('email')->unique();
            $table->integer('id_khoa')->unsigned();
            $table->foreign('id_khoa')->references('id')->on('khoas');
            $table->integer('id_congty')->unsigned()->nullable();
            $table->foreign('id_congty')->references('id')->on('cong_ties');
            $table->string('chuyennganh')->nullable();;
            $table->string('hocvi')->nullable();;

            $table->timestamps();
		});
	}
	public function down()
	{
		Schema::drop('tai_khoans');
	}

}
