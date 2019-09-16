<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStampActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamp_acts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('gsobject_id')->unsigned();

            $table->string('place');
            $table->string('number');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gsobject_id')->references('id')->on('gsobjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stamp_acts');
    }
}
