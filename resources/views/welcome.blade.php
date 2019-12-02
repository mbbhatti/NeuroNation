@extends('layouts/layout')

@section('pageTitle', 'Welcome')

@section('content')
<div class="flex-center">
    <div class="content">
        <h1 class="title m-b-md">WELCOME</h1>
        @if (Route::has('login'))
            <div class="links">
                @if (Auth::check())
                    <a href="{{ url('/history') }}">History</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif
    </div>
</div>
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css">
@stop