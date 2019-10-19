<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('gsobject_id')->unsigned();
            $table->bigInteger('device_name_id')->unsigned();

            $table->string('number');
            $table->date('last_muster_date');
            $table->integer('muster_interval');
            $table->string('range');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gsobject_id')->references('id')->on('gsobjects');
            $table->foreign('device_name_id')->references('id')->on('device_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
