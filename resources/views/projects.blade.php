@extends('layouts.master')

@section('content')

    <div class="projects-area pb-80 pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="prorject-items">
                        <div class="button-group filters-button-group">
                            <button class="button is-checked" data-filter="*">show all</button>
                            <button class="button" data-filter=".metal">metal</button>
                            <button class="button" data-filter=".transition">transition</button>
                            <button class="button" data-filter=".another">transition</button>
                        </div>
                        <div class="grid">
                            <div class="grid-item metal transition grid-item--width2">
                                <img src="{{ asset('assets/images/dummy.jpg') }}" alt="">
                            </div>
                            <div class="grid-item transition">
                                <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            </div>
                            <div class="grid-item metal">
                                <img src="{{ asset('assets/images/client-img.png') }}" alt="">
                            </div>
                            <div class="grid-item transition">
                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                            </div>
                            <div class="grid-item another">
                                <img src="{{ asset('assets/images/dummy.jpg') }}" alt="">
                            </div>
                            <div class="grid-item transition">
                                <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            </div>
                            <div class="grid-item another">
                                <img src="{{ asset('assets/images/client-img.png') }}" alt="">
                            </div>
                            <div class="grid-item metal">
                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                            </div>
                            <div class="grid-item another">
                                <img src="{{ asset('assets/images/service-img.png') }}" alt="">
                            </div>
                            <div class="grid-item another grid-item--width2">
                                <img src="{{ asset('assets/images/dummy.jpg') }}" alt="">
                            </div>
                            <div class="grid-item another metal">
                                <img src="{{ asset('assets/images/client-img.png') }}" alt="">
                            </div>
                            <div class="grid-item another">
                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
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

