<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author')->default(0);
            $table->bigInteger('training_id')->unsigned();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->boolean('approved')->default(false);
            $table->boolean('hr_approved')->default(false);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('proposeds');
    }
}
