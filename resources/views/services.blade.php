@extends('layouts.master')
@section('page-title', 'Services')
@section('content')

    <div class="page services">
        @for($i=1;$i < 5; $i++)
            <div class="service-item section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="service-item-content">
                                <h3>Building Design and  Consultancy</h3>
                                <p>the conceptual artist Richard Artschwager while embracing the existing architecture. The richness in the space comes through the layering of subtle textures with custom furniture, lighting and interior detailing and complement the overall aesthetics and architecture.</p>

                                <p>
                                    <a href="{{ route('page.contact') }}">Get in Touch <i class="bx bx-chevron-right"></i></a>
                                </p>

                                <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="service-images">
                                <div class="service-image">
                                    <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                                </div>
                                <div class="service-image">
                                    <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>


@endsection
