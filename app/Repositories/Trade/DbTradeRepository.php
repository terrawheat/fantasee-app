<?php

namespace Fantasee\Repositories\Trade;

use Fantasee\Repositories\DbRepository;
use Fantasee\Trade\Trade;

class DbTradeRepository extends DbRepository implements TradeRepository
{
    /**
   * Constructor.
   *
   * @param Team $model instance of Fantasee\Team
   */
  public function __construct(Trade $model)
  {
      $this->model = $model;
  }

  /**
   * getByLeague Get all trades by league.
   *
   * @param  int $leagueId
   *
   * @return Illuminate\Database\Collection
   */
  public function getByLeague($leagueId)
  {
      return $this->model->where('league_id', $leagueId)->get();
  }

  /**
   * getByLeague Get all trades by a league season.
   *
   * @param  int $leagueId
   * @param  int $seasonId
   *
   * @return Illuminate\Database\Collection
   */
  public function getByLeagueSeason($leagueId, $seasonId)
  {
      $data = $this->model
      ->where('league_id', $leagueId)
      ->where('season_id', $seasonId)
      ->get();

      return $this->prepareData($data, [
      'sort' => [
        'order' => 'asc',
        'key' => 'id',
      ],
    ]);
  }
}
