@if(!Request::ajax())
@extends('app')
@endif

@section('content')
<div class="container">
  <h1>{{ $league->name }} &mdash; {{ $season->year }}</h1>
  @include ('partials.league_years_header')
  <br>
  @include ('partials.league_section_seasonal_header', [ 'active' => 'standings' ])
  <br>
  <div id="dynamic">
    <table class="table table-striped" data-sortable="0,3,4,6,7,8">
      <thead>
        <th>#</th>
        <th>Team</th>
        <th>Manager</th>
        <th>Wins</th>
        <th>Losses</th>
        <th>Ties</th>
        <th>%</th>
        <th>For</th>
        <th>Against</th>
        <th></th>
      </thead>
      <tbody>
      @foreach ($teams as $team)
        <tr>
          <td>{!! $team->position !!}</td>
          <td>{!! link_to_route('league_manager_season_path', $team->name, [$league->slug, $team->manager->id, $team->season->year]) !!}</td>
          <td>{!! link_to_route('league_manager_path', $team->manager->name, [$league->slug, $team->manager->id]) !!}</td>
          <td>{!! $team->wins !!}</td>
          <td>{!! $team->losses !!}</td>
          <td>{!! $team->ties !!}</td>
          <td>{!! decimal_perc($team->getWinPercent()) !!}</td>
          <td>{!! $team->points->for !!}</td>
          <td>{!! $team->points->against !!}</td>
          <td>{!! show_trophy($team) !!}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop

@section('scripts')
  @parent
  {!! Html::script('js/table-sortable.js') !!}
@stop
