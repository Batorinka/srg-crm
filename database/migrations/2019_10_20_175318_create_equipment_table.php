<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('gsobject_id')->unsigned();
            $table->bigInteger('equipment_name_id')->unsigned();

            $table->integer('quantity');
            $table->string('power');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gsobject_id')->references('id')->on('gsobjects');
            $table->foreign('equipment_name_id')->references('id')->on('equipment_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
