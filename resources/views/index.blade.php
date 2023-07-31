@extends('layouts.master')

@section('content')

    <div class="container" style="padding-top: 120px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="grid">
                    @foreach($projects as $project)
                        <div class="grid-item {{ $project->category?->ref }}">
                            <a href="{{ route('page.projects.show', $project->ref) }}">
                                <img src="{{ $project->thumbnail->src }}" alt="">
                                <div class="caption">{{ $project->title }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('components.about-content')

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

    @include('components.how-works')

    <div class="leaders-area section-padding">
        <div class="page-title text-center justify-center align-items-center">
            <h2 class="title">Meet the leaders</h2>
            <p>We are team of telented Architect to make design solutions more precise, sustainable and user friendly.</p>
        </div>
        <div class="leaders">
            <div class="container">
                <div class="row">
                    @foreach($leaders as $leader)
                        <div class="col-lg-3">
                            <div class="leader">
                                <img src="{{ $leader->photo->src }}" alt="">
                                <div class="content">
                                    <p>{{ $leader->name }}</p>
                                    <span>{{ $leader->designation }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-area pt-80 pb-80">
        <div class="page-title text-center justify-center align-items-center">
            <h2 class="title">Contact</h2>
            <p>We are team of telented Architect to make design solutions more precise, sustainable and user friendly.</p>
        </div>

        <div class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-map">
                            <div id="gmap">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116834.01522929687!2d90.33688153317368!3d23.78077167760906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1690608366162!5m2!1sen!2sbd" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="contact-form">
                                <div class="contact-title text-center">
                                    <h3>Get in Touch</h3>
                                    <p class="mt-2">Call or Email us Regarding <br>s Question or Issues</p>
                                </div>
                                <form class="form-contact" action="{{ route('page.contact.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Full name" class="form-control">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Phone" class="form-control">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Type your message...." class="form-control form-control-textarea bg-gray" rows="5"></textarea>
                                        @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-sm">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('footer-script')
    <script src="{{ asset('assets/vendors/isotope/js/isotope.pkgd.min.js') }}"></script>

    <script>
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
        });

        var isHorizontal = false;
        var $window = $( window );

        // filter functions
        var filterFns = {
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
            }
        };
        // bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });
    </script>

@endpush
