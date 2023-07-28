@extends('layouts.master')

@section('pageTitle', 'About')

@section('content')
    <div class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-thumbnail">
                        <img src="{{ asset('assets/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="page-title">
                        <h5 class="sub-title">About us</h5>
                        <h2 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
                    </div>
                    <div class="about-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolores doloribus expedita neque quibusdam voluptatum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, ea explicabo harum iure necessitatibus nemo neque nisi numquam perferendis provident quae quibusdam repellat repellendus rerum tempore velit vero. Accusamus consequuntur ea fuga mollitia nihil unde!</p>
                    </div>
                    <div class="about-widgets">
                        <div class="about-widget-item">
                            <span class="widget-icon">
                                <i class="bx bx-home"></i>
                            </span>
                            <div class="widget-content">
                                <h5 class="title">The perfect Resideny</h5>
                                <p>We developed this idea to make design solutions more precise sustainable and user friendly.</p>
                            </div>
                        </div>
                        <div class="about-widget-item">
                            <span class="widget-icon">
                                <i class='bx bx-buildings' ></i>
                            </span>
                            <div class="widget-content">
                                <h5 class="title">Global Architect Experts</h5>
                                <p>We developed this idea to make design solutions more precise sustainable and user friendly.</p>
                            </div>
                        </div>
                        <div class="about-widget-item">
                            <span class="widget-icon">
                                <i class='bx bx-map-alt'></i>
                            </span>
                            <div class="widget-content">
                                <h5 class="title">Built-in Storage Cupboards</h5>
                                <p>We developed this idea to make design solutions more precise sustainable and user friendly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- services --}}
    <div class="service-area  section-padding">
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
                    <div class="col-lg-4">
                        <div class="service">
                            <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            <div class="service-caption">
                                <p>Building Design & Consultancy</p>
                                <a href="">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service">
                            <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            <div class="service-caption">
                                <p>Interior design & build</p>
                                <a href="">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="service">
                            <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            <div class="service-caption">
                                <p>Project management</p>
                                <a href="">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
