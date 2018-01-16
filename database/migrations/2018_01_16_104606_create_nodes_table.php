<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            //$table->increments('id');
            $table->uuid('id');
            $table->string('name');
            $table->string('keyword')->index();
            $table->tinyInteger('status', false, false);
            $table->string('platform')->index();
            $table->string('connection')->index();
            $table->string('proocol')->index();
            $table->string('dsn')->nullable();
            $table->dateTime('pinged_at')->index();
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
        Schema::dropIfExists('nodes');
    }
}
