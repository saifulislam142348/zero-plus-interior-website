<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zeroplus</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <header class="header-area">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="logo">
                            <h1>Zero Plus.</h1>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="menus">
                            <ul>
                                <li><a href="">Home</a></li>
                                <li><a href="">About us</a></li>
                                <li><a href="">Services</a></li>
                                <li><a href="">Projects</a></li>
                                <li><a href="">Partners</a></li>
                                <li><a href="">Clients</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="welcome-area">
        <div class="welcome-bg"></div>
        <div class="welcome-content">
            <div class="container">
                <div class="row col-lg-8 offset-lg-2 text-center">
                    <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore.</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-thumbnail">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="page-title">
                        <h5 class="sub-title">About us</h5>
                        <h2 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
                    </div>
                    <div class="about-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, ea explicabo harum iure necessitatibus nemo neque nisi numquam perferendis provident quae quibusdam repellat repellendus rerum tempore velit vero. Accusamus consequuntur ea fuga mollitia nihil unde!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-area">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="services">
                        <div class="service">
                            <img src="" alt="">
                            <div class="service-caption"></div>
                        </div>
                        <div class="service">
                            <img src="" alt="">
                            <div class="service-caption"></div>
                        </div>
                        <div class="service">
                            <img src="" alt="">
                            <div class="service-caption"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="how-work-section">

    </div>

    <div class="project-areas">

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
