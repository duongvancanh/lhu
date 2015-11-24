<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotThucTapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dot_thuc_taps', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('tendotthuctap');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
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
		Schema::drop('dot_thuc_taps');
	}

}
