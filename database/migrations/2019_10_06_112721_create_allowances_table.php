<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('grade_group_id')->unsigned();
            $table->foreign('grade_group_id')->references('id')->on('grade_groups')->onDelete('cascade');
            $table->bigInteger('airport_shuttle')->default(0);
            $table->bigInteger('local_flight_ticket')->default(0);
            $table->bigInteger('intra_city_shuttle')->default(0);
            $table->bigInteger('ph_transit')->default(0);
            $table->bigInteger('out_of_pocket')->default(0);
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
        Schema::dropIfExists('allowances');
    }
}
