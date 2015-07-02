<?php

namespace Fantasee\Providers;

use Illuminate\Support\ServiceProvider;
use Fantasee\Repositories\League\LeagueRepository;
use Fantasee\Repositories\League\DbLeagueRepository;
use Fantasee\Repositories\Team\TeamRepository;
use Fantasee\Repositories\Team\DbTeamRepository;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LeagueRepository::class, DbLeagueRepository::class);
        $this->app->bind(TeamRepository::class, DbTeamRepository::class);
    }
}
