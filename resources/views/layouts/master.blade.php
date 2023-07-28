<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zeroplus</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <header class="header-area">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="logo">
                            <a href="/">
                                <h1>Zero Plus.</h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="menus">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('home') }}">About us</a></li>
                                <li><a href="{{ route('home') }}">Services</a></li>
                                <li><a href="{{ route('home') }}">Projects</a></li>
                                <li><a href="{{ route('home') }}">Partners</a></li>
                                <li><a href="{{ route('home') }}">Clients</a></li>
                                <li class="has-btn"><a href="{{ route('home') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

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

    {{-- how works--}}
    <div class="how-work-section" style="background-image: url('{{ asset('assets/images/dummy.jpg') }}')">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title page-title-dark text-center">
                        <h4 class="sub-title">Our Process</h4>
                        <h2 class="title">How it Works</h2>
                    </div>
                    <div class="how-work-items"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="project-areas section-padding">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad doloribus ducimus eligendi officiis recusandae repellat! Amet assumenda blanditiis cumque doloremque eius eligendi in laborum maiores, natus neque porro repudiandae sed sequi sit velit! Ad adipisci alias architecto, asperiores aspernatur debitis deserunt eaque earum expedita hic, illo impedit ipsam laboriosam nihil nulla odio quaerat, qui repellat sed sit sunt totam vero! Dignissimos error ipsam maxime. Ab aliquam aut, beatae esse explicabo inventore, ipsam itaque libero nam neque pariatur placeat ratione sint vel voluptatem? Animi atque commodi natus neque porro praesentium quia sequi totam vel voluptas? A ab ipsum maxime necessitatibus optio, perspiciatis tempore. Assumenda, atque blanditiis deserunt doloremque eligendi excepturi, illo impedit in natus qui quibusdam repellendus saepe. Asperiores aspernatur doloribus nostrum. Animi corporis eum hic itaque perspiciatis, similique tempore. Dolore eaque earum enim exercitationem fuga, illo illum, ipsam iste libero maiores nemo nihil placeat possimus praesentium quas recusandae reiciendis totam.</p>
    </div>

    <div class="leaders-area">

    </div>

    <div class="contact-us-area">

    </div>

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-item"></div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-item"></div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-item"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-item"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
    </footer>

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
