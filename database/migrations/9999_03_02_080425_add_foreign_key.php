<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interest_user', function(Blueprint $table){
            $table -> foreign('interest_id', 'interest_user')
                   -> references('id')
                   -> on('interests');
            $table -> foreign('user_id', 'user_interest')
                   -> references('id')
                   -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interest_user', function(Blueprint $table) {
            $table -> dropForeign('interest_user');
            $table -> dropForeign('user_interest');


        });
    }
}
