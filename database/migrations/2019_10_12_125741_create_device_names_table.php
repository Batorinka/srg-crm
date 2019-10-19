<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_names', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('device_type_id')->unsigned();

            $table->string('title');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('device_type_id')->references('id')->on('device_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_names');
    }
}
