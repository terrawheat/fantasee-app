<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('league_id')->unsigned();
			$table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');;
			$table->integer('season_id')->unsigned();
			$table->foreign('season_id')->references('id')->on('seasons');
			$table->integer('week_id')->unsigned();
			$table->foreign('week_id')->references('id')->on('weeks');
			$table->integer('team1_id')->unsigned();
			$table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');;
			$table->integer('team2_id')->unsigned();
			$table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');;
			$table->decimal('team1_score', 5, 2);
			$table->decimal('team2_score', 5, 2);
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
		Schema::table('matches', function (Blueprint $table)
		{
			$table->dropForeign('matches_league_id_foreign');
			$table->dropForeign('matches_season_id_foreign');
			$table->dropForeign('matches_week_id_foreign');
			$table->dropForeign('matches_team1_id_foreign');
			$table->dropForeign('matches_team2_id_foreign');
			$table->drop();
		});
	}

}
