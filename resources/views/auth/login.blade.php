@extends('layouts/layout')

@section('pageTitle', 'Login')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning text-center">
                {{ session('warning') }}
            </div>
        @endif
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
            {{ Form::open(array('url' => 'login', 'method' => 'post', 'id' => 'loginForm', 'name' => 'loginForm')) }}
                <fieldset>
                    <h2>Login</h2>
                    @if ($errors->any())
                        <div class="error">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif                        
                    <hr class="colorgraph">
                    <div class="form-group">
                        {{ Form::label('email', 'Email Address', array('class' => 'control-label')) }}
                        {{ Form::email('email', old('email'), array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Address')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                        {{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password')) }}
                    </div>                        
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            {{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="{{ route('register') }}" class="btn btn-lg btn-primary btn-block">Register</a>
                        </div>
                    </div>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
</div>
<script src="{{ asset('js/login.js') }}"></script>
@stop