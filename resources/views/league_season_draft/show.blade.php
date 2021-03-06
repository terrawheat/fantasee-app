@if(!Request::ajax())
@extends('app')
@endif

@section('content')
<div class="container">
  <h1>{{ $league->name }} &mdash; {{ $season->year }}</h1>
  @include ('partials.league_years_header')
  <br>
  @include ('partials.league_section_seasonal_header', [ 'active' => 'draft' ])
  <br>
  <div id="dynamic">

    @foreach ($rounds as $round => $picks)
    <table class="table table-striped">
      <caption>Round {{ $round + 1 }}</caption>
      <thead>
        <tr>
          <th>Pick</th>
          <th>Team</th>
          <th>Player</th>
          <th>Position</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($picks as $p)
        <tr>
          <td>{!! $p->pick !!}</td>
          <td>{!! $p->team->name !!}</td>
          <td>{!! $p->player->name !!}</td>
          <td>{!! $p->player->position !!}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Breakdown</th>
          <th colspan="3">
            @include('partials.percentage_bar', ['breakdown' => $picks->breakdown])
          </th>
        </tr>
      </tfoot>
    </table>
    @endforeach
  </div>
</div>
@stop

@section('scripts')
  @parent
  {!! Html::script('js/table-sortable.js') !!}
@stop
