<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHelpRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('user_help_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('reg_confirm')->nullable();
            $table->timestamp('psw_reset')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('user_help_requests');
    }
}
