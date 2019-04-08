@extends('adminlte::page')

@section('title', 'V-learning')

@section('content_header')
@stop

@section('content')
    <section class="details-card">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <a href="/home?level=1">
                            <img src="{{asset('/images/levels-edu/lop1.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <a href="">
                                <img src="{{asset('/images/levels-edu/lop2.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <a href="#">
                                <img src="{{asset('/images/levels-edu/lop3.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="details-card">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <a href="">
                                <img src="{{asset('/images/levels-edu/lop4.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <a href="">
                                <img src="{{asset('/images/levels-edu/lop5.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <a href="">
                                <img src="https://placeimg.com/380/230/nature" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
