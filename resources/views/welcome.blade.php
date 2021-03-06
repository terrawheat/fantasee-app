@extends('app')

@section('content')
  <section class="splash-mast">
    <div class="container">
      <div class="splash-mast__body">
        <h1>Fantasee</h1>
        <p class="lead">See the history of your fantasy league</p>
        <p>
          <a class="btn btn-default btn-lg" href="{{ route('league_create') }}" role="button"><i class="fa fa-cloud-download"></i> Import yours now</a>
        </p>
        <p style="color: #fff;"><small>&mdash;currently nfl.com leagues only&mdash;</small></p>
      </div>
    </div>
    <section class="splash-stats">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <h3><span class="big" data-counter="{{ $league_count }}">0</span><br>Leagues</h3>
          </div>
          <div class="col-sm-4">
            <h3><span class="big" data-counter="{{ $manager_count }}">0</span><br>Managers</h3>
          </div>
          <div class="col-sm-4">
            <h3><span class="big" data-counter="{{ $match_count }}" data-counter-start="{{ $match_count - 200 }}">0</span><br>Games</h3>
          </div>
        </div>
      </div>
      <h4 class="lead-out">and counting...</h4>
    </section>
  </section>
  <section class="splash-leagues">
    <div class="container">
      <h2>Built for fantasy football {!! get_random_splash_word() !!}.</h2>
      <p class="lead">Fantasee looks at your existing nfl.com fantasy league, and shows you all the things you wish you could see.</p>
      <p>Total records, overall head-to-head, trade history, and lots more to come.</p>
      <br>
    <div class="row">
      @foreach ($leagues as $league)
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{ $league->name }}</h3>
          </div>
            <ul class="list-group">
              <li class="list-group-item">
                <i class="fa fa-calendar"></i> <strong>Seasons</strong>
                <span class="badge">{{ $league->seasons->count() }}</span>
              </li>
              <li class="list-group-item">
                <i class="fa fa-user"></i> <strong>Managers</strong>
                <span class="badge">{{ $league->managers->count() }}</span>
              </li>
              <li class="list-group-item">
                <i class="fa fa-exchange"></i> <strong>Trades</strong>
                <span class="badge">{{ $league->trades->count() }}</span>
              </li>
              <li class="list-group-item">
                <i class="fa fa-trophy"></i> <strong>Champions</strong>
                <span class="badge">{{ $league->getChampions() }}</span>
              </li>
              <li class="list-group-item">
                {!! link_to_route('league_path', 'Explore league', [$league->slug], ['class' => 'btn btn-success btn-block']) !!}
              </li>
            </ul>
          </div>
      </div>
      @endforeach
    </div>
  </div>
  </section>
@stop


@section('scripts')
  @parent
  {!! Html::script('js/counter.js') !!}
@stop
