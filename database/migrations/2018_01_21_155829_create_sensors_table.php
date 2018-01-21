<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('name');
            $table->tinyInteger('status', false, true);
            $table->string('keyword')->index();
            $table->string('value');
            $table->string('pin');
            $table->tinyInteger('has_history', false, true);
            $table->integer('history_step', false, true);
            $table->uuid('room_id')->index();
            $table->uuid('node_id')->index();
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
        Schema::dropIfExists('sensors');
    }
}
