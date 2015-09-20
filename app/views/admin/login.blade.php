@extends('layouts.master')

@section('title')
Pingju后台登录_@parent
@stop

@section('content')
<div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
    <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">Pingju后台登录</h3>
            </div>
            <div class="panel-body">
                    @if ($errors->has())
                            @foreach ($errors->all() as $error)
                                    <div class='alert-danger alert'>{{ $error }}</div>
                            @endforeach
                    @endif

                    {{ Form::open(['role' => 'form', 'route'=>'admin.auth.login', 'method'=>'post']) }}
                    <fieldset>
                            <div class="form-group">
                                    {{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                    {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                            </div>
                                    {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                    </fieldset>

                    {{ Form::close() }}
            </div>
    </div>
</div>
@stop
