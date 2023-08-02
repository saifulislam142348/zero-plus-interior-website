<header class="header-area {{ Route::currentRouteName() === 'home' ? 'has-sticky-header' : '' }}" id="headerArea">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="/">
                            @if(isset($siteSettingsData->siteLogo))
                                <img src="{{ $siteSettingsData->siteLogo->src }}" alt="">
                            @else
                                <h1>Zero Plus.</h1>
                            @endif
                        </a>
                        <button type="button" class="res-nav-control">
                            <i class='bx bx-menu'></i>
                        </button>
                        <div class="res-nav">
                            <div class="res-navbar">
                                <div class="res-nav-close">
                                    <i class='bx bx-right-arrow-alt'></i>
                                </div>
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('page.about') }}">About us</a></li>
                                    <li><a href="{{ route('page.services') }}">Services</a></li>
                                    <li><a href="{{ route('page.projects') }}">Projects</a></li>
                                    <li><a href="{{ route('page.partners') }}">Partners</a></li>
                                    <li><a href="{{ route('page.clients') }}">Clients</a></li>
                                    <li><a href="{{ route('page.contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="menus">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('page.about') }}">About us</a></li>
                            <li><a href="{{ route('page.services') }}">Services</a></li>
                            <li><a href="{{ route('page.projects') }}">Projects</a></li>
                            <li><a href="{{ route('page.partners') }}">Partners</a></li>
                            <li><a href="{{ route('page.clients') }}">Clients</a></li>
                            <li class="has-btn"><a href="{{ route('page.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('footer-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('headerArea');
            function handleScroll() {
                if (window.scrollY > 0) {
                    header.classList.add('sticky-header');
                } else {
                    header.classList.remove('sticky-header');
                }
            }
            window.addEventListener('scroll', handleScroll);
        });

        (function($){
            "use-strict"

            jQuery(document).ready(function(){
                $(document).on('click', '.res-nav-control', function () {
                    $('.res-nav').addClass('open');
                });

                $(document).on('click', '.res-nav-close', function () {
                    $('.res-nav').removeClass('open');
                });

            });

        }(jQuery))

    </script>
@endpush
