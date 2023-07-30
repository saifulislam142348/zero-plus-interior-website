@extends('layouts.master')

@section('content')

    <div class="projects-area pb-80 pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-items">
                        <div class="button-group filters-button-group">
                            <button class="button is-checked" data-filter="*">Show all</button>
                            @foreach($categories as $category)
                                <button class="button" data-filter=".{{ $category->ref }}">{{ $category->name }}</button>
                            @endforeach
                        </div>
                        <div class="grid">
                            @foreach($projects as $project)
                                <div class="grid-item {{ $project->category?->ref }}">
                                    <a href="#">
                                        <img src="{{ $project->thumbnail->src }}" alt="">
                                    </a>
                                </div>
                            @endforeach
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

