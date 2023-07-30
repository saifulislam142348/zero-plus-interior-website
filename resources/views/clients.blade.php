@extends('layouts.master')

@section('content')

    <section class="page clients-area section-padding">
        <div class="page-title justify-center align-items-center text-center">
            <h2 class="title">Our Satisfied Customers</h2>
            <p>Our top priority is delivering exceptional products and services to our valued customers. We take great pride in our ability to create meaningful relationships and provide an outstanding customer experience. Today, we are thrilled to highlight some of our happy customers.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="clients mt-4">
                        @foreach($clients as $client)
                            @if($client)
                                <div class="client">
                                    <img src="{{ $client->photo->src }}" alt="">
                                </div>
                                <div class="client">
                                    <img src="{{ $client->photo->src }}" alt="">
                                </div>
                                <div class="client">
                                    <img src="{{ $client->photo->src }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
