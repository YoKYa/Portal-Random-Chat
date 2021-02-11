<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGchatsTable extends Migration
{
    public function up()
    {
        Schema::create('gchats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',6)->nullable();
            $table->enum('type',['personal', 'group']);
            $table->timestamps();
        });
        Schema::create('user_chat', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('gchat_id');
            $table->primary(['user_id', 'gchat_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('gchats');
        Schema::dropIfExists('user_chat');
    }
}
