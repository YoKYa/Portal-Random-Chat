<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{

    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gchat_id');
            $table->unsignedBigInteger('user_id');
            $table->text('body');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gchat_id')->references('id')->on('gchats')->onUpdate('cascade');
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
        Schema::dropIfExists('chats');
    }
}
