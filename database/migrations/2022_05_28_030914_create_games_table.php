<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championship_id');
            $table->integer('championship_stage');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('team_id_2');
            $table->integer('goals_team_1')->default(0);
            $table->integer('goals_team_2')->default(0);
            $table->boolean('is_finished')->default(false);

            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team_id_2')->references('id')->on('teams')->onDelete('cascade');
       
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
        Schema::dropIfExists('games');
    }
}
