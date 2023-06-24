<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_list_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('feature_list_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->unique(['feature_list_id', 'locale']);
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
        Schema::dropIfExists('feature_list_translations');
    }
};
