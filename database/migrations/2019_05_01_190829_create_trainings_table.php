<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->bigInteger('category_id')->default(0);
            $table->string('title');
            $table->string('label');
            $table->string('provider');
            $table->string('provider_slug');
            $table->string('location');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('certificate')->nullable();
            $table->string('location_during_training')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('archived')->default(false);
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
        Schema::dropIfExists('trainings');
    }
}
