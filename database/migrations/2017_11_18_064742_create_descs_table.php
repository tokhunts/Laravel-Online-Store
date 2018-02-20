<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('img');
            $table->string('size');
            $table->string('color');
            $table->integer('post_id')
                ->unsigned()
                ->nullable();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts');
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
        Schema::dropIfExists('descs');
    }
}
