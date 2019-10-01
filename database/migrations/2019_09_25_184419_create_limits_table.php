<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limits', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('gsobject_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();

            $table->string('year');
            $table->string('supplier');

            $table->decimal('jan_4', 9, 3);
            $table->decimal('feb_4', 9, 3);
            $table->decimal('mar_4', 9, 3);
            $table->decimal('apr_4', 9, 3);
            $table->decimal('may_4', 9, 3);
            $table->decimal('jun_4', 9, 3);
            $table->decimal('jul_4', 9, 3);
            $table->decimal('aug_4', 9, 3);
            $table->decimal('sep_4', 9, 3);
            $table->decimal('oct_4', 9, 3);
            $table->decimal('nov_4', 9, 3);
            $table->decimal('dec_4', 9, 3);

            $table->decimal('jan_8', 9, 3);
            $table->decimal('feb_8', 9, 3);
            $table->decimal('mar_8', 9, 3);
            $table->decimal('apr_8', 9, 3);
            $table->decimal('may_8', 9, 3);
            $table->decimal('jun_8', 9, 3);
            $table->decimal('jul_8', 9, 3);
            $table->decimal('aug_8', 9, 3);
            $table->decimal('sep_8', 9, 3);
            $table->decimal('oct_8', 9, 3);
            $table->decimal('nov_8', 9, 3);
            $table->decimal('dec_8', 9, 3);

            $table->decimal('jan_10', 9, 3);
            $table->decimal('feb_10', 9, 3);
            $table->decimal('mar_10', 9, 3);
            $table->decimal('apr_10', 9, 3);
            $table->decimal('may_10', 9, 3);
            $table->decimal('jun_10', 9, 3);
            $table->decimal('jul_10', 9, 3);
            $table->decimal('aug_10', 9, 3);
            $table->decimal('sep_10', 9, 3);
            $table->decimal('oct_10', 9, 3);
            $table->decimal('nov_10', 9, 3);
            $table->decimal('dec_10', 9, 3);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gsobject_id')->references('id')->on('gsobjects');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limits');
    }
}
