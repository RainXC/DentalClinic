<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('album_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('alias', 50)->unique();
            $table->text('description');
            $table->integer('authorId');
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
        Schema::drop('album_images');
	}

}
