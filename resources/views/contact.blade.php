@extends('layouts.master')

@section('content')

    <div class="contact-us-area section-padding page">
        <div class="contact-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-item text-center">
                            <span class="title">Address</span>
                            <div class="content text-center">
                                <p>{{ $contactSettingsData->address_line_1 ?? 'No address found' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-item text-center">
                            <span class="title">Phone</span>
                            <div class="content text-center">
                                <p>{{ $contactSettingsData->phone ?? null }}</p>
                                <p>{{ $contactSettingsData->alternative_phone ?? null }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-item text-center">
                            <span class="title">Email Us</span>
                            <div class="content text-center">
                                <p>{{ $contactSettingsData->email ?? null }}</p>
                                <p>{{ $contactSettingsData->alternative_email ?? null }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-map">
                            <div id="gmap">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116834.01522929687!2d90.33688153317368!3d23.78077167760906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1690608366162!5m2!1sen!2sbd" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="contact-form contact-form-right">
                                <div class="contact-title text-center">
                                    <h3>Get in Touch</h3>
                                    <p class="mt-2">Call or Email us Regarding <br>s Question or Issues</p>
                                </div>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
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
