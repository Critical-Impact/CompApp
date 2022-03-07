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
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->foreignId("competition_id")->constrained();
            $table->index("competition_id");
            $table->foreignId("team_one_id")->constrained("teams");
            $table->index("team_one_id");
            $table->foreignId("team_two_id")->constrained("teams");
            $table->index("team_two_id");
            $table->integer("race_no");

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
        Schema::dropIfExists('races');
    }
};
