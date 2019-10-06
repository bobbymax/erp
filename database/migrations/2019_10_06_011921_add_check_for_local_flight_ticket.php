<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckForLocalFlightTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->string('short')->nullable()->after('label');
            $table->boolean('local_flight_ticket')->default(false)->after('short');
            $table->bigInteger('travel_category_id')->default(0)->after('local_flight_ticket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('short');
            $table->dropColumn('local_flight_ticket');
            $table->dropColumn('travel_category_id');
        });
    }
}
