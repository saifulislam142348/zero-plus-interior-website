@extends('layouts.master')

@section('pageTitle', 'About')

@section('content')
    @include('components.about-content');

    <div class="service-area  pt-80 pb-100">
        <div class="page-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="page-title">
                            <h5 class="sub-title">Service</h5>
                            <h2>Service we offer</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4">
                            <div class="service">
                                <img src="{{ $service->photo->src }}" alt="">
                                <div class="service-caption">
                                    <p>{{ $service->title }}</p>
                                    <a href="{{ route('page.services') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
