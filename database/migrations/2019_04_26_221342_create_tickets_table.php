<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('issue_id')->unsigned();
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');

            $table->string('code')->unique();
            $table->string('details');
            $table->text('additional_info')->nullable();

            $table->boolean('assigned')->default(false);
            $table->integer('transferred')->default(0);
            $table->integer('report_generated')->default(0);
            $table->string('status')->default('unresolved');
            $table->string('attachment')->nullable();
            $table->string('priority')->default('normal');
            $table->boolean('closed')->default(false);
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
        Schema::dropIfExists('tickets');
    }
}
