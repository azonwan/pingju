@extends('layouts.default')

@section('title')
{{ lang('User Login Require') }}_@parent
@stop

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{ lang('Login') }}</h3>
        </div>
        <div class="panel-body">

          {{ Form::open(['route'=>'auth.login', 'method'=>'post']) }}

            <fieldset>
              <div class="alert alert-warning">
                  {{ lang('You need to login to proceed.') }}
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
                  <input type="checkbox" class="form-inline" name="remember" />
                  <label for="remember">{{ lang('Remember Me') }}</label>
                  <input type="hidden" name="_token" value="{{ csrf_token(); }}">
              </div>
                <div class="line"></div>
              <div class="panel third-login">
                <a href="{{route('login.third')}}?type=douban"><img src="/assets/images/login/douban_login.png" /></a>
                <a href="{{route('login.third')}}?type=qq"><img src="/assets/images/login/qq_login.png" /></a>
                <a href="{{route('login.third')}}?type=weibo"><img src="/assets/images/login/weibo_login.png" /></a>
              </div>
              {{ Form::submit(trans(lang('Login')), ['class' => 'btn btn-lg btn-success btn-block', 'id' => 'login-required-submit']) }}
            </fieldset>

          {{ Form::close() }}

        </div>
      </div>
    </div>
  </div>

@stop
