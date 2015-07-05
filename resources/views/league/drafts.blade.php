@extends('app')

@section('content')
<div class="container">
  <h1>{{ $league->name }} {!! link_to_route('league_edit', 'Edit', [$league->slug], ['class' => 'btn btn-info']) !!}</h1>

  <ul class="nav nav-tabs">
  <li class="active">{!! link_to_route('league_path', 'Overall', [$league->slug]) !!}</li>
  @foreach ($league->seasons as $season)
    <li>{!! link_to_route('league_season_path', $season->year, [$league->slug, $season->year]) !!}</li>
  @endforeach
  </ul>
  <br>
  <ul class="nav nav-pills">
    <li>{!! link_to_route('league_path', 'Managers', [$league->slug]) !!}</li>
    <li>{!! link_to_route('league_teams_path', 'Teams', [$league->slug]) !!}</li>
    <li class="active">{!! link_to_route('league_drafts_path', 'Drafts', [$league->slug]) !!}</li>
  </ul>
  <br>
  <table class="table table-striped">
    <thead>
      <th>Year</th>
      <th>First Pick</th>
      <th>Mr Irrelevant</th>
      <th>Breakdown</th>
    </thead>
    <tbody>
    @foreach ($drafts as $draft)
      <tr>
        <td>{!! link_to_route('league_season_draft_path', $draft->season->year, [$league->slug, $draft->season->year]) !!}</td>
        @if (sizeof($draft->players->all) > 0)
        <td>{{ $draft->players->first->player->name }}</td>
        <td>{{ $draft->players->last->player->name }}</td>
        @else
        <td>Unknown</td>
        <td>Unknown</td>
        @endif
        <td>
          QBs: {!! sizeof($draft->players->positions->qb) !!},
          RBs: {!! sizeof($draft->players->positions->rb) !!},
          WRs: {!! sizeof($draft->players->positions->wr) !!},
          TEs: {!! sizeof($draft->players->positions->te) !!},
          Ks: {!! sizeof($draft->players->positions->k) !!},
          DSTs: {!! sizeof($draft->players->positions->dst) !!}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  <p>{!! link_to_route('leagues_path', 'Back to leagues') !!}</p>
</div>
@stop
