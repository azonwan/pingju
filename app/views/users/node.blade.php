@extends('layouts.default')

@section('title')
{{ lang('Your Node') }}_@parent
@stop

@section('content')

<div class="panel panel-default users-index">

    <div class="panel-heading text-center">
        {{ lang('Your Node') }}
    </div>

    <div class="panel-body">
    @foreach ($nodes as $nodes)
        <div class="col-md-6 remove-padding-right">
            <div class="avatar">
              <a href="{{ route('users.show', $user->id) }}" class="users-index-{{ $user->id }}">
                <img src="{{ $user->present()->gravatar }}" class="img-thumbnail avatar"  style="width:48px;height:48px;margin-bottom: 20px;"/>
              </a>
            </div>
        </div>
    @endforeach
    </div>

</div>
@stop
