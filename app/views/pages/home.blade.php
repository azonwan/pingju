@extends('layouts.default')

@section('content')

<div class="panel panel-default list-panel">
  <div class="panel-heading">
    <h3 class="panel-title text-center">
      {{ lang('Excellent Topics') }} &nbsp;
    </h3>

  </div>

    @include('nodes.partials.index')
</div>
<div class="row topic-content panel-default list-panel">
    @include('pages.topic_list')
</div>

@stop
