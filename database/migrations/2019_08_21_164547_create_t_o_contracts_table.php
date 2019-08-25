<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTOContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_o_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('main_contract_id')->unsigned();

            $table->string('slug')->unique();

            $table->string('number');
            $table->integer('payment_period');

            $table->date('signing_date');
            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('main_contract_id')->references('id')->on('main_contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_o_contracts');
    }
}
