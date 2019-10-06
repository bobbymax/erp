<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelCategoryPerDiemLocalAllowances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('per_diem_allowances', function (Blueprint $table) {
            $table->bigInteger('travel_category_id')->unsigned();
            $table->foreign('travel_category_id')->references('id')->on('travel_categories')->onDelete('cascade');
            $table->bigInteger('grade_group_id')->unsigned();
            $table->foreign('grade_group_id')->references('id')->on('grade_groups')->onDelete('cascade');

            $table->primary(['travel_category_id', 'grade_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('per_diem_allowances');
    }
}
