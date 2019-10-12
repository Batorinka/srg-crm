<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetupValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->decimal('zero_group', 7, 2);
            $table->decimal('first_group', 7, 2);
            $table->decimal('second_group', 7, 2);
            $table->decimal('third_group', 7, 2);
            $table->decimal('fourth_group', 7, 2);
            $table->decimal('fifth_group', 7, 2);
            $table->decimal('sixth_group', 7, 2);
            $table->decimal('special_increase', 7, 2);

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
        Schema::dropIfExists('setup_values');
    }
}
