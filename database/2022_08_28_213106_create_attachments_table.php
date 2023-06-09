<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentsTable extends Migration {

	public function up()
	{
		Schema::create('attachments', function(Blueprint $table) {
			$table->id('id');
			$table->integer('cover_image')->nullable();
			$table->enum('type', array('images', 'videos', 'files'));
			$table->string('usage')->nullable();
            $table->string('path')->nullable();
            $table->string('sm')->nullable();
			$table->string('attachmentable_type');
			$table->integer('attachmentable_id');
			$table->timestamps();

				});
	}

	public function down()
	{
		Schema::drop('attachments');
	}
}
