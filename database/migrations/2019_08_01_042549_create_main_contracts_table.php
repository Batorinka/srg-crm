<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('main_contract_type_id')->unsigned();

            $table->string('slug')->unique();

            $table->string('company_full_name');
            $table->string('company_sub_name');
            $table->string('number')->default('___');

            $table->date('signing_date')->default(now());
            $table->date('start_date');
            $table->date('end_date');

            $table->string('contractor_position');
            $table->string('contractor_name');
            $table->string('contractor_cause');

            $table->text('requisites');
            $table->text('supply_contract');

            $table->boolean('is_industry');
            $table->boolean('is_heat_generating');
            $table->string('contract_clause_7_6');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('main_contract_type_id')->references('id')->on('main_contract_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_contracts');
    }
}
