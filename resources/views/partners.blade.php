@extends('layouts.master')

@section('content')

    <section class="clients-area section-padding page">
        <div class="page-title justify-center align-items-center text-center">
            <h2 class="title">Check who works with us</h2>
            <p>Our top priority is delivering exceptional products and services to our valued customers. We take great pride in our ability to create meaningful relationships and provide an outstanding customer experience. Today, we are thrilled to highlight some of our happy customers.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="clients mt-4">
                        @foreach($partners as $partner)
                            @if($partner)
                                <div class="client">
                                    <img src="{{ $partner->photo->src }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
