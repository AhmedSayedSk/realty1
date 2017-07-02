<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtiesTable extends Migration
{
    public function up()
    {
        Schema::create('realties', function (Blueprint $table) {
            $table->increments('id');
            $table->float('lat');
            $table->float('lng');
            $table->string('address1'); // getting from google map
            $table->string('address2'); // inputed from user
            $table->string('type');
            $table->integer('area');
            $table->integer('price')->nullable();
            $table->text('description');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('realties');
    }
}
