@extends('layouts.master')
@section('page-title', 'Services')
@section('content')

    <div class="page services">
        @foreach($services as $service)
            <div class="service-item section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="service-item-content">
                                <h3>{{ $service->title }}</h3>
                                <p>{{ $service->description }}<p>

                                <p>
                                    <a href="{{ route('page.contact') }}">Get in Touch <i class="bx bx-chevron-right"></i></a>
                                </p>
                                <img src="{{ $service->photo->src }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="service-images">
                                @foreach($service->photos as $photo)
                                    <div class="service-image">
                                        <img src="{{ $photo->src }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
