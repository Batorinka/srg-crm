<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGsobjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsobjects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('main_contract_id')->unsigned();
            $table->bigInteger('TO_contract_id')->unsigned();
            $table->bigInteger('pressure_unit_id')->unsigned();

            $table->string('slug')->unique();

            $table->string('name');
            $table->string('address');
            $table->string('grs');

            $table->string('member_position');
            $table->string('member_name');

            $table->date('stamp_act_date');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('main_contract_id')->references('id')->on('main_contracts');
            $table->foreign('TO_contract_id')->references('id')->on('t_o_contracts');
            $table->foreign('pressure_unit_id')->references('id')->on('pressure_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gsobjects');
    }
}
