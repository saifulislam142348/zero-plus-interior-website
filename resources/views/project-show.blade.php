@extends('layouts.master')

@section('pageTitle', 'Projects > Project Details')

@section('content')

    <div class="projects-area pb-80 pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-title">
                        <h3>{{ $project->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="project-sliders">
                        <div class="slider">
                            <div id="slider" class="flexslider">
                                <ul class="slides">
                                    @foreach($project->photos as $photo)
                                        <li>
                                            <img src="{{ $photo->src }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div id="carousel" class="flexslider">
                                <ul class="slides">
                                    @foreach($project->photos as $photo)
                                        <li>
                                            <img src="{{ $photo->src }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="project-details mt-4">
                        <h3 class="mb-4">Project Overview</h3>
                        <p>{!! $project->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-details-sidebar bg-white">
                        <h4>Project Info</h4>
                        <div class="items mt-4">
                            <div class="item">
                                <strong>Owner:</strong>
                                <span>{{ $project->customer?->name }}</span>
                            </div>
                            <div class="item">
                                <strong>Category:</strong>
                                <span>{{ $project->category?->name }}</span>
                            </div>
                            <div class="item">
                                <strong>Location:</strong>
                                <span>{{ $project->location }}</span>
                            </div>
                            <div class="item">
                                <strong>Date:</strong>
                                <span>{{ $project->end_date ?? $project->created_at }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('header-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/flexsliders/css/flexslider.css') }}" type="text/css" media="screen" />
@endpush

@push('footer-script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="{{ asset('assets/vendors/flexsliders/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 180,
                itemMargin: 5,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel",
            });
        });
    </script>
@endpush

