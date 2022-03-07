<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heat_results', function (Blueprint $table) {
            $table->foreignId("team_one_id")->constrained("teams");
            $table->foreignId("team_two_id")->constrained("teams");
            $table->integer("team_one_seconds");
            $table->integer("team_two_seconds");
            $table->enum("team_one_status", ["WIN","DNF","LOSS", "N/A"]);
            $table->enum("team_two_status", ["WIN","DNF","LOSS", "N/A"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
