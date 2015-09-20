@extends('layouts.default')

@section('title')
{{ lang('User Register Require') }}_@parent
@stop

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{ lang('Register') }}</h3>
        </div>
        <div class="panel-body">

          {{ Form::open(['route'=>'auth.register', 'method'=>'post']) }}

            <fieldset>
              <div class="form-group">
                  <label for="email">{{ lang('Username') }}</label>
                  <input type="text" class="form-control" name="username" placeholder="{{ lang('Please input username') }}" />
              </div>
              <div class="form-group">
                  <label for="email">{{ lang('Email') }}</label>
                  <input type="text" class="form-control" name="email" placeholder="{{ lang('Please input email') }}" />
              </div>
              <div class="form-group">
                  <label for="password">{{ lang('Password') }}</label>
                  <input type="password" class="form-control" name="password" placeholder="{{ lang('Please input password') }}" />
              </div>
              <div class="form-group">
                  <label for="confirm">{{ lang('Confirm password') }}</label>
                  <input type="password" class="form-control" name="confirm" placeholder="{{ lang('Please confirm password') }}" />
              </div>
              <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token(); }}">
              </div>
              {{ Form::submit(trans(lang('Register')), ['class' => 'btn btn-lg btn-success btn-block', 'id' => 'login-required-submit']) }}
            </fieldset>

          {{ Form::close() }}

        </div>
      </div>
    </div>
  </div>

@stop
