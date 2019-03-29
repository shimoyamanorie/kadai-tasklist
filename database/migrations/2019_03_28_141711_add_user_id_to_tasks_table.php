<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');    // content カラム追加
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });
        // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
