@extends('layouts.master')

@section('content')

    <div class="hero-area">
        <div class="hero-items">
            <div class="hero-item" style="background-image: url('{{ asset('assets/images/dummy.jpg') }}')">
                <div class="hero-content text-center">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium.</h2>
                </div>
            </div>
        </div>
    </div>

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
                        <h2 class="title m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
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

    {{-- how works--}}
    <div class="how-work-section" style="background-image: url('{{ asset('assets/images/dummy.jpg') }}')">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title page-title-dark text-center">
                        <h4 class="sub-title">Our Process</h4>
                        <h2 class="title">How it Works</h2>
                    </div>
                    <div class="how-work-items">
                        <div class="how-work-item">
                            <div class="icon">
                                <img src="{{ asset('assets/images/hw-icon/1.png') }}" alt="">
                                <span class="label">1</span>
                            </div>
                            <div class="content">
                                <h5>Concept</h5>
                                <p>Analyze the assigned work & prepare goal to be achieved</p>
                            </div>
                        </div>
                        <div class="how-work-item">
                            <div class="icon">
                                <img src="{{ asset('assets/images/hw-icon/2.png') }}" alt="">
                                <span class="label">2</span>
                            </div>
                            <div class="content">
                                <h5>Design Process</h5>
                                <p>Prepare design solution targeting the goal</p>
                            </div>
                        </div>
                        <div class="how-work-item">
                            <div class="icon">
                                <img src="{{ asset('assets/images/hw-icon/3.png') }}" alt="">
                                <span class="label">3</span>
                            </div>
                            <div class="content">
                                <h5>Supervision</h5>
                                <p>Analyze the assigned work & prepare goal to be achieved</p>
                            </div>
                        </div>
                        <div class="how-work-item">
                            <div class="icon">
                                <img src="{{ asset('assets/images/hw-icon/4.png') }}" alt="">
                                <span class="label">4</span>
                            </div>
                            <div class="content">
                                <h5>Budget Planning</h5>
                                <p>Analyze the assigned work & prepare goal to be achieved</p>
                            </div>
                        </div>
                        <div class="how-work-item">
                            <div class="icon">
                                <img src="{{ asset('assets/images/hw-icon/5.png') }}" alt="">
                                <span class="label">5</span>
                            </div>
                            <div class="content">
                                <h5>Execute Deliver</h5>
                                <p>Execute the work with according to the strategic plan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--portfolios--}}
    <div class="project-areas section-padding">
        <div class="page-title text-center">
            <h4 class="sub-title">Portfolio</h4>
            <h2 class="title">Let’s Check Our Recent Work and Project Portfolio</h2>
        </div>
        <div class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-items">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="portfolio-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/portfolio-1.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="">Show All</a>
        </div>
    </div>

    <div class="leaders-area section-padding">
        <div class="page-title text-center justify-center align-items-center">
            <h2 class="title">Meet the leaders</h2>
            <p>We are team of telented Architect to make design solutions more precise, sustainable and user friendly.</p>
        </div>
        <div class="leaders">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="leader">
                            <img src="{{ asset('assets/images/leader.png') }}" alt="">
                            <div class="content">
                                <p>Fahim Mahmud</p>
                                <span>Principal Architect</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="leader">
                            <img src="{{ asset('assets/images/leader.png') }}" alt="">
                            <div class="content">
                                <p>Fahim Mahmud</p>
                                <span>Principal Architect</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="leader">
                            <img src="{{ asset('assets/images/leader.png') }}" alt="">
                            <div class="content">
                                <p>Fahim Mahmud</p>
                                <span>Principal Architect</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="leader">
                            <img src="{{ asset('assets/images/leader.png') }}" alt="">
                            <div class="content">
                                <p>Fahim Mahmud</p>
                                <span>Principal Architect</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-area section-padding">
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
                                <form class="form-contact">
                                    <div class="form-group">
                                        <input type="text" placeholder="Full name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="" placeholder="Type your message...." class="form-control form-control-textarea bg-gray" rows="5"></textarea>
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
