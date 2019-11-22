@extends('layouts/layout')

@section('pageTitle', 'Home')

@section('content')
@include('partials.navigation')
<div class="container">
    <h1 class="text-center">Your Progress</h1>
    <div class="row">
        <div class="col-lg-12">
            @if (count($history) > 0)
                <h3>Your Progress in the different categories</h3>            
                <div id="chart">
                    <ul id="numbers">
                        <li><span>100%</span></li>
                        <li><span>75%</span></li>
                        <li><span>50%</span></li>
                        <li><span>25%</span></li>
                        <li><span>0%</span></li>
                    </ul>
                    <ul id="bars">
                        @foreach ($history as $progress)
                        <li>
                            <div data-percentage="{{$progress['score']}}" class="bar"></div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center">Recently trained: {{$history[0]['category']}}</div>
            @else
                <div class="text-center">Progress history not found.</div>
            @endif;
        </div>
    </div>
</div>
<link href="{{ asset('css/charts.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/custom.js') }}"></script>
@stop